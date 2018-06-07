<?php

namespace App\Http\Requests\Test;

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
        return [
            'seance_id' => 'required|integer|exists:seances,id',

            'test' => 'nullable|file|mimes:xls,xlsx',

            'd2'     => 'required_without:test|numeric',
            'd3'     => 'required_without:test|numeric',
            'd4'     => 'required_without:test|numeric',
            'd5'     => 'required_without:test|numeric',
            'd6'     => 'required_without:test|numeric',
            'd8'     => 'required_without:test|numeric',
            'd11'    => 'required_without:test|numeric',
            'd15'    => 'required_without:test|numeric',
            'd20'    => 'required_without:test|numeric',
            'd26'    => 'required_without:test|numeric',
            'd36'    => 'required_without:test|numeric',
            'd40'    => 'required_without:test|numeric',
            'd65'    => 'required_without:test|numeric',
            'd85'    => 'required_without:test|numeric',
            'd120'   => 'required_without:test|numeric',
            'd150'   => 'required_without:test|numeric',
            'd210'   => 'required_without:test|numeric',
            'd290'   => 'required_without:test|numeric',
            'd300'   => 'required_without:test|numeric',
            'd520'   => 'required_without:test|numeric',
            'd700'   => 'required_without:test|numeric',
            'd950'   => 'required_without:test|numeric',
            'd1300'  => 'required_without:test|numeric',
            'd1700'  => 'required_without:test|numeric',
            'd2300'  => 'required_without:test|numeric',
            'd3100'  => 'required_without:test|numeric',
            'd4200'  => 'required_without:test|numeric',
            'd5600'  => 'required_without:test|numeric',
            'd7600'  => 'required_without:test|numeric',
            'd10200' => 'required_without:test|numeric',
            'd13800' => 'required_without:test|numeric',
            'd18500' => 'required_without:test|numeric',
        ];
    }
}
