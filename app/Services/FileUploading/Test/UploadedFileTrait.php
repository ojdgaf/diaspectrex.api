<?php

namespace App\Services\FileUploading\Test;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

trait UploadedFileTrait
{
    /**
     * Create an UploadedFile object from absolute path.
     *
     * @param string $path
     *
     * @return UploadedFile
     */
    public function createUploadedFileFromPath($path): UploadedFile
    {
        $name = File::name($path);

        $extension = File::extension($path);

        $originalName = $name . '.' . $extension;

        $mimeType = File::mimeType($path);

        $size = File::size($path);

        return new UploadedFile($path, $originalName, $mimeType, $size, null, true);
    }
}