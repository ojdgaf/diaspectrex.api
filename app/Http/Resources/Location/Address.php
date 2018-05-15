<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Location\Country as CountryResource;
use App\Http\Resources\Location\Region as RegionResource;
use App\Http\Resources\Location\City as CityResource;
use App\Http\Resources\Location\Street as StreetResource;

class Address extends JsonResource
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
            'country'     => new CountryResource($this->country),
            'region'      => new RegionResource($this->region),
            'city'        => new CityResource($this->city),
            'street'      => new StreetResource($this->street),
            'building'    => $this->building,
            'flat'        => $this->flat,
            'postal_code' => $this->postal_code
        ];
    }
}
