<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\CreateOrUpdate;
use App\Models\Service;
use App\Http\Resources\Service as ServiceResource;
use App\Http\Resources\Services as ServicesResource;

/**
 * Class ServiceController
 * @package App\Http\Controllers
 */
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ServicesResource
     */
    public function index()
    {
        return new ServicesResource(Service::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateOrUpdate $request
     * @return ServiceResource
     */
    public function store(CreateOrUpdate $request)
    {
        $service = Service::create($request->validated());

        return new ServiceResource($service);
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return ServiceResource
     */
    public function show(Service $service)
    {
        return new ServiceResource($service);
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

        return new ServiceResource($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     */
    public function destroy(Service $service)
    {
        $service->delete();

        sendResponse([]);
    }
}
