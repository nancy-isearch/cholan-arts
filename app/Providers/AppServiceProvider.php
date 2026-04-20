<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            $pages = Page::where('status', 1)->get();
            $menuCategories = Category::where('is_active', 1)->whereHas('products', function ($q) {
                $q->where('status', 1);
            })->get();

            

            $map = [
                'home' => 'home',
                'about' => 'about',
                'contact' => 'contact',
                'products' => 'product_list',
            ];
            $routeName = request()->route()->getName();
            $pageKey = $map[$routeName] ?? null;
            $seo = null;
            if ($pageKey) {
                $seo = \App\Models\SeoSetting::where('page_key', $pageKey)->first();
                $view->with('seo', $seo);
            }
            
            $view->with('pages', $pages)->with('menuCategories', $menuCategories)->with('seo', $seo);
        });
    }
}
