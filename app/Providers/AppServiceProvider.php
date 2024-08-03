<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use App\Models\Categorie;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        View::composer('*', function ($view) {
            $view->with('categories', $this->getCategories());
        });
    }

    public function getCategories()
    {
        // Check if the categories are already in the cache
        $categories = Cache::remember('categories', $minutes=60, function () {
            // If not in cache, fetch from the database
            return Categorie::where('status','=','1')->get();
        });

        return $categories;
    }
}
