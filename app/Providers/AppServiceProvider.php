<?php

namespace App\Providers;

use App\Models\Service;
use App\Models\Department;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();
         // Share departments data with the header
    // View::composer('partials.header', function ($view) {
    //     $departments = Department::with('translations')->get();
    //     $view->with('departments', $departments);
    // });
    // view()->share('departments', Department::all());
    // view()->share('services', Service::all());
//

        // view()->composer('*',function($view) {
        //     $view->with('departments', Department::all());
        // });
    }
}
