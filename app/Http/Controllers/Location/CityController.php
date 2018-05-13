<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Location\City\CreateOrUpdate;

use App\Models\Location\City;

use App\Http\Resources\Location\City as CityResource;
use App\Http\Resources\Location\Cities as CitiesResource;
use App\Http\Resources\Location\Streets as StreetsResource;

/**
 * Class CityController
 * @package App\Http\Controllers\Location
 */
class CityController extends Controller
{
    /**
     * @return CitiesResource
     */
    public function index()
    {
        return new CitiesResource(
            City::paginate(static::LOCATION_PAGINATION)
        );
    }

    /**
     * @param CreateOrUpdate $request
     * @return CityResource
     */
    public function store(CreateOrUpdate $request)
    {
        $city = City::create($request->all());

        return new CityResource($city);
    }

    /**
     * @param City $city
     * @return CityResource
     */
    public function show(City $city)
    {
        return new CityResource($city);
    }

    /**
     * @param CreateOrUpdate $request
     * @param City $city
     * @return CityResource
     */
    public function update(CreateOrUpdate $request, City $city)
    {
        $city->update($request->all());

        return new CityResource($city);
    }

    /**
     * @param City $city
     * @throws \Exception
     */
    public function destroy(City $city)
    {
        $city->delete();

        sendResponse([]);
    }

    /**
     * @param City $city
     * @return StreetsResource
     */
    public function getStreets(City $city)
    {
        return new StreetsResource(
            $city->streets()->paginate(static::LOCATION_PAGINATION)
        );
    }
}
