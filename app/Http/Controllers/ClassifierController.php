<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classifier\Train;
use App\Services\Classification\Service;
use App\Http\Requests\Classifier\Update;
use App\Models\Classifier;
use App\Http\Resources\Classifier as ClassifierResource;

/**
 * Class ClassifierController
 * @package App\Http\Controllers
 */
class ClassifierController extends Controller
{
    /**
     * @var Service
     */
    protected $service;

    /**
     * PredictionController constructor.
     *
     * @param Service $service
     */
    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ClassifierResource::collection(Classifier::all());
    }

    /**
     * Display the specified resource.
     *
     * @param Classifier $classifier
     *
     * @return ClassifierResource
     */
    public function show(Classifier $classifier)
    {
        return ClassifierResource::make($classifier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Update $request
     * @param Classifier $classifier
     *
     * @return ClassifierResource
     */
    public function update(Update $request, Classifier $classifier)
    {
        $classifier->update($request->validated());

        return ClassifierResource::make($classifier);
    }

    /**
     * @param Train $request
     */
    public function train(Train $request)
    {
        $classifierModel = Classifier::findOrFail($request->classifier_id);

        $classifier = $this->service->getClassifier($classifierModel);

        $classifier->train();

        sendResponse([], 'Successfully trained');
    }
}
