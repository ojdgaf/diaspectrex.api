<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Prediction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                  => $this->id,
            'seance_id'           => $this->seance_id,
            'seance'              => $this->seance,
            'classifier_id'       => $this->classifier_id,
            'classifier'          => $this->classifier,
            'diagnostic_group_id' => $this->diagnostic_group_id,
            'diagnostic_group'    => $this->diagnosticGroup,
            'test_id'             => $this->test_id,
            'is_approved'         => $this->is_approved,
            'raw_value'           => $this->raw_value,
            'info'                => $this->info,
        ];
    }
}
