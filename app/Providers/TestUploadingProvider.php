<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FileUploading\Test\Contracts\ServiceInterface;
use App\Services\FileUploading\Test\Service;
use App\Services\FileUploading\Test\Factory;
use App\Services\FileUploading\Test\Storage;
use App\Services\FileUploading\Test\Validators\Excel as ExcelValidator;

class TestUploadingProvider extends ServiceProvider
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

        $this->app->bind(Factory::class, function ($app) {
            return new Factory();
        });

        $this->app->bind(Storage::class, function ($app) {
            return new Storage();
        });

        $this->app->bind(ExcelValidator::class, function ($app) {
            return new ExcelValidator();
        });
    }
}
