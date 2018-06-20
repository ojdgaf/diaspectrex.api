<?php

namespace App\Services\FileUploading\Test;

use App\Services\FileUploading\Test\Contracts\ParserInterface;
use Illuminate\Http\UploadedFile;
use App\Services\FileUploading\Test\Parsers\Excel;

/**
 * Class Factory
 * @package App\Services\FileUploading\Test
 */
class Factory
{
    /**
     * @var array All available parsers and their classes.
     */
    protected const PARSERS = [
        'xls'  => Excel::class,
        'xlsx' => Excel::class,
    ];

    /**
     * @param UploadedFile $file
     *
     * @return bool
     */
    public function validate(UploadedFile $file)
    {
        return $file->isValid() && array_key_exists($file->extension(), static::PARSERS);
    }

    /**
     * @param UploadedFile $file
     *
     * @return ParserInterface
     */
    public function getParserInstance(UploadedFile $file): ParserInterface
    {
        $parser = static::PARSERS[ $file->extension() ];

        return app()->make($parser);
    }
}