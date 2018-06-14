<?php

namespace App\Services\Classification\Classifiers\DiscriminantAnalysis;

use Illuminate\Support\Collection;

/**
 * Class Matrix
 * @package App\Services\Classification\Classifiers\DiscriminantAnalysis
 */
class Matrix extends Collection
{
    /**
     * Matrix constructor.
     * @param array $items
     */
    public function __construct($items = [])
    {
        $items = collect($items)->recursive();

        parent::__construct($items);
    }

    /**
     * @return Matrix
     */
    public function clone(): Matrix
    {
        return new static($this->all());
    }

    /**
     * @return Collection
     */
    public function groups(): Collection
    {
        return collect($this->keys());
    }

    /**
     * @return Collection
     */
    public function tests(): Collection
    {
        return collect($this->flatten(1));
    }

    /**
     * @return Collection
     */
    public function testDataLabels(): Collection
    {
        return $this->tests()->first()->keys();
    }

    /**
     * @return int
     */
    public function groupsCount(): int
    {
        return $this->count();
    }

    /**
     * @return int
     */
    public function testsCount(): int
    {
        return $this->reduce(function (int $count, Collection $tests) {
            return $count + $tests->count();
        }, 0);
    }

    /**
     * @return int
     */
    public function dataCount(): int
    {
        return $this->first()->first()->count();
    }

    /**
     * @param string $groupName
     *
     * @return int
     */
    public function testsCountInGroup(string $groupName): int
    {
        return $this->get($groupName)->count();
    }

    /**
     * @param Collection $indexes
     *
     * @return Matrix
     */
    public function removeValuesFromAllTests(Collection $indexes)
    {
        $matrix = $this->clone();

        $matrix->each(function (Collection $predictions) use ($indexes) {
            $predictions->transform(function (Collection $test) use ($indexes) {
                return $test->except($indexes);
            });
        });

        return $matrix;
    }
}