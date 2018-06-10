<?php

namespace App\Services\Classification;

use Illuminate\Support\Collection;
use App\Models\Classifier;
use App\Services\Classification\Contracts\ClassifierFactoryInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Classifiers\DiscriminantAnalysis;
use App\Services\Classification\Classifiers\AWSMachineLearning;

class ClassifierFactory implements ClassifierFactoryInterface
{
    protected const CLASSIFIERS = [
        'neural network'        => AWSMachineLearning::class,
        'discriminant analysis' => DiscriminantAnalysis::class,
    ];

    public function getClassifierInstances(): Collection
    {
        return collect(static::CLASSIFIERS)->map(function (ClassifierInterface $classifier) {
            return new $classifier;
        });
    }

    public function getClassifierInstance(Classifier $classifierModel): ClassifierInterface
    {
        $classifierClass = collect(static::CLASSIFIERS)->get($classifierModel->name);

        return new $classifierClass;
    }
}