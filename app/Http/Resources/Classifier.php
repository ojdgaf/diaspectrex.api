<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PatientType as PatientTypeResource;

/**
 * Resource class for classifier model.
 *
 * Class Classifier
 * @package App\Http\Resources
 */
class Classifier extends JsonResource
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
            'id'           => $this->id,
            'patient_type' => PatientTypeResource::make($this->patientType),
            'name'         => $this->name,
            'display_name' => $this->display_name,
            'description'  => $this->description,
        ];
    }
}
