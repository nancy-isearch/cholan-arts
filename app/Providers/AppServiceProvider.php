<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Category;
use App\Models\Collection;
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

            $menuCollections = Collection::where('is_active', 1)->get();

            $map = [
                'home' => 'home',
                'about' => 'about',
                'contact' => 'contact',
                'products' => 'product_list',
                'categories' => 'categories',
                'category.products' => 'categories',
                'collections' => 'collections',
                'collection.products' => 'collections',
            ];
            $seo = null;

            
            if(request()->route()) {
                $routeName = request()->route()->getName();
                $pageKey = $map[$routeName] ?? null;
                
                if ($pageKey) {
                    $seo = \App\Models\SeoSetting::where('page_key', $pageKey)->first();
                    $view->with('seo', $seo);
                }
            }
            
            
            $view->with('pages', $pages)->with('menuCategories', $menuCategories)->with('menuCollections', $menuCollections)->with('seo', $seo);
        });
    }
}
