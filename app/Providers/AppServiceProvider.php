<?php

namespace App\Providers;

use Carbon\Carbon;
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
//		\App\Models\User::observe(\App\Observers\UserObserver::class);
//		\App\Models\Project::observe(\App\Observers\ProjectObserver::class);

        Carbon::setlocale('zh');
    }
}
