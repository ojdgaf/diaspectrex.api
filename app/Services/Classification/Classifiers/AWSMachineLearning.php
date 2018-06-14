<?php

namespace App\Services\Classification\Classifiers;

use App\Models\Classifier as Model;
use App\Models\DiagnosticGroup;
use App\Models\Test;
use App\Models\Prediction;
use App\Services\Classification\Contracts\ClassifierInterface;
use Aws\MachineLearning\MachineLearningClient;
use Illuminate\Support\Collection;

/**
 * Class AWSMachineLearning
 * @package App\Services\Classification\Classifiers
 */
class AWSMachineLearning implements ClassifierInterface
{
    protected const UNKNOWN_GROUP_MESSAGE = 'None of AWS Machine Learning models gave positive result: ' .
    'seems like the test example belongs to another (unknown by us yet) disease, ' .
    'or it is just a mix of several diseases. ' .
    'After all we may simply be unable to connect to AWS services. ' .
    'There are detailed information provided by each of them. ';

    protected const AMBIGUITY_MESSAGE = 'Two or more AWS Machine Learning models gave positive results: ' .
    'seems like it is just a mix of several diseases so we cannot be sure what actual disease is. ' .
    'There are detailed information provided by each of AWS service. ';

    protected const EMPTY_CONFIG_TREE = 'Seems like there is no config for specified classifier. ' .
    'Try another classifier or call a support. ';

    /**
     * @var MachineLearningClient
     */
    protected $client;

    /**
     * @var Model
     */
    protected $classifierModel;

    /**
     * @var Test
     */
    protected $test;

    /**
     * @var DiagnosticGroup
     */
    protected $currentDiagnosticGroup;

    public function __construct(Model $classifierModel, MachineLearningClient $client)
    {
        $this->classifierModel = $classifierModel;
        $this->client = $client;
    }

    public function classify(Test $test): Prediction
    {
        $this->test = $test;

        $configTree = $this->getConfigTree();

        $predictions = $this->predictAll($configTree);

        return $this->getFinalPrediction($predictions)
                    ->loadMissing('classifier', 'diagnosticGroup');
    }

    public function retrain(): ClassifierInterface
    {
        // Not implemented yet.

        return $this;
    }

    protected function predictAll(array $configTree): Collection
    {
        return collect($configTree)->map(
            function (array $configBranch, string $diagnosticGroupName) {
                return $this->setCurrentDiagnosticGroup($diagnosticGroupName)
                            ->predict($configBranch);
            }
        );
    }

    protected function predict(array $configBranch): Prediction
    {
        try {
            $response = $this->client->predict(
                array_merge($configBranch['endpoint'], $this->getRecord())
            );
        } catch (\Exception $e) {
            return new Prediction([
                'classifier_id' => $this->classifierModel->id,
                'test_id'       => $this->test->id,
                'info'          => $this->getConnectionErrorMessage(),
            ]);
        }

        $predictedLabel = (int) $response['Prediction']['predictedLabel'];

        $diagnosticGroup = $predictedLabel === 1 ? $this->currentDiagnosticGroup : null;

        $rawValue = (float) $response['Prediction']['predictedScores'][ $predictedLabel ];

        return new Prediction([
            'classifier_id'       => $this->classifierModel->id,
            'diagnostic_group_id' => optional($diagnosticGroup)->id,
            'test_id'             => $this->test->id,
            'raw_value'           => $rawValue,
        ]);
    }

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
            'classifier_id' => $this->classifierModel->id,
            'test_id'       => $this->test->id,
            'info'          => $message,
        ]);
    }

    protected function getConfigTree(): array
    {
        $groupTypes = config('classifier.aws machine learning.types');

        return $groupTypes[ $this->classifierModel->patientType->name ]['groups'];
    }

    protected function setCurrentDiagnosticGroup(string $diagnosticGroupName): ClassifierInterface
    {
        $this->currentDiagnosticGroup = DiagnosticGroup::where([
            'patient_type_id' => $this->classifierModel->patientType->id,
            'name'            => $diagnosticGroupName,
        ])->firstOrFail();

        return $this;
    }

    protected function getRecord(): array
    {
        return [
            'Record' => $this->test->data()->map(function (float $value) {
                return (string) $value;
            })->toArray(),
        ];
    }

    protected function getConnectionErrorMessage(): string
    {
        return "Could not connect to AWS model ({$this->currentDiagnosticGroup->name}), " .
               "please try later. ";
    }
}