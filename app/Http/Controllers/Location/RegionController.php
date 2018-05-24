<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Location\Region\CreateOrUpdate;

use App\Models\Location\Region;

use App\Http\Resources\Location\Region as RegionResource;
use App\Http\Resources\Location\Regions as RegionsResource;
use App\Http\Resources\Location\Cities as CitiesResource;

/**
 * Class RegionController
 * @package App\Http\Controllers\Location
 */
class RegionController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return RegionsResource::make(Region::paginate());
    }

    /**
     * @param CreateOrUpdate $request
     * @return RegionResource
     */
    public function store(CreateOrUpdate $request)
    {
        $region = Region::create($request->validated());

        return RegionResource::make($region);
    }

    /**
     * @param Region $region
     * @return RegionResource
     */
    public function show(Region $region)
    {
        return RegionResource::make($region);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Region $region
     * @return RegionResource
     */
    public function update(CreateOrUpdate $request, Region $region)
    {
        $region->update($request->validated());

        return RegionResource::make($region);
    }

    /**
     * @param Region $region
     * @throws \Exception
     */
    public function destroy(Region $region)
    {
        $region->delete();

        sendResponse([]);
    }

    /**
     * @param Region $region
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCities(Region $region)
    {
        return CitiesResource::make(
            $region->cities
        );
    }
}
