<?php
namespace CodePress\CodeCategory\Providers;

use Illuminate\Support\ServiceProvider;

class CodeCategoryServiceProvider extends ServiceProvider
{

    public function boot(){
        $this->publishes([__DIR__.'/../resources/migrations/'=>base_path('database/migrations')],'migrations');
        require __DIR__.'/../routes.php';
        $this->loadViewsFrom(__DIR__ . '/../resources/views/categories', 'codecategory');
    }

    public function register()
    {

    }

}