<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

use Illuminate\Support\Facades\View;
use App\Models\Dclass;
use App\Models\Language;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (!app()->runningInConsole()) {
            //View::share('dclasses', Dclass::all());
            View::share('languages', Language::enabled());
        }

        Relation::enforceMorphMap([
            'agent' => 'App\Models\Agent',
            'architect' => 'App\Models\Architect',
            'broker' => 'App\Models\Broker',
            'developer' => 'App\Models\Developer',
            'develop' => 'App\Models\Develop',
            'sysmod' => 'App\Models\Sysmod',
        ]);

    }
}
