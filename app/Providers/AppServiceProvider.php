<?php

namespace App\Providers;

use App\Brand;
use App\category;
use Illuminate\Support\Facades\View;
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
//        View::composer('layouts.app',function ($view){
//            $view->with('categories', category::all()) ;
//        });

        View::composer(array('layouts.app','welcome'),function ($view){
           $view->with('categories', category::all()) ;
        });

        View::composer('*',function ($view){
            $view->with('brands', Brand::all()) ;
        });

    }
}
