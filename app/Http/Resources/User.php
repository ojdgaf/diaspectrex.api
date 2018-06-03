<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Location\Address;
use App\Http\Resources\Management\Role;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'email'       => $this->email,
            'name'        => $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name,
            'last_name'   => $this->last_name,
            'middle_name' => $this->middle_name,
            'first_name'  => $this->first_name,
            'sex'         => $this->sex,
            'birthday'    => $this->birthday->timestamp,
            'address_id'  => $this->address_id,
            'address'     => Address::make($this->address),

            $this->mergeWhen($this->hasAnyPermission(['be support', 'be employee', 'be doctor', 'be head']), [
                'passport'    => $this->passport,
                'hospital_id' => $this->hospital_id,
                'hospital'    => Hospital::make($this->hospital),
                'is_present'  => $this->is_present,
                'about'       => $this->about,
                'hired_at'    => $this->hired_at ? $this->hired_at->timestamp : null,
                'fired_at'    => $this->fired_at ? $this->fired_at->timestamp : null,
            ]),

            $this->mergeWhen($this->hasAnyPermission(['be doctor', 'be head']), [
                'degree' => $this->degree,
            ]),

            'roles'            => Role::collection($this->roles),
            'permission_names' => $this->when(isset($this->permission_names), $this->permission_names),
        ];
    }
}
