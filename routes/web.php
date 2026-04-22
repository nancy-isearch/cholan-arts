<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductImportController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SeoController;

//Frontend Controllers
use App\Http\Controllers\FrontendController;

Auth::routes();
// Route::view('/', 'frontend.pages.home');
Route::view('/about-us', 'frontend.pages.about')->name('about');
Route::view('/contact-us', 'frontend.pages.contact')->name('contact');
Route::post('/enquiry', [EnquiryController::class, 'store']);

Route::get('/product-bulk-upload', [ProductController::class, 'importProducts']);

Route::get('/', [FrontendController::class, 'getHomeContent'])->name('home');
Route::get('/product/{id}', [FrontendController::class, 'productDetail']);
Route::get('/products', [FrontendController::class, 'categoryList'])->name('products');
Route::get('/get-products', [FrontendController::class, 'getProducts']);  
Route::get('/search-suggest', [FrontendController::class, 'suggest']); 

// Categories list page
Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');
// Category wise products page
Route::get('/category/{slug}', [FrontendController::class, 'categoryProducts'])->name('category.products');

// Collections list page
Route::get('/collections', [FrontendController::class, 'collections'])->name('collections');
// Category wise products page
Route::get('/collection/{slug}', [FrontendController::class, 'collectionProducts'])->name('collection.products');

Route::get('/{slug}', [FrontendController::class, 'showPage'])->name('page.show');





// Route::get('/login', [LoginController::class, 'showLogin'])->name('login');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/enquiry-chart', [DashboardController::class, 'getChartData']);
    Route::get('/enquiry-stats', [DashboardController::class, 'getEnquiryStats']);
    Route::get('/top-products', [DashboardController::class, 'getTopProducts']);

    Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries', [EnquiryController::class, 'index'])->name('enquiries.index');
    Route::get('/enquiries/{id}', [EnquiryController::class, 'show'])->name('enquiries.show');
    Route::post('/enquiry/{id}/status', [EnquiryController::class, 'updateStatus'])->name('enquiry.status');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/categories/update-status', [CategoryController::class, 'updateStatus'])->name('categories.updateStatus');
    Route::delete('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::get('/collections', [CollectionController::class, 'index'])->name('collections.index');
    Route::post('/collections/store', [CollectionController::class, 'store'])->name('collections.store');
    Route::get('/collections/{id}', [CollectionController::class, 'show'])->name('collections.show');
    Route::post('/collections/update/{id}', [CollectionController::class, 'update'])->name('collections.update');


    Route::post('/collections/update-status', [CollectionController::class, 'updateStatus'])->name('collections.updateStatus');
    Route::delete('/collections/delete/{id}', [CollectionController::class, 'destroy'])->name('collections.delete');

    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/list', [ProductController::class, 'getList'])->name('products.list');
    Route::get('/products/add', [ProductController::class, 'add'])->name('products.add');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/products/update-status', [ProductController::class, 'updateStatus'])->name('products.updateStatus');
    Route::put('/products/update-feature', [ProductController::class, 'updateFeature'])->name('products.updateFeature');
    Route::delete('/products/image/{id}', [ProductController::class, 'deleteImage'])->name('products.image.delete');
    Route::delete('/products/delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');
    Route::post('/products-bulk-upload', [ProductController::class, 'bulkUpload']);
    Route::get('/admin/products/sample-csv', [ProductController::class, 'downloadSample'])->name('products.sample.csv');
    
    Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
    Route::get('/seo/{page_key}', [SeoController::class, 'edit'])->name('seo.edit');
    Route::post('/seo/{page_key}', [SeoController::class, 'update'])->name('seo.update');


    Route::get('pages/list', [PageController::class, 'list'])->name('pages.list');
    Route::put('pages/update-status', [PageController::class, 'updateStatus']);
    Route::delete('pages/delete/{id}', [PageController::class, 'destroy']);
    Route::resource('pages', PageController::class);
    Route::post('/editor/image-upload', [PageController::class, 'upload'])->name('editor.image.upload');
});

Route::get('/export-products', [ProductImportController::class, 'exportProducts']);