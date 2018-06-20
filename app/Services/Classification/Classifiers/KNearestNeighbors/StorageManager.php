<?php

namespace App\Services\Classification\Classifiers\KNearestNeighbors;

use App\Models\Classifier as Model;
use Phpml\Estimator;
use Phpml\ModelManager as UnderlyingManager;

/**
 * Class StorageManager
 * @package App\Services\Classification\Classifiers\KNearestNeighbors
 */
class StorageManager
{
    /**
     * @var string
     */
    protected const CLASSIFIERS_FOLDER_PATH = 'app/classifiers';

    /**
     * @var UnderlyingManager
     */
    protected $manager;

    /**
     * @var Model
     */
    protected $model;

    /**
     * StorageManager constructor.
     *
     * @param UnderlyingManager $manager
     */
    public function __construct(UnderlyingManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @param Model $model
     *
     * @return $this
     */
    public function setModel(Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param Estimator $implementation
     *
     * @return bool
     */
    public function store(Estimator $implementation)
    {
        try {
            $this->manager->saveToFile($implementation, $this->getPath());
        } catch (\Exception $e) {
            sendError($e->getMessage());
        }

        return true;
    }

    /**
     * @return null|Estimator
     */
    public function restore(): ?Estimator
    {
        try {
            return $this->manager->restoreFromFile($this->getPath());
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * @return string
     */
    protected function getPath(): string
    {
        $path = static::CLASSIFIERS_FOLDER_PATH . '/' .
                $this->model->patientType->name . '.' .
                $this->model->name;

        return storage_path($path);
    }
}