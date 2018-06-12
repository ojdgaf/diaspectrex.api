<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientCard\CreateOrUpdate;
use App\Models\PatientCard;
use App\Http\Resources\PatientCard as PatientCardResource;
use App\Http\Resources\PatientCards as PatientCardsResource;

class PatientCardController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PatientCardResource::collection(PatientCard::all());
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

        if (!empty($patientCard->id))
            sendResponse([
                'success' => true,
                'patient_card' => PatientCardResource::make($patientCard)
            ], 'Patient\'s card was successfully created!');
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
        $success = $patientCard->update($request->validated());

        if ($success)
            sendResponse([
                'success' => true,
                'patient_card' => PatientCardResource::make($patientCard)
            ], 'Patient\'s card was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientCard  $patientCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientCard $patientCard)
    {
        $success = $patientCard->delete();

        sendResponse([
            'success'       => $success,
            'patient_cards' => PatientCard::all()
        ]);
    }
}
