<?php

namespace App\Services\Classification\Contracts;

use App\Models\Classifier;

/**
 * Interface ServiceInterface
 * @package App\Services\Classification\Contracts
 */
interface ServiceInterface
{
    /**
     * @param Classifier $classifierModel
     *
     * @return ClassifierInterface
     */
    public function getClassifier(Classifier $classifierModel): ClassifierInterface;


    /**
     * @param Classifier $classifierModel
     *
     * @return EvaluatorInterface
     */
    public function getEvaluator(Classifier $classifierModel): EvaluatorInterface;
}