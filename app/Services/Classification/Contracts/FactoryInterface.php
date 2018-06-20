<?php

namespace App\Services\Classification\Contracts;

use App\Models\Classifier;

/**
 * Interface FactoryInterface
 * @package App\Services\Classification\Contracts
 */
interface FactoryInterface
{
    /**
     * @param Classifier $classifierModel
     *
     * @return ClassifierInterface
     */
    public function getClassifierInstance(Classifier $classifierModel): ClassifierInterface;

    /**
     * @param Classifier $classifierModel
     *
     * @return EvaluatorInterface
     */
    public function getEvaluatorInstance(Classifier $classifierModel): EvaluatorInterface;
}