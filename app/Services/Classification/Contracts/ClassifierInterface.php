<?php

namespace App\Services\Classification\Contracts;

use App\Models\Classifier;
use App\Models\Prediction;
use App\Models\Test;

interface ClassifierInterface
{
    public function setModel(Classifier $classifier): ClassifierInterface;

    public function setTest(Test $test): ClassifierInterface;

    public function getModel(): Classifier;

    public function classify(): Prediction;
}