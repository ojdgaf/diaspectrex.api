<?php

namespace App\Services\FileUploading\Test;

use App\Services\FileUploading\Test\Contracts\ServiceInterface;
use Illuminate\Http\UploadedFile;
use App\Services\FileUploading\Test\Contracts\ParserInterface;

/**
 * Class Service
 * @package App\Services\FileUploading\Test
 */
class Service implements ServiceInterface
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
     *
     * @param Factory $factory
     * @param Storage $storage
     */
    public function __construct(Factory $factory, Storage $storage)
    {
        $this->factory = $factory;
        $this->storage = $storage;
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
            sendError('Unsupported test file extension', [], 422);
    }

    /**
     * @param UploadedFile $file
     *
     * @return ParserInterface
     */
    public function getParser(UploadedFile $file): ParserInterface
    {
        $this->validateWithThrow($file);

        return $this->factory->getParserInstance($file)->parse($file);
    }

    /**
     * @param UploadedFile $file
     *
     * @return string
     */
    public function store(UploadedFile $file): string
    {
        $this->validateWithThrow($file);

        return $this->storage->store($file);
    }
}