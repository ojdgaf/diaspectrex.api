<?php

namespace App\Services\Classification\Evaluators;

use App\Models\Prediction;
use App\Services\Classification\Contracts\EvaluatorInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use App\Services\FileUploading\Test\Contracts\ServiceInterface;
use App\Services\FileUploading\Test\UploadedFileTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Models\PatientType;

/**
 * Class Evaluator
 * @package App\Services\Classification\Evaluators
 */
class Evaluator implements EvaluatorInterface
{
    use UploadedFileTrait;

    /**
     * @var string
     */
    protected const STORAGE_PATH = 'app/tests/other classifiers/';

    /**
     * @var string
     */
    protected const FILENAME = 'evaluation.xlsx';

    /**
     * @var ClassifierInterface
     */
    protected $classifier;

    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * AWSMachineLearning constructor.
     *
     * @param ClassifierInterface $classifier
     * @param ServiceInterface $service
     */
    public function __construct(ClassifierInterface $classifier, ServiceInterface $service)
    {
        $this->classifier = $classifier;
        $this->service = $service;
    }

    /**
     * @return Collection
     */
    public function evaluate(): Collection
    {
        # TODO getModel() in interface

        $type = $this->classifier->getModel()->patientType;

        $samples = $this->getSamples($type);

        $expected = $this->getExpectedLabels($samples);

        $evaluated = $this->getEvaluatedLabels($samples);

        return collect($this->makeEvaluationForPatientType($type, $expected, $evaluated));
    }

    /**
     * @param PatientType $type
     *
     * @return UploadedFile
     */
    protected function getEvaluationFile(PatientType $type): UploadedFile
    {
        return $this->createUploadedFileFromPath(
            storage_path(static::STORAGE_PATH . $type->name . '.' . static::FILENAME)
        );
    }

    /**
     * @param PatientType $type
     *
     * @return Collection
     */
    protected function getSamples(PatientType $type): Collection
    {
        return $this->service->getParser($this->getEvaluationFile($type))->getPredictions();
    }

    /**
     * @param Collection $samples
     *
     * @return Collection
     */
    protected function getExpectedLabels(Collection $samples): Collection
    {
        return $samples->map(function (Prediction $prediction) {
            return $prediction->diagnosticGroup->name;
        });
    }

    /**
     * @param Collection $samples
     *
     * @return Collection
     */
    protected function getEvaluatedLabels(Collection $samples): Collection
    {
        return $samples->map(function (Prediction $sample) {
            $diagnosticGroup = $this->classifier->classify($sample->test)->diagnosticGroup;

            return optional($diagnosticGroup)->name;
        });
    }

    /**
     * @param PatientType $type
     * @param Collection $expected
     * @param Collection $evaluated
     *
     * @return array
     */
    protected function makeEvaluationForPatientType(
        PatientType $type,
        Collection $expected,
        Collection $evaluated
    ) {
        $matches = 0;

        $expected->each(function ($item, $key) use ($evaluated, &$matches) {
            if ($item === $evaluated->get($key))
                $matches++;
        });

        return [
            $type->name => [
                'expected'       => $expected,
                'evaluated'      => $evaluated,
                'expected count' => $expected->count(),
                'matches'        => $matches,
                'accuracy'       => ($matches / $expected->count()),
            ],
        ];
    }
}