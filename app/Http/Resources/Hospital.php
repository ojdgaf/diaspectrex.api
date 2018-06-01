<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Location\Address as AddressResource;
use App\Http\Resources\Phone as PhoneResource;
use App\Http\Resources\Users as UsersResource;

/**
 * Resource class for hospital model.
 *
 * Class Hospital
 * @package App\Http\Resources
 */
class Hospital extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'address'     => AddressResource::make($this->address),
            'phones'      => PhoneResource::collection($this->phones),
            'success'     => true
            //'employees'   => UsersResource::make($this->employees)
        ];
    }
}
