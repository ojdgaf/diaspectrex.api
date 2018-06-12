<?php

namespace App\Http\Controllers;

use App\Models\PatientType;
use Illuminate\Http\Request;
use App\Http\Resources\PatientType as PatientTypeResource;

class PatientTypeController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return PatientTypeResource::collection(PatientType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatientType  $patientType
     * @return \Illuminate\Http\Response
     */
    public function show(PatientType $patientType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatientType  $patientType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatientType $patientType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatientType  $patientType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatientType $patientType)
    {
        //
    }
}
