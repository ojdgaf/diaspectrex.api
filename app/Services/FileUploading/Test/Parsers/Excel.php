<?php

namespace App\Services\FileUploading\Test\Parsers;

use App\Models\Prediction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel as Reader;
use App\Models\Test;
use App\Services\FileUploading\Test\Contracts\ParserInterface;
use App\Services\FileUploading\Test\Validators\Excel as Validator;

/**
 * Class Excel
 * @package App\Services\FileUploading\Test\Parsers
 */
class Excel implements ParserInterface
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var Collection
     */
    protected $content;

    /**
     * @var Collection
     */
    protected $extraTestAttributes;

    /**
     * @var Collection
     */
    protected $extraPredictionAttributes;

    /**
     * Excel constructor.
     *
     * @param Validator $validator
     */
    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
        $this->extraTestAttributes = collect([]);
        $this->extraPredictionAttributes = collect([]);
    }

    /**
     * @param UploadedFile $file
     *
     * @return $this
     */
    public function parse(UploadedFile $file): ParserInterface
    {
        $content = $this->getContent($file);

        $this->validator->validateContent($content);

        $this->content = $content;

        return $this;
    }

    /**
     * @param Collection $attributes
     *
     * @return ParserInterface
     */
    public function setExtraTestAttributes(Collection $attributes): ParserInterface
    {
        $this->extraTestAttributes = $attributes;

        return $this;
    }

    /**
     * @param Collection $attributes
     *
     * @return ParserInterface
     */
    public function setExtraPredictionAttributes(Collection $attributes): ParserInterface
    {
        $this->extraPredictionAttributes = $attributes;

        return $this;
    }

    /**
     * @return Collection
     */
    public function getTests(): Collection
    {
        return $this->content->map(function (Collection $sheet) {
            return $sheet->map(function (Collection $row) {
                return $this->getTestFromRow($row);
            });
        })->flatten();
    }

    /**
     * @return Collection
     */
    public function getPredictions(): Collection
    {
        return $this->content->map(function (Collection $sheet) {
            return $sheet->map(function (Collection $row) {
                return $this->getPredictionFromRow($row);
            });
        })->flatten();
    }

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    protected function getContent(UploadedFile $file): Collection
    {
        return Reader::load($file)->get();
    }

    /**
     * @param Collection $row
     *
     * @return Test
     */
    protected function getTestFromRow(Collection $row): Test
    {
        $attributes = $row->transform(function ($value) {
            return (float) $value;
        })->only(Test::DATA_LABELS)->union($this->extraTestAttributes);

        return new Test($attributes->toArray());
    }

    /**
     * @param Collection $row
     *
     * @return Prediction
     */
    protected function getPredictionFromRow(Collection $row): Prediction
    {
        $test = $this->getTestFromRow($row);

        $attributes = $row->only('diagnostic_group_id')->union($this->extraPredictionAttributes);

        $prediction = new Prediction($attributes->toArray());

        $prediction->loadMissing('seance', 'classifier', 'diagnosticGroup')
                    ->test()
                    ->associate($test);

        return $prediction;
    }
}