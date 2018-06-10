<?php

namespace App\Services\Classification\Contracts;

use App\Models\Test;

interface ClassifierInterface
{
    public function setTest(Test $test): ClassifierInterface;

    public function classify(): PredictionInterface;
}