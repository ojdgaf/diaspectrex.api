<?php

namespace App\Services\Classification\Contracts;

use App\Models\Prediction;
use App\Models\Test;

/**
 * Interface ClassifierInterface
 * @package App\Services\Classification\Contracts
 */
interface ClassifierInterface
{
    /**
     * @param Test $test
     *
     * @return Prediction
     */
    public function classify(Test $test): Prediction;

    /**
     * @return ClassifierInterface
     */
    public function train(): ClassifierInterface;
}