<?php

namespace App\Http\Controllers;

use App\Http\Requests\Examination\CreateOrUpdate;
use App\Models\Examination;
use App\Http\Resources\Examination as ExaminationResource;
use App\Http\Resources\Examinations as ExaminationsResource;

/**
 * Class ExaminationController
 * @package App\Http\Controllers
 */
class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ExaminationsResource::collection(Examination::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return static
     */
    public function store(CreateOrUpdate $request)
    {
        $examination = Examination::create($request->validated());

        return ExaminationResource::make($examination);
    }

    /**
     * Display the specified resource.
     *
     * @param Examination $examination
     * @return static
     */
    public function show(Examination $examination)
    {
        return ExaminationResource::make($examination);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param Examination $examination
     * @return static
     */
    public function update(CreateOrUpdate $request, Examination $examination)
    {
        $examination->update($request->validated());

        return ExaminationResource::make($examination);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examination  $examination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examination $examination)
    {
        $examination->delete();

        sendResponse([]);
    }
}
