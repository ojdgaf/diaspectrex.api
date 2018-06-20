<?php

namespace App\Http\Requests\Classifier;

use App\Models\Classifier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class Train
 * @package App\Http\Requests\Classifier
 * @property int $classifier_id
 */
class Train extends FormRequest
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
        $automatedClassifiersIds = Classifier::automated()->pluck('id');

        return [
            'classifier_id' => ['required', 'integer', Rule::in($automatedClassifiersIds)],
        ];
    }
}
