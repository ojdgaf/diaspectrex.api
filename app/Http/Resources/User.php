<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Location\Address as AddressResource;

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
            'birthday'    => $this->birthday->toFormattedDateString(),
            'address_id'  => $this->address_id,
            'address'     => AddressResource::make($this->whenLoaded('address')),

            $this->mergeWhen($this->hasAnyPermission(['have employee attributes', 'have doctor attributes']), [
                'passport'    => $this->passport,
                'hospital_id' => $this->hospital_id,
                'is_present'  => $this->is_present,
                'about'       => $this->about,
                'hired_at'    => $this->hired_at ? $this->hired_at->toDayDateTimeString() : null,
                'fired_at'    => $this->fired_at ? $this->fired_at->toDayDateTimeString() : null,
            ]),

            $this->mergeWhen($this->hasPermissionTo('have doctor attributes'), [
                'degree' => $this->degree,
            ]),
        ];
    }
}
