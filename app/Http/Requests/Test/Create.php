<?php

namespace App\Http\Requests\Test;

use App\Models\Test;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

/**
 * Class Create
 * @package App\Http\Requests\Test
 * @property int seance_id
 * @property UploadedFile $test
 */
class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = ['test' => 'nullable|file|mimes:xls,xlsx'];

        $dValuesRules = collect(Test::D_VALUES)->mapWithKeys(function (string $key) {
            return [$key => 'required_without:test|numeric'];
        })->toArray();

        return array_merge($rules, $dValuesRules);
    }
}
