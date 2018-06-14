<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use App\Models\Classifier as Model;
use App\Models\Prediction;
use App\Models\Test;
use App\Services\Classification\Contracts\ClassifierInterface;
use Illuminate\Support\Collection;

/**
 * Class Classifier
 * @package App\Services\Classification\Classifiers\DiscriminantAnalysis
 */
class Classifier implements ClassifierInterface
{
    use ConfigReader;

    /**
     * @var Trainer
     */
    protected $trainer;

    /**
     * @var Model
     */
    protected $classifierModel;

    /**
     * Classifier constructor.
     *
     * @param Model $classifierModel
     * @param Trainer $trainer
     */
    public function __construct(Model $classifierModel, Trainer $trainer)
    {
        $this->classifierModel = $classifierModel;
        $this->trainer = $trainer;
    }

    /**
     * @param Test $test
     *
     * @return Prediction
     */
    public function classify(Test $test): Prediction
    {
        if ($this->shouldBeTrained())
            $this->retrain();


        return new Prediction();
    }

    /**
     * @return ClassifierInterface
     */
    public function retrain(): ClassifierInterface
    {
        $this->trainer->train($this->classifierModel);

        return $this;
    }

    /**
     * @return bool
     */
    protected function shouldBeTrained(): bool
    {
        $selectionIsEmpty = $this->getConfigSelection()->isEmpty();

        $invalidConstants = $this->getConfigConstants()->filter(function ($constant) {
            return empty($constant) || ! is_numeric($constant);
        })->isNotEmpty();

        $invalidCoefficients = $this->getConfigCoefficients()->filter(function ($coefficients) {
            return empty($coefficients) || $coefficients->isEmpty();
        })->isNotEmpty();

        return $selectionIsEmpty || $invalidConstants || $invalidCoefficients;
    }
}