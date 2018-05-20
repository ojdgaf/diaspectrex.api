<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCard\CreateOrUpdate;
use App\Models\PatientCard;
use App\Http\Resources\PatientCard as PatientCardResource;
use App\Http\Resources\PatientCards as PatientCardsResource;

class PatientCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PatientCardsResource::make(PatientCard::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return PatientCardResource
     */
    public function store(CreateOrUpdate $request)
    {
        $patientCard = PatientCard::create($request->validated());

        return PatientCardResource::make($patientCard);
    }

    /**
     * Display the specified resource.
     *
     * @param PatientCard $patientCard
     * @return PatientCardResource
     */
    public function show(PatientCard $patientCard)
    {
        return PatientCardResource::make($patientCard);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param PatientCard $patientCard
     * @return PatientCardResource
     */
    public function update(CreateOrUpdate $request, PatientCard $patientCard)
    {
        $patientCard->update($request->validated());

        return PatientCardResource::make($patientCard);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientCard  $patientCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientCard $patientCard)
    {
        $patientCard->delete();

        sendResponse([]);
    }
}
