<?php

namespace App\Services\Classification\Classifiers\KNearestNeighbors;

use App\Models\DiagnosticGroup;
use App\Services\Classification\Common\DatabaseDataLoader;
use App\Services\Classification\Contracts\ClassifierInterface;
use Phpml\Classification\KNearestNeighbors as Implementation;
use App\Models\Classifier as Model;
use App\Models\Prediction;
use App\Models\Test;

/**
 * Class Classifier
 * @package App\Services\Classification\Classifiers\KNearestNeighbors
 */
class Classifier implements ClassifierInterface
{
    /**
     * @var string
     */
    protected const FILE_NOT_FOUND_MESSAGE = 'We could not find a classifier file. ' .
    'Have you already trained it? ';

    /**
     * @var string
     */
    protected const FILE_NOT_SAVED_MESSAGE = 'Could not save training classifier on a disk. ';

    /**
     * @var string
     */
    protected const UNSUCCESSFUL_PREDICTION_MESSAGE = 'Classifier could not make a prediction. ';

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var DatabaseDataLoader
     */
    protected $dataLoader;

    /**
     * @var StorageManager
     */
    protected $storageManager;

    /**
     * @var Test
     */
    protected $test;

    /**
     * Classifier constructor.
     *
     * @param Model $model
     * @param DatabaseDataLoader $loader
     * @param StorageManager $manager
     */
    public function __construct(Model $model, DatabaseDataLoader $loader, StorageManager $manager)
    {
        $this->model = $model;
        $this->dataLoader = $loader;
        $this->storageManager = $manager->setModel($model);
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @return Test
     */
    protected function getTest(): Test
    {
        return $this->test;
    }

    /**
     * @param Test $test
     *
     * @return Prediction
     */
    public function classify(Test $test): Prediction
    {
        $this->test = $test;

        $implementation = $this->storageManager->restore();

        if (!$implementation)
            return $this->createReportWithDetailedMessage(static::FILE_NOT_FOUND_MESSAGE);

        $diagnosticGroupName = $implementation->predict($this->getRecord());

        return $this->getFinalPrediction($diagnosticGroupName)
                    ->loadMissing('classifier', 'diagnosticGroup');
    }

    /**
     * @return ClassifierInterface
     */
    public function train(): ClassifierInterface
    {
        $implementation = app()->make(Implementation::class);

        $data = $this->dataLoader->getTrainDataForClassifier($this->getModel());

        $implementation->train(
            $data->get('values')->toArray(),
            $data->get('labels')->toArray()
        );

        $saved = $this->storageManager->store($implementation);

        if (!$saved)
            sendError(static::FILE_NOT_SAVED_MESSAGE);

        return $this;
    }

    /**
     * @param null|string $diagnosticGroupName
     *
     * @return Prediction
     */
    protected function getFinalPrediction(?string $diagnosticGroupName): Prediction
    {
        if (!$diagnosticGroupName)
            return $this->createReportWithDetailedMessage(static::UNSUCCESSFUL_PREDICTION_MESSAGE);

        $diagnosticGroup = DiagnosticGroup::whereName($diagnosticGroupName)->firstOrFail();

        return new Prediction([
            'classifier_id'       => $this->getModel()->id,
            'test_id'             => $this->getTest()->id,
            'diagnostic_group_id' => $diagnosticGroup->id,
        ]);
    }

    /**
     * @param string $message
     *
     * @return Prediction
     */
    protected function createReportWithDetailedMessage(string $message)
    {
        return new Prediction([
            'classifier_id' => $this->getModel()->id,
            'test_id'       => $this->getTest()->id,
            'info'          => $message,
        ]);
    }

    /**
     * @return array
     */
    protected function getRecord(): array
    {
        return $this->getTest()->data()->values()->all();
    }
}