<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hospital\CreateOrUpdate;
use App\Http\Requests\Hospital\GetEmployees;

use App\Models\Hospital;
use App\Http\Resources\Hospital as HospitalResource;
use App\Http\Resources\Hospitals as HospitalsResource;
use App\Http\Resources\Users as UsersResource;
use App\Services\HospitalService;
use Illuminate\Support\Facades\DB;

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
        return HospitalsResource::make(Hospital::all());
    }

    /**
     * @param CreateOrUpdate $request
     * @return HospitalResource
     */
    public function store(CreateOrUpdate $request)
    {
        HospitalService::store($request->validated());
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
        HospitalService::update($request->validated(), $hospital);

        /*$hospital->update($request->validated());

        return HospitalResource::make($hospital);*/
    }

    /**
     * @param Hospital $hospital
     * @throws \Exception
     */
    public function destroy(Hospital $hospital)
    {
        HospitalService::destroy($hospital);
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
