<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PatientCard as PatientCardResource;
use App\Http\Resources\Examinations as ExaminationsResource;

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
            'patient'      => PatientCardResource::make($this->patient),
            'patient_type' => $this->patient_type,
            'code'         => $this->code,
            'allergies'    => $this->allergies,
            'diseases'     => $this->diseases,
            'examinations' => ExaminationsResource::collection($this->examinations),
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,
        ];
    }
}
