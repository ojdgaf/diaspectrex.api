<?php

namespace App\Services\FileUploading\Test\Contracts;

use App\Models\Test;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

/**
 * Interface ParserInterface
 * @package App\Services\FileUploading\Test
 */
interface ParserInterface
{
    /**
     * @param UploadedFile $file
     *
     * @return ParserInterface
     */
    public function parse(UploadedFile $file): ParserInterface;

    /**
     * @param Collection $attributes
     *
     * @return ParserInterface
     */
    public function setExtraTestAttributes(Collection $attributes): ParserInterface;

    /**
     * @param Collection $attributes
     *
     * @return ParserInterface
     */
    public function setExtraPredictionAttributes(Collection $attributes): ParserInterface;

    /**
     * @return Collection
     */
    public function getTests(): Collection;

    /**
     * @return Collection
     */
    public function getPredictions(): Collection;
}