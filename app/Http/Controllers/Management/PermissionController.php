<?php

namespace App\Http\Controllers\Management;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\Management\Permission as PermissionResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return PermissionResource::collection(Permission::all());
    }
}
