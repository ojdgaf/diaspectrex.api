<?php

namespace App\Services\FileUploading\Test\Validators;

use Illuminate\Support\Collection;
use App\Models\Test;

/**
 * Class Excel
 * @package App\Services\FileUploading\Test\Validators
 */
class Excel
{
    /**
     * @var int
     */
    protected $currentSheet = 0;

    /**
     * @var int
     */
    protected $currentRow = 0;

    /**
     * @var int
     */
    protected $currentCell = 0;

    /**
     * @param Collection $sheets
     */
    public function validateContent(Collection $sheets)
    {
        $sheets->each([$this, 'validateSheet']);
    }

    /**
     * @param Collection $sheet
     * @param int $key
     * @return int
     */
    public function validateSheet(Collection $sheet, int $key)
    {
        if ($sheet->isEmpty())
            return

        $this->currentSheet = $key;

        $this->validateHeading($sheet->getHeading());

        $sheet->each([$this, 'validateRow']);
    }

    /**
     * @param array $heading
     */
    public function validateHeading(array $heading)
    {
        if (collect(Test::DATA_LABELS)->diff($heading)->isNotEmpty())
            sendError(
                'Invalid heading in uploaded file:' .
                ' sheet # ' . $this->currentSheet,
                [], 422
            );
    }

    /**
     * @param Collection $row
     * @param int $key
     */
    public function validateRow(Collection $row, int $key)
    {
        $this->currentRow = $key;

        if ($row->count() !== 32)
            sendError(
                'Invalid row in uploaded file:' .
                ' sheet # ' . $this->currentSheet .
                ' row # ' . $this->currentRow,
                [], 422
            );

        $row->each([$this, 'validateCell']);
    }

    /**
     * @param $cell
     * @param $key
     */
    public function validateCell($cell, $key)
    {
        $this->currentCell = $key;

        if (! is_numeric($cell))
            sendError(
                'Invalid data in uploaded file:' .
                ' sheet # ' . $this->currentSheet .
                ' row # ' . $this->currentRow .
                ' cell # ' . $this->currentCell,
                [], 422
            );
    }
}