<?php

namespace App\Services\Classification\Evaluators;

use App\Services\Classification\Classifiers\AWSMachineLearning\Classifier;
use App\Services\Classification\Contracts\EvaluatorInterface;
use Illuminate\Support\Collection;

/**
 * Class AWSMachineLearning
 * @package App\Services\Classification\Evaluators
 */
class AWSMachineLearning implements EvaluatorInterface
{
    /**
     * @var Classifier
     */
    protected $classifier;

    /**
     * AWSMachineLearning constructor.
     *
     * @param Classifier $classifier
     */
    public function __construct(Classifier $classifier)
    {
        $this->classifier = $classifier;
    }

    /**
     * @return Collection
     */
    public function evaluate(): Collection
    {
        $configTree = $this->classifier->getConfigTreeForPatientType(
            $this->classifier->getModel()->patientType
        );

        return $this->classifier->getEvaluationIds($configTree)->map(
            function (Collection $getEvaluationRequest) {
                return (float) $this->classifier
                                    ->getClient()
                                    ->getEvaluation($getEvaluationRequest->toArray())
                                    ['PerformanceMetrics']['Properties']['BinaryAUC'];
            }
        );
    }
}