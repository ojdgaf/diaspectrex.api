<?php

namespace App\Services\Classification;

use App\Models\DiagnosticGroup;
use App\Models\Test;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\Classification\Contracts\PredictionInterface;

class Prediction implements PredictionInterface
{
    protected $test;
    protected $classifier;
    protected $diagnosticGroup;
    protected $rawValue;
    protected $info;

    public function __construct(
        Test $test,
        ClassifierInterface $classifier,
        DiagnosticGroup $diagnosticGroup = null,
        float $rawValue = null,
        string $info = ''
    ) {
        $this->test = $test;
        $this->classifier = $classifier;
        $this->diagnosticGroup = $diagnosticGroup;
        $this->rawValue = $rawValue;
        $this->info = $info;
    }

    public function successfully(): bool
    {
        return ! is_null($this->diagnosticGroup);
    }

    public function getTest(): Test
    {
        return $this->test;
    }

    public function getClassifier(): ClassifierInterface
    {
        return $this->classifier;
    }

    public function getDiagnosticGroup(): ?DiagnosticGroup
    {
        return $this->diagnosticGroup;
    }

    public function getRawValue(): ?float
    {
        return $this->rawValue;
    }

    public function getInfo(): string
    {
        return $this->info;
    }
}