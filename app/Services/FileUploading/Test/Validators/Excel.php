<?php

namespace App\Services\FileUploading\Test\Validators;

use Illuminate\Support\Collection;

/**
 * Class Excel
 * @package App\Services\FileUploading\Test\Validators
 */
class Excel
{
    /**
     * @var array Available keys for each row.
     */
    protected const HEADING = [
        'd2', 'd3', 'd4', 'd5', 'd6', 'd8', 'd11', 'd15', 'd20', 'd26', 'd36',
        'd40', 'd65', 'd85', 'd120', 'd150', 'd210', 'd290', 'd300', 'd520',
        'd700', 'd950', 'd1300', 'd1700', 'd2300', 'd3100', 'd4200', 'd5600',
        'd7600', 'd10200', 'd13800', 'd18500',
    ];

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
        if (collect(static::HEADING)->diff($heading)->isNotEmpty())
            sendError('Invalid heading in uploaded file: sheet # ' . $this->currentSheet);
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
                ' row # ' . $this->currentRow
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
                ' cell # ' . $this->currentCell
            );
    }
}