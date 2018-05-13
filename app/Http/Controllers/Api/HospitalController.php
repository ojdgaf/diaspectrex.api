<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\Api\Hospitals\Store;
use App\Http\Requests\Api\Hospitals\GetEmployees;

use App\Models\Hospital;
use App\Http\Resources\Hospital as HospitalResource;
use App\Http\Resources\Hospitals as HospitalsResource;
use App\Http\Resources\Users as UsersResource;

/**
 * Class HospitalController
 * @package App\Http\Controllers\Api
 */
class HospitalController extends Controller
{
    /**
     * Quantity of hospital items per response.
     */
    const HOSPITAL_PAGINATION = 100;

    /**
     * @return HospitalsResource
     */
    public function index()
    {
        return new HospitalsResource(
            Hospital::paginate(static::LOCATION_PAGINATION)
        );
    }

    /**
     * @param Store $request
     * @return HospitalResource
     */
    public function store(Store $request)
    {
        $hospital = Hospital::create($request->all());

        return new HospitalResource($hospital);
    }

    /**
     * @param Hospital $hospital
     * @return HospitalResource
     */
    public function show(Hospital $hospital)
    {
        return new HospitalResource($hospital);
    }

    /**
     * @param Request $request
     * @param Hospital $hospital
     * @return HospitalResource
     */
    public function update(Request $request, Hospital $hospital)
    {
        $hospital->update($request->all());

        return new HospitalResource($hospital);
    }

    /**
     * @param Hospital $hospital
     * @throws \Exception
     */
    public function destroy(Hospital $hospital)
    {
        $hospital->delete();

        sendResponse([]);
    }

    /**
     * @param GetEmployees $request
     * @param Hospital $hospital
     * @return UsersResource
     */
    public function getEmployees(GetEmployees $request, Hospital $hospital)
    {
        $users = $hospital->employees();

        if ($request->has('role'))
            $users->role($request->role);

        return new UsersResource($users->get());
    }
}
