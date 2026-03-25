<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::where('is_active', 1)->get();

        return view('frontend.pages.products', compact('categories'));
    }
}
