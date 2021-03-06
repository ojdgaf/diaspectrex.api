<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;

use App\Http\Requests\Location\Address\CreateOrUpdate;

use App\Models\Location\Address;

use App\Http\Resources\Location\Address as AddressResource;
use App\Http\Resources\Location\Addresses as AddressesResource;

/**
 * Class AddressController
 * @package App\Http\Controllers\Location
 */
class AddressController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AddressesResource::make(Address::paginate());
    }

    /**
     * @param CreateOrUpdate $request
     * @return AddressResource
     */
    public function store(CreateOrUpdate $request)
    {
        $address = Address::firstOrCreate($request->validated());

        return AddressResource::make($address);
    }

    /**
     * @param Address $address
     * @return AddressResource
     */
    public function show(Address $address)
    {
        return new AddressResource($address);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Address $address
     * @return AddressResource
     */
    public function update(CreateOrUpdate $request, Address $address)
    {
        $address->update($request->validated());

        return AddressResource::make($address);
    }

    /**
     * @param Address $address
     * @throws \Exception
     */
    public function destroy(Address $address)
    {
        $address->delete();

        sendResponse([]);
    }
}
