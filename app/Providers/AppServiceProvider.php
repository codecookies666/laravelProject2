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
        if (app()->isLocal()){
            $this->app->register(\VIACreative\SudoSu\ServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
	{
//		\App\Models\User::observe(\App\Observers\UserObserver::class);
		\App\Models\Reply::observe(\App\Observers\ReplyObserver::class);
//		\App\Models\Project::observe(\App\Observers\ProjectObserver::class);
        //手动注册监听器（不知道为什么没有自动生成）
        \App\Models\Topic::observe(\App\Observers\TopicObserver::class);

        Carbon::setlocale('zh');
    }
}
