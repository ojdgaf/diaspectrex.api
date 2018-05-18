<?php

namespace App\Http\Controllers;

use App\Http\Requests\Seance\CreateOrUpdate;
use App\Models\Seance;
use App\Http\Resources\Seance as SeanceResource;
use App\Http\Resources\Seances as SeancesResource;

class SeanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return SeancesResource::collection(Seance::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return static
     */
    public function store(CreateOrUpdate $request)
    {
        $seance = Seance::create($request->validated());

        return SeanceResource::make($seance);
    }

    /**
     * Display the specified resource.
     *
     * @param Seance $seance
     * @return static
     */
    public function show(Seance $seance)
    {
        return SeanceResource::make($seance);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param Seance $seance
     * @return static
     */
    public function update(CreateOrUpdate $request, Seance $seance)
    {
        $seance->update($request->validated());

        return SeanceResource::make($seance);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seance  $seance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seance $seance)
    {
        $seance->delete();

        sendResponse([]);
    }
}
