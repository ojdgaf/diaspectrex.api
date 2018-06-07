<?php

namespace App\Services\FileUploading\Test;

use Illuminate\Http\UploadedFile;

class Storage
{
    protected const STORAGE_PATH = 'tests';

    public function store(UploadedFile $file): string
    {
        return $file->store(static::STORAGE_PATH);
    }
}