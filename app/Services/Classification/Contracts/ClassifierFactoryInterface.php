<?php

namespace App\Services\Classification\Contracts;

use App\Models\Classifier;
use Illuminate\Support\Collection;

interface ClassifierFactoryInterface
{
    public function getClassifierInstances(): Collection;

    public function getClassifierInstance(Classifier $classifierModel): ClassifierInterface;
}