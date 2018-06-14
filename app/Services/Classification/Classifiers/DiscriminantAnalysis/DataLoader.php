<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use Illuminate\Support\Collection;
use App\Models\Classifier as Model;
use App\Models\Prediction;
use App\Models\Test;

/**
 * Class DataLoader
 * @package App\Services\Classification\Classifiers\DiscriminantAnalysis
 */
class DataLoader
{
    /**
     * @param Model $classifier
     *
     * @return Collection
     */
    public function getTestsValuesGroupedByDiagnosticGroups(Model $classifier): Collection
    {
        $predictions = $this->getApprovedPredictionsWithTests($classifier);

        return $this->mapPredictions($predictions);
    }

    /**
     * @param Model $classifier
     *
     * @return Collection
     */
    protected function getApprovedPredictionsWithTests(Model $classifier): Collection
    {
        return $classifier
            ->patientType
            ->predictions()
            ->select($this->predictionAttributes())
            ->approved()
            ->with([
                'diagnosticGroup' => function($group) {
                    $group->select($this->groupAttributes());
                },
                'test' => function ($test) {
                    $test->select($this->testAttributes());
                },
            ])
            ->get();
    }

    /**
     * @param Collection $predictions
     *
     * @return Collection
     */
    protected function mapPredictions(Collection $predictions): Collection
    {
        /*
         * [
         *  0 => [
         *        typeId  => 2,
         *        groupId => 1,
         *        group   => [id => 1, name => 'standard],
         *        testId  => 5,
         *        test    => [id => 5, d2 => 5.00, ... d18500 => 5.00],
         *       ],
         *  1 => [
         *        typeId  => 2,
         *        groupId => 1,
         *        group   => [id => 1, name => 'standard],
         *        testId  => 7,
         *        test    => [id => 7, d2 => 7.00, ... d18500 => 7.00],
         *       ],
         *  2 => [
         *        typeId  => 2,
         *        groupId => 3,
         *        group   => [id => 3, name => 'bronchitis],
         *        testId  => 8,
         *        test    => [id => 8, d2 => 8.00, ... d18500 => 8.00],
         *       ],
         * ]
         */

        return $predictions
            ->groupBy(function (Prediction $prediction) {
                return $prediction->diagnosticGroup->name;
            })
            ->map(function (Collection $predictions) {
                return $predictions->mapWithKeys(function (Prediction $prediction) {
                    return [$prediction->test_id => $prediction->test->data()];
                });
            });

        /*
         * [
         *  'standard'   => [
         *                   5 => [d2 => 5.00, ... d18500 => 5.00],
         *                   7 => [d2 => 7.00, ... d18500 => 7.00],
         *                  ],
         *  'bronchitis' => [
         *                   8 => [d2 => 8.00, ... d18500 => 8.00],
         *                  ],
         * ]
         */

    }

    /**
     * @return array
     */
    protected function predictionAttributes(): array
    {
        return ['patient_type_id', 'diagnostic_group_id', 'test_id'];
    }

    /**
     * @return array
     */
    protected function groupAttributes(): array
    {
        return ['id', 'name'];
    }

    /**
     * @return array
     */
    protected function testAttributes(): array
    {
        return array_merge(['id'], Test::DATA_LABELS);
    }
}