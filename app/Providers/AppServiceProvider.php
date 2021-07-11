<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Tag;
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

        //View::share('tags', Tag::orderBy('name')->get());

        View::composer(['test'],function($view){
            $view->with('tags', Tag::orderBy('name')->get());
        });
    }
}
