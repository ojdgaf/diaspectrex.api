<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use App\Models\DiagnosticGroup;
use Illuminate\Support\Collection;

trait Validator
{
    use ConfigReader;

    public function validateConfigForClassifier()
    {
        try {
            $config = $this->collectConfig();

            if ($config->isEmpty())
                sendError('Empty config');

            if ($this->getConfigGroupTypes()->isEmpty())
                sendError('Empty group types in the config');

            if ($this->getConfigTypeData()->isEmpty())
                sendError("Empty config data for type {$this->classifierModel->patientType->name}");

//            if (is_null($this->getConfigSelection())

        } catch (\Exception $e) {
            sendError($e->getMessage());
        }
    }
}