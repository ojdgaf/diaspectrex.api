<?php

namespace App\Services\Classification;

use App\Services\Classification\Contracts\EvaluatorInterface;
use App\Services\Classification\Contracts\FactoryInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Contracts\ServiceInterface;
use App\Models\Classifier as Model;

/**
 * Class Service
 * @package App\Services\Classification
 */
class Service implements ServiceInterface
{
    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * Service constructor.
     *
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @param Model $model
     *
     * @return ClassifierInterface
     */
    public function getClassifier(Model $model): ClassifierInterface
    {
        return $this->factory->getClassifierInstance($model);
    }

    /**
     * @param Model $model
     *
     * @return EvaluatorInterface
     */
    public function getEvaluator(Model $model): EvaluatorInterface
    {
        return $this->factory->getEvaluatorInstance($model);
    }
}