<?php

namespace App\Http\Controllers;

use App\Http\Requests\Classifier\CreateOrUpdate;
use App\Models\Classifier;
use App\Http\Resources\Classifier as ClassifierResource;
use App\Http\Resources\Classifiers as ClassifiersResource;

class ClassifierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ClassifiersResource::make(Classifier::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return ClassifierResource
     */
    public function store(CreateOrUpdate $request)
    {
        $classifier = Classifier::create($request->validated());

        return ClassifierResource::make($classifier);
    }

    /**
     * Display the specified resource.
     *
     * @param Classifier $classifier
     * @return ClassifierResource
     */
    public function show(Classifier $classifier)
    {
        return ClassifierResource::make($classifier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param Classifier $classifier
     * @return ClassifierResource
     */
    public function update(CreateOrUpdate $request, Classifier $classifier)
    {
        $classifier->update($request->validated());

        return ClassifierResource::make($classifier);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Classifier $classifier
     */
    public function destroy(Classifier $classifier)
    {
        $classifier->delete();

        sendResponse([]);
    }
}
