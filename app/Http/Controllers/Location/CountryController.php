<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Location\Country\CreateOrUpdate;

use App\Models\Location\Country;

use App\Http\Resources\Location\Country as CountryResource;
use App\Http\Resources\Location\Countries as CountriesResource;
use App\Http\Resources\Location\Regions as RegionsResource;
use App\Http\Resources\Location\Cities as CitiesResource;

/**
 * Class CountryController
 * @package App\Http\Controllers\Location
 */
class CountryController extends Controller
{
    /**
     * @return CountriesResource
     */
    public function index()
    {
        return new CountriesResource(
            Country::paginate(static::LOCATION_PAGINATION)
        );
    }

    /**
     * @param CreateOrUpdate $request
     * @return CountryResource
     */
    public function store(CreateOrUpdate $request)
    {
        $country = Country::create($request->all());

        return new CountryResource($country);
    }

    /**
     * @param Country $country
     * @return CountryResource
     */
    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Country $country
     * @return CountryResource
     */
    public function update(CreateOrUpdate $request, Country $country)
    {
        $country->update($request->all());

        return new CountryResource($country);
    }

    /**
     * @param Country $country
     * @throws \Exception
     */
    public function destroy(Country $country)
    {
        $country->delete();

        sendResponse([]);
    }

    /**
     * @param Country $country
     * @return RegionsResource
     */
    public function getRegions(Country $country)
    {
        return new RegionsResource(
            $country->regions()->paginate(static::LOCATION_PAGINATION)
        );
    }

    /**
     * @param Country $country
     * @return CitiesResource
     */
    public function getCities(Country $country)
    {
        return new CitiesResource(
            $country->cities()->with('region')->paginate(static::LOCATION_PAGINATION)
        );
    }
}
