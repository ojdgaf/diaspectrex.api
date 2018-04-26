<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Users\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();

        return $doctors;
    }

    public function store(Request $request)
    {
        $doctor = new Doctor($request->all());

        $doctor->password = Hash::make($request->password);

        $doctor->save();

        return $doctor;
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->fill($request->all())->save();

        return $doctor;
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return;
    }
}