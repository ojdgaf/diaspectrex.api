<?php

namespace App\Http\Controllers\Api\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Location\Region\CreateOrUpdate;

use App\Models\Location\Region;

use App\Http\Resources\Location\Region as RegionResource;
use App\Http\Resources\Location\Regions as RegionsResource;
use App\Http\Resources\Location\Cities as CitiesResource;

/**
 * Class RegionController
 * @package App\Http\Controllers\Api\Location
 */
class RegionController extends Controller
{
    /**
     * @return RegionsResource
     */
    public function index()
    {
        return new RegionsResource(
            Region::paginate(static::LOCATION_PAGINATION)
        );
    }

    /**
     * @param CreateOrUpdate $request
     * @return RegionResource
     */
    public function store(CreateOrUpdate $request)
    {
        $region = Region::create($request->all());

        return new RegionResource($region);
    }

    /**
     * @param Region $region
     * @return RegionResource
     */
    public function show(Region $region)
    {
        return new RegionResource($region);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Region $region
     * @return RegionResource
     */
    public function update(CreateOrUpdate $request, Region $region)
    {
        $region->update($request->all());

        return new RegionResource($region);
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
     * @return CitiesResource
     */
    public function getCities(Region $region)
    {
        return new CitiesResource(
            $region->cities()->paginate(static::LOCATION_PAGINATION)
        );
    }
}
