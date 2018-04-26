<?php

namespace App\Http\Controllers\Diagnosing;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\Users\Patient;
use App\Models\Diagnosing\Test;
use Maatwebsite\Excel\Facades\Excel;

class TestController
{
    public function createTestManually(Request $request)
    {
        $patient = Patient::findOrFail($request->user_id);

        $test = new Test($request->all());

        $patient->diagnosticCard->tests()->save($test);

        return [
            'success' => true,
            'message' => 'Test has been successfully attached to the patient',
            'data' => [],
        ];
    }
    public function createTestFromFile(Request $request)
    {
        $patient = Patient::findOrFail($request->user_id);

        $test = $this->getTestModelFromFile($request->test);

        $patient->diagnosticCard->tests()->save($test);

        return [
            'success' => true,
            'message' => 'File has been successfully uploaded and attached to the patient',
            'data' => [],
        ];
    }
    protected function getTestModelFromFile(UploadedFile $file): Test
    {
        $data = Excel::load($file)->get();

        $row = $data->toArray()[0][0];

        return new Test($row);
    }
}