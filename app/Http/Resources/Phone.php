<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Phone extends JsonResource
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
            'phoneable_type' => $this->phoneable_type,
            'number'         => $this->number
        ];
    }
}
