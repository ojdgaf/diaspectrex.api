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
        'aws machine learning'  => AWSMachineLearning::class,
        'discriminant analysis' => DiscriminantAnalysis::class,
    ];

    public function getClassifierInstance(Classifier $classifierModel): ClassifierInterface
    {
        $classifier = collect(static::CLASSIFIERS)->get($classifierModel->name);

        return (new $classifier)->setModel($classifierModel);
    }
}