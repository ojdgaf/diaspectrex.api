<?php

namespace App\Http\Controllers\Diagnosing;

use App\Http\Requests\Test\Update;
use App\Models\Seance;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use App\Services\FileUploading\Test\Service as TestService;
use App\Http\Resources\Test as TestResource;
use App\Http\Requests\Test\Create;

/**
 * Class TestController
 * @package App\Http\Controllers\Diagnosing
 */
class TestController
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TestResource::collection(Test::all());
    }

    /**
     * @param Create $request
     * @return TestResource
     */
    public function store(Create $request)
    {
        $seance = Seance::findOrFail($request->seance_id);

        $test = $request->hasFile('test') ?
            (new TestService())->getParser($request->file('test'))->getFirstModel() :
            new Test($request->validated());

        $test->save();
        $test->seance()->save($seance);

        return TestResource::make($test)->additional([
            'message' => 'Test file has been uploaded and attached to the seance',
        ]);
    }

    /**
     * @param Test $test
     * @return TestResource
     */
    public function show(Test $test)
    {
        return TestResource::make($test);
    }

    /**
     * @param Update $request
     * @param Test $test
     * @return TestResource
     */
    public function update(Update $request, Test $test)
    {
        $test->update($request->validated());

        return TestResource::make($test);
    }

    /**
     * @param Test $test
     * @throws \Exception
     */
    public function destroy(Test $test)
    {
        $test->delete();

        sendResponse([], 'Test has been deleted');
    }
}