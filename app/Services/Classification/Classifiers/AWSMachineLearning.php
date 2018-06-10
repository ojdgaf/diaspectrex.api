<?php

namespace App\Services\Classification\Classifiers;

use App\Models\DiagnosticGroup;
use App\Models\Test;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Contracts\PredictionInterface;
use App\Services\Classification\Prediction;
use Aws\MachineLearning\MachineLearningClient;
use Illuminate\Support\Collection;

class AWSMachineLearning implements ClassifierInterface
{
    protected const UNKNOWN_GROUP_MESSAGE = 'None of AWS Machine Learning models gave positive result: ' .
    'seems like the test example belongs to another (unknown by us yet) disease, ' .
    'or it is just a mix of several diseases. ' .
    'After all we may simply be unable to connect to AWS services. ' .
    'There are detailed information provided by each of them. ';

    protected const AMBIGUITY_MESSAGE = 'Two or more AWS Machine Learning models gave positive result: ' .
    'seems like it is just a mix of several diseases so we cannot be sure what actual disease is. ' .
    'There are detailed information provided by each of AWS service. ';

    /**
     * @var MachineLearningClient
     */
    protected $client;

    /**
     * @var Test
     */
    protected $test;

    public function __construct()
    {
        $this->client = new MachineLearningClient(config('neural-network.aws.client'));
    }

    public function setTest(Test $test): ClassifierInterface
    {
        $this->test = $test;

        return $this;
    }

    public function classify(): PredictionInterface
    {
        $configTree = config('neural-network.aws.tree');

        $predictions = $this->callModelsToPredict($configTree);

        return $this->getFinalPrediction($predictions);
    }

    protected function callModelsToPredict(array $configTree): Collection
    {
        return collect($configTree)->map(function (array $configBranch) {
            return $this->callModelToPredict($configBranch);
        });
    }

    protected function callModelToPredict(array $configBranch): PredictionInterface
    {
        $groupName = $configBranch['group']['name'];

        try {
            $response = $this->client->predict(
                array_merge($configBranch['endpoint'], $this->getRecord())
            );
        } catch (\Exception $e) {
            return new Prediction(
                $this->test, $this, null, false,
                "Could not connect to AWS model ($groupName), please try later. "
            );
        }

        $predictedLabel = (int) $response['Prediction']['predictedLabel'];

        $diagnosticGroup = $predictedLabel === 1 ?
            DiagnosticGroup::whereName($groupName)->firstOrFail() : null;

        $rawValue = (float) $response['Prediction']['predictedScores'][$predictedLabel];

        return new Prediction($this->test, $this, $diagnosticGroup, $rawValue);
    }

    protected function getFinalPrediction(Collection $predictions): PredictionInterface
    {
        $allPredictionsAreNegative = $predictions->every(function (PredictionInterface $prediction) {
            return $prediction->successfully() === false;
        });

        if ($allPredictionsAreNegative)
            return $this->createReportWithDetailedMessage(
                $predictions,
                static::UNKNOWN_GROUP_MESSAGE
            );

        $positivePredictions = $predictions->filter(function (PredictionInterface $prediction) {
            return $prediction->successfully() === true;
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
    ): PredictionInterface {
        $predictions->each(function (PredictionInterface $prediction) use (&$message) {
            $info = $prediction->getInfo() .
                ($prediction->getRawValue() ? 'Raw value: ' . $prediction->getRawValue() . '. ' : '');

            $message .= $info;
        });

        return new Prediction($this->test, $this, null, null, $message);
    }

    protected function getRecord(): array
    {
        return [
            'Record' => $this->test->getDValues()->map(function (float $value) {
                return (string) $value;
            })->toArray(),
        ];
    }
}