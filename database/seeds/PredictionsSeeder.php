<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Services\FileUploading\Test\Contracts\ServiceInterface;
use App\Models\Prediction;
use App\Services\FileUploading\Test\UploadedFileTrait;

/**
 * Class PredictionsSeeder
 */
class PredictionsSeeder extends Seeder
{
    use UploadedFileTrait;

    /**
     * @var string
     */
    protected const STORAGE_PATH = 'app/tests/other classifiers/';

    /**
     * @var string
     */
    protected const ADULTS_TESTS_FILENAME = 'adult.training.xlsx';

    /**
     * @var string
     */
    protected const CHILDREN_TESTS_FILENAME = 'child.training.xlsx';

    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * PredictionController constructor.
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $childrenPredictions = $this->service
            ->getParser($this->createUploadedFileFromPath(storage_path($this->childrenTestsFilePath())))
            ->setExtraPredictionAttributes($this->predictionAttributesForChildren())
            ->setExtraTestAttributes($this->testAttributesForChildren())
            ->getPredictions();

        $adultsPredictions = $this->service
            ->getParser($this->createUploadedFileFromPath(storage_path($this->adultsTestsFilePath())))
            ->setExtraPredictionAttributes($this->predictionAttributesForAdults())
            ->setExtraTestAttributes($this->testAttributesForAdults())
            ->getPredictions();

        $childrenPredictions
            ->merge($adultsPredictions)
            ->each(function (Prediction $prediction) {
                $prediction->test->save();

                $prediction->test()->associate($prediction->test);

                $prediction->save();
            });
    }

    /**
     * @return Collection
     */
    protected function predictionAttributesForChildren(): Collection
    {
        return collect([
            'seance_id'     => 1,
            'classifier_id' => 2,
            'is_approved'   => true,
            'info'          => 'Database seeding',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    /**
     * @return Collection
     */
    protected function predictionAttributesForAdults(): Collection
    {
        return collect([
            'seance_id'     => 2,
            'classifier_id' => 1,
            'is_approved'   => true,
            'info'          => 'Database seeding',
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }

    /**
     * @return Collection
     */
    protected function testAttributesForChildren(): Collection
    {
        return collect([
            'file_path' => str_replace('app/', '', $this->childrenTestsFilePath()),
        ]);
    }

    /**
     * @return Collection
     */
    protected function testAttributesForAdults(): Collection
    {
        return collect([
            'file_path' => str_replace('app/', '', $this->adultsTestsFilePath()),
        ]);
    }

    /**
     * @return string
     */
    protected function childrenTestsFilePath(): string
    {
        return static::STORAGE_PATH . static::CHILDREN_TESTS_FILENAME;
    }

    /**
     * @return string
     */
    protected function adultsTestsFilePath(): string
    {
        return static::STORAGE_PATH . static::ADULTS_TESTS_FILENAME;
    }
}
