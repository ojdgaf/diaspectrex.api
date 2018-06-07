<?php

namespace App\Services\FileUploading\Test\Parsers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel as Reader;
use App\Models\Test;
use App\Services\FileUploading\Test\ParserInterface;
use App\Services\FileUploading\Test\Validators\Excel as Validator;

/**
 * Class Excel
 * @package App\Services\FileUploading\Test\Parsers
 */
class Excel implements ParserInterface
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var Collection
     */
    protected $content;
    /**
     * @var null
     */
    public $filePath = null;

    /**
     * Excel constructor.
     */
    public function __construct()
    {
        $this->validator = new Validator();
    }

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function setFile(UploadedFile $file): ParserInterface
    {
        $content = $this->getContent($file);

        $this->validator->validateContent($content);

        $this->content = $content;

        return $this;
    }

    /**
     * @param string $filePath
     * @return $this
     */
    public function setFilePath(string $filePath): ParserInterface
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * @param UploadedFile $file
     * @return mixed
     */
    protected function getContent(UploadedFile $file): Collection
    {
        return Reader::load($file)->get();
    }

    /**
     * @return Test
     */
    public function getFirstModel(): Test
    {
        $row = $this->content->first()->first();

        return new Test($row->merge(['file_path' => $this->filePath])->toArray());
    }

    /**
     * @return Collection
     */
    public function getModels(): Collection
    {
        return $this->content->map(function (Collection $sheet) {
            return $sheet->map(function (Collection $row) {
                return new Test($row->merge(['file_path' => $this->filePath])->toArray());
            });
        })->flatten();
    }
}