<?php

namespace App\Services\Classification\Common;

use Illuminate\Support\Collection;
use App\Models\Classifier as Model;
use App\Models\Prediction;
use App\Models\Test;

/**
 * Class DatabaseDataLoader
 * @package App\Services\Classification\Classifiers\DiscriminantAnalysis
 */
class DatabaseDataLoader
{
    /**
     * @param Model $model
     *
     * @return Collection
     */
    public function getTrainDataForClassifier(Model $model): Collection
    {
        $predictions = $this->getApprovedPredictionsWithTests($model);

        return $this->mapPredictionsForClassifier($predictions, $model);
    }

    /**
     * @param Model $model
     *
     * @return Collection
     */
    public function getApprovedPredictionsWithTests(Model $model): Collection
    {
        /*
         * [
         *  [
         *   typeId  => 2,
         *   groupId => 1,
         *   group   => [id => 1, name => 'standard],
         *   testId  => 5,
         *   test    => [id => 5, d2 => 5.00, ... d18500 => 5.00],
         *  ],
         *  [
         *   typeId  => 2,
         *   groupId => 1,
         *   group   => [id => 1, name => 'standard],
         *   testId  => 7,
         *   test    => [id => 7, d2 => 7.00, ... d18500 => 7.00],
         *  ],
         *  [
         *   typeId  => 2,
         *   groupId => 3,
         *   group   => [id => 3, name => 'bronchitis],
         *   testId  => 8,
         *   test    => [id => 8, d2 => 8.00, ... d18500 => 8.00],
         *  ],
         * ]
         */

        return $model
            ->patientType
            ->predictions()
            ->select($this->predictionAttributes())
            ->approved()
            ->with([
                'diagnosticGroup' => function ($group) {
                    $group->select($this->groupAttributes());
                },
                'test'            => function ($test) {
                    $test->select($this->testAttributes());
                },
            ])
            ->get();
    }

    /**
     * @param Collection $predictions
     * @param Model $model
     *
     * @return Collection
     */
    public function mapPredictionsForClassifier(
        Collection $predictions,
        Model $model
    ): Collection {
        switch ($model->name) {
            case 'discriminant analysis': return $this->mapForDiscriminantAnalysis($predictions);
            case 'k-nearest neighbors': return $this->mapForKNearestNeighbors($predictions);
            default: return $predictions;
        }
    }

    /**
     * @param Collection $predictions
     *
     * @return Collection
     */
    public function mapForDiscriminantAnalysis(Collection $predictions): Collection
    {
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

        return $predictions
            ->groupBy(function (Prediction $prediction) {
                return $prediction->diagnosticGroup->name;
            })
            ->map(function (Collection $predictions) {
                return $predictions->mapWithKeys(function (Prediction $prediction) {
                    return [$prediction->test_id => $prediction->test->data()];
                });
            });
    }

    /**
     * @param Collection $predictions
     *
     * @return Collection
     */
    public function mapForKNearestNeighbors(Collection $predictions): Collection
    {
        /*
         * [
         *  'values' => [
         *               [d2 => 5.00, ... d18500 => 5.00],
         *               [d2 => 7.00, ... d18500 => 7.00],
         *               [d2 => 8.00, ... d18500 => 8.00],
         *              ],
         *  'labels' => [
         *               'standard',
         *               'standard',
         *               'bronchitis',
         *              ],
         * ]
         */

        $tests = $predictions->pluck('test')->map(function (Test $test) {
            return $test->data()->values();
        });

        return collect([
            'values' => $tests,
            'labels' => $predictions->pluck('diagnosticGroup')->pluck('name'),
        ]);
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