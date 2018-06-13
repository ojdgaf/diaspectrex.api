<?php

namespace App\Http\Requests\Test;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Test;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * Allow to edit only manually created tests.
     *
     * @return bool
     */
    public function authorize()
    {
        return is_null($this->route('test')->file_path);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return collect(Test::D_VALUES)->mapWithKeys(function (string $key) {
            return [$key => 'required|numeric'];
        })->toArray();
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     */
    protected function failedAuthorization()
    {
        sendError('Only manually created tests can be modified', [], 422);
    }
}
