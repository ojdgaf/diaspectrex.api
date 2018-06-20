<?php

namespace App\Services\FileUploading\Test\Contracts;

use Illuminate\Http\UploadedFile;

/**
 * Interface ServiceInterface
 * @package App\Services\FileUploading\Test\Contracts
 */
interface ServiceInterface
{
    /**
     * @param UploadedFile $file
     *
     * @return ParserInterface
     */
    public function getParser(UploadedFile $file): ParserInterface;

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    public function store(UploadedFile $file): string;
}