<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hospital\CreateOrUpdate;
use App\Http\Requests\Hospital\GetEmployees;

use App\Models\Hospital;
use App\Http\Resources\Hospital as HospitalResource;
use App\Http\Resources\Hospitals as HospitalsResource;
use App\Http\Resources\Users as UsersResource;

/**
 * Class HospitalController
 * @package App\Http\Controllers
 */
class HospitalController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return HospitalsResource::collection(Hospital::paginate());
    }

    /**
     * @param CreateOrUpdate $request
     * @return HospitalResource
     */
    public function store(CreateOrUpdate $request)
    {
        $hospital = Hospital::create($request->validated());

        return HospitalResource::make($hospital);
    }

    /**
     * @param Hospital $hospital
     * @return HospitalResource
     */
    public function show(Hospital $hospital)
    {
        return HospitalResource::make($hospital);
    }

    /**
     * @param CreateOrUpdate $request
     * @param Hospital $hospital
     * @return HospitalResource
     */
    public function update(CreateOrUpdate $request, Hospital $hospital)
    {
        $hospital->update($request->validated());

        return HospitalResource::make($hospital);
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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getEmployees(GetEmployees $request, Hospital $hospital)
    {
        $users = $hospital->employees();

        if ($request->has('role'))
            $users->role($request->role);

        return UsersResource::collection($users->get());
    }
}
