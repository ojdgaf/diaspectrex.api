<?php

namespace App\Http\Requests\Prediction;

use App\Models\DiagnosticGroup;
use Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use App\Models\Classifier;
use App\Models\Seance;

/**
 * Class Create
 * @package App\Http\Requests\Prediction
 * @property int $seance_id
 * @property int $classifier_id
 * @property int $test_id
 * @property null|int $diagnostic_group_id
 */
class Create extends FormRequest
{
    /**
     * @var Collection
     */
    protected $rules;

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
     * @throws \Illuminate\Validation\ValidationException
     */
    public function rules()
    {
        $this->preValidate();

        $classifier = Classifier::findOrFail($this->classifier_id);

        $this->validateClassifier($classifier);

        if ($classifier->name === 'doctor')
            $this->validateDiagnosticGroup($classifier);
        else
            $this->attachTestRule();

        return $this->rules->toArray();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function preValidate()
    {
        $this->rules = collect([
            'seance_id'     => 'required|integer|exists:seances,id',
            'classifier_id' => 'required|integer|exists:classifiers,id',
        ]);

        Validator::make($this->all(), $this->rules->toArray())->validate();
    }

    /**
     * @param Classifier $classifier
     */
    protected function validateClassifier(Classifier $classifier)
    {
        $card = Seance::findOrFail($this->seance_id)->examination->patientCard;

        if ($classifier->patient_type_id !== $card->patient_type_id)
            sendError('Patient type of classifier must be equal to patient type of patient card', [], 422);
    }

    /**
     * @param Classifier $classifier
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateDiagnosticGroup(Classifier $classifier)
    {
        $this->rules->put('diagnostic_group_id', 'required|integer|exists:diagnostic_groups,id');

        Validator::make($this->all(), $this->rules->toArray())->validate();

        $diagnosticGroup = DiagnosticGroup::findOrFail($this->diagnostic_group_id);

        if ($classifier->patient_type_id !== $diagnosticGroup->patient_type_id)
            sendError('Patient type of diagnostic group must be equal to patient type of classifier', [], 422);
    }

    protected function attachTestRule()
    {
        $this->rules->put('test_id', 'required|integer|exists:tests,id');
    }
}
