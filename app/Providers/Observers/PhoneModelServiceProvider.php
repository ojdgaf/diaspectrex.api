<?php

namespace App\Providers\Observers;

use Illuminate\Support\ServiceProvider;
use App\Models\Phone;
use App\Observers\PhoneObserver;

class PhoneModelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Phone::observe(PhoneObserver::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
