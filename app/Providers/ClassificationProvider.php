<?php

namespace App\Providers;

use App\Services\Classification\ClassifierFactory;
use App\Services\Classification\Classifiers\AWSMachineLearning;
use App\Services\Classification\Classifiers\DiscriminantAnalysis\DataLoader;
use App\Services\Classification\Classifiers\DiscriminantAnalysis\Trainer;
use App\Services\Classification\Contracts\ClassifierFactoryInterface;
use App\Services\Classification\Contracts\ClassifierInterface;
use Aws\MachineLearning\MachineLearningClient;
use Illuminate\Support\ServiceProvider;

class ClassificationProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ClassifierFactoryInterface::class,
            ClassifierFactory::class
        );

        $this->app->bind(MachineLearningClient::class, function ($app) {
            return new MachineLearningClient(config('classifier.aws machine learning.client'));
        });

        $this->app->bind(Trainer::class, function ($app) {
            return new Trainer($app->make(DataLoader::class));
        });

        $this->app->bind(DataLoader::class, function ($app) {
            return new DataLoader();
        });
    }
}
