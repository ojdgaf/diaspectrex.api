<?php

namespace App\Services\FileUploading\Test;

use App\Models\Test;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ParserInterface
{
    public function setFile(UploadedFile $file): ParserInterface;

    public function setFilePath(string $filePath): ParserInterface;

    public function getFirstModel(): Test;

    public function getModels(): Collection;
}