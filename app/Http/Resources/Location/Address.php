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
            'country'     => CountryResource::make($this->country),
            'region'      => RegionResource::make($this->region),
            'city'        => CityResource::make($this->city),
            'street'      => StreetResource::make($this->street),
            'building'    => $this->building,
            'flat'        => $this->flat,
            'full'        => $this->country->name . ', ' . $this->region->name . ', '
                            . $this->city->name . ', ' . $this->street->name . ', ' . $this->building,
            'postal_code' => $this->postal_code
        ];
    }
}
