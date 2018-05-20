<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\DiagnosticGroup as DiagnosticGroupResource;

class DiagnosticGroups extends ResourceCollection
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
            'data' => DiagnosticGroupResource::collection($this->collection)
        ];
    }
}
