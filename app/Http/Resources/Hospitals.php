<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Hospital as HospitalResource;

/**
 * Resource class for hospital models collection.
 *
 * Class Hospitals
 * @package App\Http\Resources
 */
class Hospitals extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => HospitalResource::collection($this->collection)
        ];
    }
}
