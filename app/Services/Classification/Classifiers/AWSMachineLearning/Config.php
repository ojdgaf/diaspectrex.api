<?php

namespace App\Services\Classification\Classifiers\AWSMachineLearning;

use Illuminate\Support\Collection;
use App\Models\PatientType;

/**
 * Trait Config
 * @package App\Services\Classification\Classifiers\AWSMachineLearning
 */
trait Config
{
    /**
     * @param PatientType $patientType
     *
     * @return Collection
     */
    public function getConfigTreeForPatientType(PatientType $patientType): Collection
    {
        $groupTypes = collect(config('classifier.aws machine learning.types'))->recursive();

        return $groupTypes->get($patientType->name)->get('groups');
    }

    /**
     * @param Collection $configTree
     *
     * @return Collection
     */
    public function getEvaluationIds(Collection $configTree): Collection
    {
        return $configTree->map(function (Collection $branch) {
            return $branch->only('EvaluationId');
        });
    }

    /**
     * @param Collection $configTree
     *
     * @return Collection
     */
    public function getEndpoints(Collection $configTree): Collection
    {
        return $configTree->map(function (Collection $branch) {
            return $branch->only(['MLModelId', 'PredictEndpoint']);
        });
    }

}