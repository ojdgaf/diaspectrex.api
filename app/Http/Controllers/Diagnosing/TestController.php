<?php

namespace App\Http\Controllers\Diagnosing;

use App\Services\FileUploading\Test\Contracts\ServiceInterface;
use App\Http\Requests\Test\Create;
use App\Http\Requests\Test\Update;
use App\Models\Test;
use App\Http\Resources\Test as TestResource;

/**
 * Class TestController
 * @package App\Http\Controllers\Diagnosing
 */
class TestController
{
    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * PredictionController constructor.
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return TestResource::collection(Test::all());
    }

    /**
     * @param Create $request
     *
     * @return TestResource
     */
    public function store(Create $request)
    {
        $test = $request->hasFile('test') ?
            $this->service
                ->getParser($request->file('test'))
                ->setExtraTestAttributes(collect([
                    'file_path' => $this->service->store($request->file('test')),
                ]))
                ->getTests()
                ->first()
            :
            new Test($request->validated());

        $test->save();

        return TestResource::make($test)->additional([
            'message' => 'Test file has been uploaded',
        ]);
    }

    /**
     * @param Test $test
     *
     * @return TestResource
     */
    public function show(Test $test)
    {
        return TestResource::make($test);
    }

    /**
     * @param Update $request
     * @param Test $test
     *
     * @return TestResource
     */
    public function update(Update $request, Test $test)
    {
        $test->update($request->validated());

        return TestResource::make($test);
    }

    /**
     * @param Test $test
     *
     * @throws \Exception
     */
    public function destroy(Test $test)
    {
        $test->delete();

        sendResponse([], 'Test has been deleted');
    }
}