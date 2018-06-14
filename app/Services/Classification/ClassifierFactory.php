<?php

namespace App\Services\Classification;

use App\Models\Classifier;
use App\Services\Classification\Contracts\ClassifierFactoryInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Classifiers\AWSMachineLearning;
use App\Services\Classification\Classifiers\DiscriminantAnalysis\Classifier as DiscriminantAnalysis;

class ClassifierFactory implements ClassifierFactoryInterface
{
    protected const CLASSIFIERS = [
        'aws machine learning'  => AWSMachineLearning::class,
        'discriminant analysis' => DiscriminantAnalysis::class,
    ];

    public function getClassifierInstance(Classifier $classifierModel): ClassifierInterface
    {
        $classifier = collect(static::CLASSIFIERS)->get($classifierModel->name);

        return app()->makeWith($classifier, ['classifierModel' => $classifierModel]);
    }
}