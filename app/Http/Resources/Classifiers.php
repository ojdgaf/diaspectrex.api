<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Classifier as ClassifierResource;

/**
 * Resource class for classifier models collection.
 *
 * Class Classifiers
 * @package App\Http\Resources
 */
class Classifiers extends ResourceCollection
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
            'data' => ClassifierResource::collection($this->collection)
        ];
    }
}
