<?php

namespace App\Http\Controllers\Location;

use Illuminate\Http\Request;
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
     * @return AddressesResource
     */
    public function index()
    {
        return new AddressesResource(Address::paginate());
    }

    /**
     * @param CreateOrUpdate $request
     * @return AddressResource
     */
    public function store(CreateOrUpdate $request)
    {
        $address = Address::create($request->validated());

        return new AddressResource($address);
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

        return new AddressResource($address);
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
