<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\URL;

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
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer([
            'pages.main', 'pages.search', 'admin.categories.index', 
            'admin.books.edit', 'admin.books.create', 
            'partials.header', 'partials.footer'], function ($view) {
            // Лучше добавить кэширование
            $categories = Cache::remember('site_categories', 3600, function () {
                return Category::all();
            });
            $view->with('categories', $categories);
        });
    }
}
