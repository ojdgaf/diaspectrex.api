<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PatientCard as PatientCardResource;
use App\Http\Resources\Seances as SeancesResource;

/**
 * Resource class for examination model.
 *
 * Class Examination
 * @package App\Http\Resources
 */
class Examination extends JsonResource
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
            'name'         => $this->name,
            'conclusion'   => $this->conclusion,
            'patient_card' => PatientCardResource::make($this->patientCard),
            'seances'      => SeancesResource::collection($this->seances),
            'started_at'   => $this->started_at,
            'ended_at'     => $this->ended_at,
        ];
    }
}
