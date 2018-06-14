<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use App\Models\Classifier as Model;
use Illuminate\Support\Collection;

class Core
{
    /**
     * @var Matrix
     */
    protected $matrix;

    protected function createWMatrix(Matrix $matrix)
    {
        return new Matrix([]);
    }

    protected function findLabelsOfEmptyColumnsInAllTests(Matrix $matrix): Collection
    {
        return $matrix->testDataLabels()->filter(function (string $label) use ($matrix) {
            return $matrix->tests()->pluck($label)->first(function (float $dataValue) {
                return $dataValue !== 0.0;
            }) === null;
        });
    }
}