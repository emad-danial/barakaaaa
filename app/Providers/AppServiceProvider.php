<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\models\AppSetting;
use Illuminate\Support\Facades\View;
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
        //
        $appSetting=AppSetting::all()->first();

        View::share('appSetting',$appSetting);
    }
}
