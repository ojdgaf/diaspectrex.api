<?php

namespace App\Http\Controllers\Diagnosing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Prediction\Create;
use App\Services\Classification\Service;
use App\Models\Classifier;
use App\Models\PatientCard;
use App\Models\Prediction;
use App\Models\Seance;
use App\Models\Test;
use App\Http\Resources\Prediction as PredictionResource;

class PredictionController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Create $request
     * @return PredictionResource
     */
    public function store(Create $request)
    {
        $seance = Seance::findOrFail($request->seance_id);
        $classifierModel = Classifier::findOrFail($request->classifier_id);

        if ($classifierModel->name === 'doctor') {
            $prediction = new Prediction([
                'seance_id'           => $seance->id,
                'classifier_id'       => $classifierModel->id,
                'diagnostic_group_id' => $request->diagnostic_group_id,
                'is_approved'         => true,
            ]);
        } else {
            $test = Test::findOrFail($request->test_id);

            $classifier = $this->service->getClassifier($classifierModel);

            $prediction = $classifier->setTest($test)->classify();
        }

        if ($prediction->successful())
            $seance->predictions()->save($prediction);

        return PredictionResource::make($prediction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
