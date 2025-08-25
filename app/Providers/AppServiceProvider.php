<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\News;
use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFive();

        Relation::enforceMorphMap([
             'user' => User::class,
            'news' => News::class,

        ]);
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
