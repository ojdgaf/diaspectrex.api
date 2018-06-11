<?php

namespace App\Services\Classification\Contracts;

use App\Models\Classifier;
use Illuminate\Support\Collection;

/**
 * Interface ServiceInterface
 * @package App\Services\Classification\Contracts
 */
interface ServiceInterface
{
    /**
     * @param Classifier $classifierModel
     * @return ClassifierInterface
     */
    public function getClassifier(Classifier $classifierModel): ClassifierInterface;
}