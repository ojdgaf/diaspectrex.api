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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return CountriesResource::collection(Country::paginate());
    }

    /**
     * @param CreateOrUpdate $request
     * @return CountryResource
     */
    public function store(CreateOrUpdate $request)
    {
        $country = Country::create($request->validated());

        return CountryResource::make($country);
    }

    /**
     * @param Country $country
     * @return CountryResource
     */
    public function show(Country $country)
    {
        return CountryResource::make($country);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Country $country
     * @return CountryResource
     */
    public function update(CreateOrUpdate $request, Country $country)
    {
        $country->update($request->validated());

        return CountryResource::make($country);
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getRegions(Country $country)
    {
        return RegionsResource::collection(
            $country->regions()->paginate()
        );
    }

    /**
     * @param Country $country
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getCities(Country $country)
    {
        return CitiesResource::collection(
            $country->cities()->with('region')->paginate()
        );
    }
}
