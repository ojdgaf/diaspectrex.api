<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class Test extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = parent::toArray($request);

        $array = array_merge($array, [
            'diagnostic_group' => DiagnosticGroup::make($this->diagnosticGroup)
        ]);

        $array = array_merge($array, [
            'download_file_url' => Storage::url($this->file_path)
        ]);

        return $array;
    }
}
