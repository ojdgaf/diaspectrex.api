<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\CreateOrUpdate;
use App\Models\Service;
use App\Http\Resources\Service as ServiceResource;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ServiceResource::collection(Service::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return ServiceResource
     */
    public function store(CreateOrUpdate $request)
    {
        return ServiceResource::make(Service::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return ServiceResource
     */
    public function show(Service $service)
    {
        return ServiceResource::make($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateOrUpdate $request
     * @param Service $service
     * @return ServiceResource
     */
    public function update(CreateOrUpdate $request, Service $service)
    {
        $service->update($request->validated());

        return ServiceResource::make($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @throws
     */
    public function destroy(Service $service)
    {
        $service->delete();

        sendResponse([], 'Service has been deleted');
    }
}
