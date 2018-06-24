<?php

namespace App\Services\Classification;

use App\Models\Classifier as Model;
use App\Services\Classification\Contracts\EvaluatorInterface;
use App\Services\Classification\Contracts\FactoryInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Classifiers\AWSMachineLearning\Classifier   as AWSMachineLearningClassifier;
use App\Services\Classification\Classifiers\DiscriminantAnalysis\Classifier as DiscriminantAnalysisClassifier;
use App\Services\Classification\Classifiers\KNearestNeighbors\Classifier    as KNearestNeighborsClassifier;
use App\Services\Classification\Evaluators\AWSMachineLearning   as AWSMachineLearningEvaluator;
use App\Services\Classification\Evaluators\DiscriminantAnalysis as DiscriminantAnalysisEvaluator;
use App\Services\Classification\Evaluators\KNearestNeighbors    as KNearestNeighborsEvaluator;

/**
 * Class Factory
 * @package App\Services\Classification
 */
class Factory implements FactoryInterface
{
    /**
     * Available classifiers.
     *
     * @var array
     */
    protected const CLASSIFIERS = [
        'aws machine learning'  => AWSMachineLearningClassifier::class,
        'discriminant analysis' => DiscriminantAnalysisClassifier::class,
        'k-nearest neighbors'   => KNearestNeighborsClassifier::class,
    ];

    /**
     * Available evaluators.
     *
     * @var array
     */
    protected const EVALUATORS = [
        'aws machine learning'  => AWSMachineLearningEvaluator::class,
        'discriminant analysis' => DiscriminantAnalysisEvaluator::class,
        'k-nearest neighbors'   => KNearestNeighborsEvaluator::class,
    ];

    /**
     * @param Model $model
     *
     * @return ClassifierInterface
     */
    public function getClassifierInstance(Model $model): ClassifierInterface
    {
        $classifier = collect(static::CLASSIFIERS)->get($model->name);

        return app()->makeWith($classifier, [
            'model' => $model
        ]);
    }

    /**
     * @param Model $model
     *
     * @return EvaluatorInterface
     */
    public function getEvaluatorInstance(Model $model): EvaluatorInterface
    {
        $evaluator = collect(static::EVALUATORS)->get($model->name);

        return app()->makeWith($evaluator, [
            'classifier' => $this->getClassifierInstance($model)
        ]);
    }
}