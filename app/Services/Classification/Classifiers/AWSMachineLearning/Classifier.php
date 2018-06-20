<?php

namespace App\Services\Classification\Classifiers\AWSMachineLearning;

use Illuminate\Support\Collection;
use App\Services\Classification\Contracts\ClassifierInterface;
use Aws\MachineLearning\MachineLearningClient;
use App\Models\Classifier as Model;
use App\Models\DiagnosticGroup;
use App\Models\Test;
use App\Models\Prediction;

/**
 * Class Classifier
 * @package App\Services\Classification\Classifiers
 */
class Classifier implements ClassifierInterface
{
    use Config;

    /**
     * @var string
     */
    protected const UNKNOWN_GROUP_MESSAGE = 'None of AWS Machine Learning models gave positive result: ' .
    'seems like the test example belongs to another (unknown by us yet) disease, ' .
    'or it is just a mix of several diseases. ' .
    'After all we may simply be unable to connect to AWS services. ' .
    'There are detailed information provided by each of them. ';

    /**
     * @var string
     */
    protected const AMBIGUITY_MESSAGE = 'Two or more AWS Machine Learning models gave positive results: ' .
    'seems like it is just a mix of several diseases so we cannot be sure what actual disease is. ' .
    'There are detailed information provided by each of AWS service. ';

    /**
     * @var string
     */
    protected const EMPTY_CONFIG_TREE = 'Seems like there is no config for specified classifier. ' .
    'Try another classifier or call a support. ';

    /**
     * @var MachineLearningClient
     */
    protected $client;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Test
     */
    protected $test;

    /**
     * @var DiagnosticGroup
     */
    protected $currentDiagnosticGroup;

    /**
     * Classifier constructor.
     * 
     * @param Model $model
     * @param MachineLearningClient $client
     */
    public function __construct(Model $model, MachineLearningClient $client)
    {
        $this->model = $model;
        $this->client = $client;
    }

    /**
     * @return Model
     */
    public function getModel(): Model
    {
        return $this->model;
    }

    /**
     * @return MachineLearningClient
     */
    public function getClient(): MachineLearningClient
    {
        return $this->client;
    }

    /**
     * @param Test $test
     * 
     * @return Prediction
     */
    public function classify(Test $test): Prediction
    {
        $this->test = $test;

        $configTree = $this->getConfigTreeForPatientType($this->getModel()->patientType);

        $predictions = $this->predictAll($configTree);

        return $this->getFinalPrediction($predictions)
                    ->loadMissing('classifier', 'diagnosticGroup');
    }

    /**
     * @return ClassifierInterface
     */
    public function train(): ClassifierInterface
    {
        // Not implemented yet.

        return $this;
    }

    /**
     * @param Collection $configTree
     * 
     * @return Collection
     */
    protected function predictAll(Collection $configTree): Collection
    {
        return $this->getEndpoints($configTree)->map(
            function (Collection $endpoint, string $diagnosticGroupName) {
                return $this->setCurrentDiagnosticGroup($diagnosticGroupName)
                            ->predict($endpoint);
            }
        );
    }

    /**
     * @param Collection $endpoint
     * 
     * @return Prediction
     */
    protected function predict(Collection $endpoint): Prediction
    {
        try {
            $response = $this->getClient()->predict(
                $endpoint->union($this->getRecord())->toArray()
            );
        } catch (\Exception $e) {
            return new Prediction([
                'classifier_id' => $this->getModel()->id,
                'test_id'       => $this->test->id,
                'info'          => $this->getConnectionErrorMessage(),
            ]);
        }

        $predictedLabel = (int) $response['Prediction']['predictedLabel'];

        $diagnosticGroup = $predictedLabel === 1 ? $this->currentDiagnosticGroup : null;

        $rawValue = (float) $response['Prediction']['predictedScores'][ $predictedLabel ];

        return new Prediction([
            'classifier_id'       => $this->getModel()->id,
            'diagnostic_group_id' => optional($diagnosticGroup)->id,
            'test_id'             => $this->test->id,
            'raw_value'           => $rawValue,
        ]);
    }

    /**
     * @param Collection $predictions
     * 
     * @return Prediction
     */
    protected function getFinalPrediction(Collection $predictions): Prediction
    {
        if ($predictions->isEmpty())
            return $this->createReportWithDetailedMessage(
                $predictions,
                static::EMPTY_CONFIG_TREE
            );

        $allPredictionsAreNegative = $predictions->every(function (Prediction $prediction) {
            return $prediction->successful() === false;
        });

        if ($allPredictionsAreNegative)
            return $this->createReportWithDetailedMessage(
                $predictions,
                static::UNKNOWN_GROUP_MESSAGE
            );

        $positivePredictions = $predictions->filter(function (Prediction $prediction) {
            return $prediction->successful() === true;
        });

        if ($positivePredictions->count() > 1)
            return $this->createReportWithDetailedMessage(
                $predictions,
                static::AMBIGUITY_MESSAGE
            );

        return $positivePredictions->first();
    }

    /**
     * @param Collection $predictions
     * @param string $message
     * 
     * @return Prediction
     */
    protected function createReportWithDetailedMessage(
        Collection $predictions,
        string $message
    ): Prediction {
        $predictions->each(function (Prediction $prediction) use (&$message) {
            $info = $prediction->info .
                ($prediction->raw_value ? "Raw value: {$prediction->raw_value}. " : '');

            $message .= $info;
        });

        return new Prediction([
            'classifier_id' => $this->getModel()->id,
            'test_id'       => $this->test->id,
            'info'          => $message,
        ]);
    }

    /**
     * @param string $diagnosticGroupName
     * 
     * @return ClassifierInterface
     */
    protected function setCurrentDiagnosticGroup(string $diagnosticGroupName): ClassifierInterface
    {
        $this->currentDiagnosticGroup = DiagnosticGroup::where([
            'patient_type_id' => $this->getModel()->patientType->id,
            'name'            => $diagnosticGroupName,
        ])->firstOrFail();

        return $this;
    }

    /**
     * @return array
     */
    protected function getRecord(): array
    {
        return [
            'Record' => $this->test->data()->map(function (float $value) {
                return (string) $value;
            })->toArray(),
        ];
    }

    /**
     * @return string
     */
    protected function getConnectionErrorMessage(): string
    {
        return "Could not connect to AWS model ({$this->currentDiagnosticGroup->name}), " .
               "please try later. ";
    }
}