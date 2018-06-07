<?php

namespace App\Http\Controllers\Diagnosing;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\FileUploading\Test\Service as TestService;

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

    public function store(Request $request)
    {
        $patient = User::permission('be patient')->findOrFail($request->user_id);

        $tests = (new TestService())->getParser($request->file('test'))->getModels();

//        $patient->patientCards->first()->tests()->saveMany($tests);

        sendResponse([], 'ok');
    }
}