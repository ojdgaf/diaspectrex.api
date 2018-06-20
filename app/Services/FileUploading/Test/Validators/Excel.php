<?php

namespace App\Services\FileUploading\Test\Validators;

use Illuminate\Support\Collection;
use App\Models\DiagnosticGroup;
use App\Models\Test;

/**
 * Class Excel
 * @package App\Services\FileUploading\Test\Validators
 */
class Excel
{
    /**
     * @var string
     */
    protected const DIAGNOSTIC_GROUP_LABEL = 'diagnostic_group_id';

    /**
     * @var Collection
     */
    protected $diagnosticGroupIds;

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
     * Excel constructor.
     */
    public function __construct()
    {
        $this->diagnosticGroupIds = DiagnosticGroup::pluck('id');
    }

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
     */
    public function validateSheet(Collection $sheet, int $key)
    {
        if ($sheet->isEmpty())
            return;

        $this->currentSheet = $key + 1;

        $this->validateHeading($sheet->getHeading());

        $sheet->each([$this, 'validateRow']);
    }

    /**
     * @param array $heading
     */
    public function validateHeading(array $heading)
    {
        $length = count($heading);

        if ($length !== 32 && $length !== 33)
            sendError(
                'Invalid heading length in uploaded file:' .
                ' sheet # ' . $this->currentSheet,
                [], 422
            );

        $dataLabels = collect(Test::DATA_LABELS);
        $dataLabelsWithGroupId = $dataLabels->concat([static::DIAGNOSTIC_GROUP_LABEL]);

        $testsOnly = $dataLabels->diff($heading)->isEmpty();
        $testsWithResults = $dataLabelsWithGroupId->diff($heading)->isEmpty();

        if ($length === 32 && !$testsOnly)
            sendError(
                'Invalid heading (data labels) in uploaded file:' .
                ' sheet # ' . $this->currentSheet,
                [], 422
            );

        if ($length === 33 && !$testsWithResults)
            sendError(
                'Invalid heading (data or group labels) in uploaded file:' .
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
        $this->currentRow = $key + 1;

        if ($row->count() !== 32 && $row->count() !== 33)
            sendError(
                'Invalid row length in uploaded file:' .
                ' sheet # ' . $this->currentSheet .
                ' row # ' . $this->currentRow,
                [], 422
            );

        $row->each([$this, 'validateCell']);
    }

    /**
     * @param $value
     * @param $key
     */
    public function validateCell($value, $key)
    {
        $this->currentCell = $key;

        if (! is_numeric($value))
            sendError(
                'Invalid data in uploaded file:' .
                ' sheet # ' . $this->currentSheet .
                ' row # ' . $this->currentRow .
                ' column # ' . $this->currentCell,
                [], 422
            );

        if ($key === static::DIAGNOSTIC_GROUP_LABEL && ! $this->diagnosticGroupIds->contains($value))
            sendError(
                'Invalid diagnostic group id in uploaded file:' .
                ' sheet # ' . $this->currentSheet .
                ' row # ' . $this->currentRow .
                ' column # ' . $this->currentCell,
                [], 422
            );
    }
}