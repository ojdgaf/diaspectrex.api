<?php

namespace App\Services\Classification\Classifiers;

use App\Models\Classifier;
use App\Models\DiagnosticGroup;
use App\Models\Prediction;
use App\Models\Test;
use App\Services\Classification\Contracts\ClassifierInterface;

class DiscriminantAnalysis implements ClassifierInterface
{
    public function setTest(Test $test): ClassifierInterface
    {
        // TODO: Implement setTest() method.
    }

    public function setModel(Classifier $classifier): ClassifierInterface
    {
        // TODO: Implement setModel() method.
    }

    public function getModel(): Classifier
    {
        // TODO: Implement getModel() method.
    }

    public function classify(): Prediction
    {
        // TODO: Implement classify() method.
    }
}