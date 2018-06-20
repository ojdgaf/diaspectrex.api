<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Classification\Contracts\FactoryInterface;
use App\Services\Classification\Factory;
use App\Services\Classification\Contracts\ServiceInterface;
use App\Services\Classification\Service;
use App\Services\Classification\Common\DatabaseDataLoader;
use Aws\MachineLearning\MachineLearningClient;
use App\Services\Classification\Classifiers\DiscriminantAnalysis\Trainer;
use Phpml\Classification\KNearestNeighbors;
use App\Services\Classification\Classifiers\KNearestNeighbors\StorageManager;
use Phpml\ModelManager;

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
        $this->app->bind(ServiceInterface::class, Service::class);

        $this->app->bind(FactoryInterface::class, Factory::class);

        $this->app->bind(DatabaseDataLoader::class, function ($app) {
            return new DatabaseDataLoader();
        });

        # AWS Machine Learning
        $this->app->bind(MachineLearningClient::class, function ($app) {
            return new MachineLearningClient(config('classifier.aws machine learning.client'));
        });

        # Discriminant Alalysis
        $this->app->bind(Trainer::class, function ($app) {
            return new Trainer($app->make(DatabaseDataLoader::class));
        });

        # K-nearest neighbors
        $this->app->bind(KNearestNeighbors::class, function ($app) {
            return new KNearestNeighbors(10);
        });

        $this->app->bind(ModelManager::class, function ($app) {
            return new ModelManager();
        });

        $this->app->bind(StorageManager::class, function ($app) {
            return new StorageManager($app->make(ModelManager::class));
        });
    }
}
