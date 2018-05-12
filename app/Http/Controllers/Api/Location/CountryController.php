<?php

namespace App\Http\Controllers\Api\Location;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Location\Country\CreateOrUpdate;

use App\Models\Location\Country;

/**
 * Class CountryController
 * @package App\Http\Controllers\Api\Location
 */
class CountryController extends Controller
{
    public function index()
    {
        sendResponse(Country::all());
    }

    /**
     * @param CreateOrUpdate $request
     */
    public function store(CreateOrUpdate $request)
    {
        $country = Country::create($request->all());

        sendResponse($country);
    }

    /**
     * @param Country $country
     */
    public function show(Country $country)
    {
        sendResponse($country);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Country $country
     */
    public function update(CreateOrUpdate $request, Country $country)
    {
        $country->update($request->all());

        sendResponse($country);
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
}
