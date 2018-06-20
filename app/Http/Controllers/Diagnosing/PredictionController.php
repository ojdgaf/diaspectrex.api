<?php

namespace App\Http\Controllers\Diagnosing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prediction\Create;
use App\Services\Classification\Contracts\ServiceInterface;
use App\Http\Resources\Prediction as PredictionResource;
use App\Models\Classifier;
use App\Models\Prediction;
use App\Models\Seance;
use App\Models\Test;

/**
 * Class PredictionController
 * @package App\Http\Controllers\Diagnosing
 */
class PredictionController extends Controller
{
    /**
     * @var ServiceInterface
     */
    protected $service;

    /**
     * PredictionController constructor.
     *
     * @param ServiceInterface $service
     */
    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * @param  Create $request
     *
     * @return PredictionResource
     */
    public function store(Create $request)
    {
        $seance = Seance::findOrFail($request->seance_id);
        $classifierModel = Classifier::findOrFail($request->classifier_id);

        if ($classifierModel->isManual()) {
            $prediction = new Prediction([
                'seance_id'           => $seance->id,
                'classifier_id'       => $classifierModel->id,
                'diagnostic_group_id' => $request->diagnostic_group_id,
                'is_approved'         => true,
            ]);
        } else {
            $test = Test::findOrFail($request->test_id);

            $classifier = $this->service->getClassifier($classifierModel);

            $prediction = $classifier->classify($test);
        }

        if ($prediction->successful())
            $seance->predictions()->save($prediction);
        else
            $prediction->seance()->associate($seance);

        return PredictionResource::make($prediction);
    }

    /**
     * @param  Prediction $prediction
     *
     * @return PredictionResource
     */
    public function show(Prediction $prediction)
    {
        return PredictionResource::make($prediction);
    }
}
