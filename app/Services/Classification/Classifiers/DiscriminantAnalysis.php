<?php

namespace App\Services\Classification\Classifiers;

use App\Models\DiagnosticGroup;
use App\Models\Test;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Contracts\PredictionInterface;

class DiscriminantAnalysis implements ClassifierInterface
{
    public function setTest(Test $test): ClassifierInterface
    {
        // TODO: Implement setTest() method.
    }

    public function classify(): PredictionInterface
    {
        // TODO: Implement classify() method.
    }
}