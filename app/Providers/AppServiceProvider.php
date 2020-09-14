<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use App\User;
use App\Emp;
class AppServiceProvider extends ServiceProvider
{


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
          
        
     Schema::defaultStringLength(191);
        
     view()->composer('layouts.app', function($view){
   
         $usr= User::with('employee')->where('id',Auth::user()->id)->get();
        $view->with('usr',$usr[0] );
            });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
