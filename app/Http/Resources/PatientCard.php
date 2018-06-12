<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Examinations as ExaminationsResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\PatientType as PatientTypeResource;

/**
 * Resource class for patient card model.
 *
 * Class PatientCard
 * @package App\Http\Resources
 */
class PatientCard extends JsonResource
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
            'patient'      => UserResource::make($this->patient),
            'patient_type' => PatientTypeResource::make($this->patientType),
            'code'         => $this->code,
            'allergies'    => $this->allergies,
            'diseases'     => $this->diseases,
            'examinations' => ExaminationsResource::make($this->examinations),
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
