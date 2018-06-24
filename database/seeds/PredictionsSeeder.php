<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use App\Services\FileUploading\Test\Contracts\ServiceInterface;
use App\Models\Prediction;
use App\Models\PatientType;
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
    protected const FILENAME = 'training.xlsx';

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
        PatientType::all()->each(function (PatientType $type) {
            $this->service
                ->getParser($this->createUploadedFileFromPath(storage_path($this->getTestFilePath($type))))
                ->setExtraPredictionAttributes($this->getPredictionAttributes($type))
                ->setExtraTestAttributes($this->getTestAttributes($type))
                ->getPredictions()->each(function (Prediction $prediction) {
                    $prediction->test->save();

                    $prediction->test()->associate($prediction->test);

                    $prediction->save();
                });
        });
    }

    /**
     * @param PatientType $type
     *
     * @return Collection
     */
    protected function getPredictionAttributes(PatientType $type): Collection
    {
        switch ($type->name) {
            case 'child': return collect([
                'seance_id'     => 1,
                'classifier_id' => 2,
                'is_approved'   => true,
                'info'          => 'Database seeding',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            case 'adult': return collect([
                'seance_id'     => 2,
                'classifier_id' => 1,
                'is_approved'   => true,
                'info'          => 'Database seeding',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);

            default: return collect([]);
        }
    }

    /**
     * @param PatientType $type
     *
     * @return Collection
     */
    protected function getTestAttributes(PatientType $type): Collection
    {
        return collect([
            'file_path' => str_replace(
                'app/', '', $this->getTestFilePath($type)
            ),
        ]);
    }

    /**
     * @param PatientType $type
     *
     * @return string
     */
    protected function getTestFilePath(PatientType $type): string
    {
        return static::STORAGE_PATH . $type->name . '.' . static::FILENAME;
    }
}
