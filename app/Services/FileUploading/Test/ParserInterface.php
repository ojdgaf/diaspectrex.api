<?php

namespace App\Services\FileUploading\Test;

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
     * @return ParserInterface
     */
    public function setFile(UploadedFile $file): ParserInterface;

    /**
     * @param string $filePath
     * @return ParserInterface
     */
    public function setFilePath(string $filePath): ParserInterface;

    /**
     * @return Test
     */
    public function getFirstModel(): Test;

    /**
     * @return Collection
     */
    public function getModels(): Collection;
}