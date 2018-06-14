<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use App\Models\PatientType;
use Illuminate\Support\Collection;

/**
 * Trait ConfigReader
 * @package App\Services\Classification\Classifiers\DiscriminantAnalysis
 */
trait ConfigReader
{
    /**
     * @return Collection
     */
    protected function collectConfig(): Collection
    {
        return collect(config('classifier.discriminant analysis'))->recursive();
    }

    /**
     * @return Collection
     */
    protected function getConfigGroupTypes(): Collection
    {
        return $this->collectConfig()->get('types');
    }

    /**
     * @return Collection
     */
    protected function getConfigTypeData(): Collection
    {
        return $this->getConfigGroupTypes()->get($this->classifierModel->patientType->name);

    }

    /**
     * @return Collection
     */
    protected function getConfigTypeGroups(): Collection
    {
        return $this->getConfigTypeData()->get('groups');
    }

    /**
     * @return Collection
     */
    protected function getConfigSelection(): Collection
    {
        return $this->getConfigTypeData()->get('selection');
    }

    /**
     * @return Collection
     */
    protected function getConfigConstants(): Collection
    {
        return $this->getConfigTypeGroups()->map(function (Collection $group) {
            return $group->get('constant');
        });
    }

    /**
     * @return Collection
     */
    protected function getConfigCoefficients(): Collection
    {
        return $this->getConfigTypeGroups()->map(function (Collection $group) {
            return $group->get('coefficients');
        });
    }

}