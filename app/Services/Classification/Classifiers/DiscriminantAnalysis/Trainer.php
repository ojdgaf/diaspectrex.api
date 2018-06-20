<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use App\Models\Classifier as Model;
use Illuminate\Support\Collection;

/**
 * Class Trainer
 * @package App\Services\Classification\Classifiers\DiscriminantAnalysis
 */
class Trainer extends Core
{
    use ConfigReader;

    /**
     * @var DataLoader
     */
    protected $loader;

    /**
     * @var Model
     */
    protected $classifierModel;

    /**
     * Trainer constructor.
     *
     * @param DataLoader $loader
     */
    public function __construct(DataLoader $loader)
    {
        $this->loader = $loader;
    }

    /**
     * @param Model $classifierModel
     */
    public function train(Model $classifierModel)
    {
        $this->classifierModel = $classifierModel;

        $this->setMatrix()->validateMatrix();

        $labels = $this->findLabelsOfEmptyColumnsInAllTests($this->matrix);

        dd($labels);

        $this->matrix = $this->matrix->removeValuesFromAllTests($labels);

        dd($this->matrix);
    }

    /**
     * @return Trainer
     */
    protected function setMatrix(): Trainer
    {
        $collection = $this->loader->getTrainDataForClassifier($this->classifierModel);

        $this->matrix = new Matrix($collection);

        return $this;
    }

    protected function validateMatrix(): Trainer
    {
        if ($this->matrix->isEmpty())
            sendError('Empty matrix: no approved predictions find for specified patient type');

        if ($this->matrix->groupsCount() < 2)
            sendError('Not sufficient groups count (less that two)');

        return $this;
    }
}