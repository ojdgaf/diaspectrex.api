<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiagnosticGroup\CreateOrUpdate;
use App\Models\DiagnosticGroup;
use App\Http\Resources\DiagnosticGroup as DiagnosticGroupResource;
use App\Http\Resources\DiagnosticGroups as DiagnosticGroupsResource;
use App\Http\Resources\Tests as TestsResource;

class DiagnosticGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return DiagnosticGroupsResource::collection(DiagnosticGroup::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return static
     */
    public function store(CreateOrUpdate $request)
    {
        $diagnosticGroup = DiagnosticGroup::create($request->validated());

        return DiagnosticGroupResource::make($diagnosticGroup);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiagnosticGroup  $diagnosticGroup
     * @return \Illuminate\Http\Response
     */
    public function show(DiagnosticGroup $diagnosticGroup)
    {
        return DiagnosticGroupResource::make($diagnosticGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param DiagnosticGroup $diagnosticGroup
     * @return static
     */
    public function update(CreateOrUpdate $request, DiagnosticGroup $diagnosticGroup)
    {
        $diagnosticGroup->update($request->validated());

        return DiagnosticGroupResource::make($diagnosticGroup);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiagnosticGroup  $diagnosticGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiagnosticGroup $diagnosticGroup)
    {
        $diagnosticGroup->delete();

        sendResponse([]);
    }

    /**
     * Display the tests of specified diagnostic group.
     *
     * @param \App\Models\DiagnosticGroup $diagnosticGroup
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getTests(DiagnosticGroup $diagnosticGroup){
        return TestsResource::collection(
            $diagnosticGroup->tests
        );
    }
}
