<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        //Paginator::useBootstrap();
        $locale = config('app.locale') == 'ar'? 'ar': config('app.locale');
        App::setlocale($locale);
        Lang::setlocale($locale);
        Session::put('locale',$locale);
        Carbon::setlocale($locale);
    }
}
