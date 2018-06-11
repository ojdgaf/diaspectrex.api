<?php

namespace App\Services\Classification\Contracts;

use App\Models\Classifier;

interface ClassifierFactoryInterface
{
    public function getClassifierInstance(Classifier $classifierModel): ClassifierInterface;
}