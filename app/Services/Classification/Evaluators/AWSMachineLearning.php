<?php

namespace App\Services\Classification\Evaluators;

use App\Services\Classification\Classifiers\AWSMachineLearning\Config;
use Illuminate\Support\Collection;

/**
 * Class AWSMachineLearning
 * @package App\Services\Classification\Evaluators
 */
class AWSMachineLearning extends Evaluator
{
    use Config;

    /**
     * @return Collection
     */
    public function evaluate(): Collection
    {
        $configTree = $this->getConfigTreeForPatientType(
            $this->classifier->getModel()->patientType
        );

        return $this->getEvaluationIds($configTree)->map(
            function (Collection $getEvaluationRequest) {
                return (float) $this->classifier
                                    ->getClient()
                                    ->getEvaluation($getEvaluationRequest->toArray())
                                    ['PerformanceMetrics']['Properties']['BinaryAUC'];
            }
        );
    }
}