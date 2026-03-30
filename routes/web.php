<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductImportController;
use App\Http\Controllers\Auth\LoginController;

//Frontend Controllers
use App\Http\Controllers\FrontendController;

// Route::view('/', 'frontend.pages.home');
Route::view('/about-us', 'frontend.pages.about');
Route::view('/product-details', 'frontend.pages.product-detail');
Route::view('/contact-us', 'frontend.pages.contact');
Route::view('/privacy-policy', 'frontend.pages.privacy-policy');
Route::view('/terms-of-use', 'frontend.pages.terms-conditions');
Route::post('/enquiry', [EnquiryController::class, 'store']);

Route::get('/', [FrontendController::class, 'getHomeContent']);
Route::get('/product/{id}', [FrontendController::class, 'productDetail']);
Route::get('/catalogue', [FrontendController::class, 'categoryList']);
Route::get('/get-products', [FrontendController::class, 'getProducts']);  
Route::get('/search-suggest', [FrontendController::class, 'suggest']);  

Auth::routes();

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
});

Route::get('/export-products', [ProductImportController::class, 'exportProducts']);