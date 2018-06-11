<?php

namespace App\Services\Classification;

use Illuminate\Support\Collection;
use App\Models\Classifier;
use App\Services\Classification\Contracts\ClassifierFactoryInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Contracts\ServiceInterface;

class Service implements ServiceInterface
{
    protected $classifierFactory;

    public function __construct(ClassifierFactoryInterface $factory)
    {
        $this->classifierFactory = $factory;
    }

    public function getClassifier(Classifier $classifier): ClassifierInterface
    {
        return $this->classifierFactory->getClassifierInstance($classifier);
    }
}