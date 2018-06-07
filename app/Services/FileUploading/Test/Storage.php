<?php

namespace App\Services\FileUploading\Test;

use Illuminate\Http\UploadedFile;

/**
 * Class Storage
 * @package App\Services\FileUploading\Test
 */
class Storage
{
    /**
     * @var string
     */
    protected const STORAGE_PATH = 'public/tests';

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function store(UploadedFile $file): string
    {
        return $file->store(static::STORAGE_PATH);
    }
}