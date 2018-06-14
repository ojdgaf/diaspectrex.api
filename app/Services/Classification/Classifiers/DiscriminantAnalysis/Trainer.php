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

        $this->setMatrix();

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
        $collection = $this->loader->getTestsValuesGroupedByDiagnosticGroups($this->classifierModel);

        $this->matrix = new Matrix($collection);

        return $this;
    }
}