<?php

namespace App\Services\Classification\Contracts;

use App\Models\DiagnosticGroup;
use App\Models\Test;

interface PredictionInterface
{
    public function successfully(): bool;

    public function getTest(): Test;

    public function getClassifier(): ClassifierInterface;

    public function getDiagnosticGroup(): ?DiagnosticGroup;

    public function getRawValue(): ?float;

    public function getInfo(): string;
}