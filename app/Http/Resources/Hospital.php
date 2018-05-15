<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Location\Address as AddressResource;
use App\Http\Resources\Phones as PhonesResource;
use App\Http\Resources\Users as UsersResource;

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
            'address'     => new AddressResource($this->address),
            'phones'      => PhonesResource::collection($this->phones),
            'employees'   => UsersResource::collection($this->employees)
        ];
    }
}
