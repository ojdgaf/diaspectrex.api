<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Examination as ExaminationResource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Test as TestResource;
use App\Http\Resources\Classifier as ClassifierResource;
use App\Http\Resources\DiagnosticGroup as DiagnosticGroupResource;
use App\Http\Resources\Services as ServicesResource;

class Seance extends JsonResource
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
            'id'               => $this->id,
            'examination'      => ExaminationResource::make($this->examination),
            'doctor'           => UserResource::make($this->doctor),
            'test'             => TestResource::make($this->test),
            'classifier'       => ClassifierResource::make($this->classifier),
            'diagnostic_group' => DiagnosticGroupResource::make($this->diagnosticGroup),
            'services'         => ServicesResource::make($this->services),
            'is_approved'      => $this->is_approved,
            'complains'        => $this->complains,
            'diagnosis'        => $this->diagnosis,
            'notes'            => $this->notes
        ];
    }
}
