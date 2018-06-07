<?php

namespace App\Services\FileUploading\Test;

use Illuminate\Http\UploadedFile;

/**
 * Class Service
 * @package App\Services\FileUploading\Test
 */
class Service
{
    /**
     * @var Factory
     */
    protected $factory;

    /**
     * @var Storage
     */
    protected $storage;

    /**
     * Service constructor.
     */
    public function __construct()
    {
        $this->factory = new Factory();
        $this->storage = new Storage();
    }

    /**
     * @param UploadedFile $file
     * @return bool
     */
    public function validate(UploadedFile $file): bool
    {
        return $this->factory->validate($file);
    }

    /**
     * @param UploadedFile $file
     */
    public function validateWithThrow(UploadedFile $file)
    {
        if (! $this->validate($file))
            sendError('Unsupported test file extension', 422);
    }

    /**
     * @param UploadedFile $file
     * @return ParserInterface
     */
    public function getParser(UploadedFile $file): ParserInterface
    {
        $this->validateWithThrow($file);

        return $this->factory->findParser($file)->setFile($file)->setFilePath($this->store($file));
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    public function store(UploadedFile $file): string
    {
        $this->validateWithThrow($file);

        return $this->storage->store($file);
    }
}