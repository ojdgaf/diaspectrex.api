<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Requests\Phone\CreateOrUpdate;
use App\Http\Resources\Phone as PhoneResource;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     */
    public function store(CreateOrUpdate $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param Phone $phone
     */
    public function update(CreateOrUpdate $request, Phone $phone)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
