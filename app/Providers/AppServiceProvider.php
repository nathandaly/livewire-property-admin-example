<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'advert'      => \App\Models\Eloquent\PropertyAdvert::class,
            'agent'       => \App\Models\Eloquent\Agent::class,
            'branch'      => \App\Models\Eloquent\Branch::class,
            'developer'   => \App\Models\Eloquent\Developer::class,
            'development' => \App\Models\Eloquent\Development::class,
            'profile'     => \App\Models\Eloquent\PropertyProfile::class,
            'property'    => \App\Models\Eloquent\Property::class,
            'user'        => \App\User::class,
            'ppd'         => \App\Models\Eloquent\PricePaidData::class,
            'epc'         => \App\Models\Eloquent\EnergyPerformanceCertificate::class,
        ]);
    }
}
