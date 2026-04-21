<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Page;

class FrontendController extends Controller
{
    public function getHomeContent()
    {
        //take 10 products
        $products = Product::with(['images', 'categories'])
        ->where('status', 1)->where('is_featured', 1)
        ->take(10)
        ->get();

        //take 5 from ganesha
        $ganeshas = Product::with(['images', 'categories'])
        ->where('status', 1)->where('is_featured', 1)
        ->whereHas('categories', function ($query) {
            $query->where('name', 'ganesha');
        })
        ->take(5)
        ->get();

        //5 from scupture
        $sculptures = Product::with(['images', 'categories'])
        ->where('status', 1)->where('is_featured', 1)
        ->whereHas('categories', function ($query) {
            $query->where('name', 'sculptures');
        })
        ->take(5)
        ->get();

        //latest deity of every category
        $deities = Product::with(['images', 'categories'])
        ->where('status', 1)
        ->where('is_featured', 1)
        ->whereHas('categories')
        ->latest()
        ->get()
        ->unique(function ($item) {
            return $item->categories->pluck('id')->first();
        })
        ->values();

        return view('frontend.pages.home', compact('products', 'ganeshas', 'sculptures', 'deities'));
    }

    public function categoryList(Request $request)
    {
        $categoryName = $request->c;

        $categories = Category::where('is_active', 1)->whereHas('products', function ($q) {
            $q->where('status', 1);
        })->withCount(['products as active_products_count' => function ($q) {
            $q->where('status', 1);
        }])->get();

        $totalProducts = Product::where('status', 1)->count();

        //Category based products list 
        $categoryName = $request->c;
        $query = Product::with(['images', 'categories'])
            ->where('status', 1);

        if ($categoryName && $categoryName !== 'all') {
            $query->whereHas('categories', function ($q) use ($categoryName) {
                $q->where('name', $categoryName);
            });
        }

        $products = $query->get();

        return view('frontend.pages.products', compact('categories', 'totalProducts', 'products', 'categoryName'));
    }

    public function getProducts(Request $request)
    {
        $category = $request->category;
        $collection = $request->collection;

        $query = Product::where('status', 1);

        if ($request->has('category') && $category != 'all') {
            $query->whereHas('categories', function ($q) use ($category) {
                $q->where('name', $category);
            });
        } elseif($request->has('collection')) {
            $query->whereHas('collections', function ($q) use ($collection) {
                $q->where('name', $collection);
            });
        }

        $products = $query->paginate(20);

        $data = $products->map(function ($p) {
            $sizes = ['square', 'portrait', 'tall', 'wide'];
            $image = $p->feature_image;
            return [
                'id' => $p->id,
                'title' => $p->name,
                'slug' => $p->slug,
                'desc' => $p->short_description ?? 'Cholan Arts',
                'image' => $image ? asset('uploads/products/'.$p->id .'/'.$image) : asset('assets/images/products-img/placeholder-product.jpg'),
                'category' => ucfirst($p->categories->pluck('name')->first()),
                'size' => $sizes[array_rand($sizes)], // for masornary grid 
            ];
        });

        return response()->json([
            'data' => $data,
            'total' => $products->total(),
            'current_page' => $products->currentPage(),
            'last_page' => $products->lastPage(),
        ]);
    }

    public function productDetail($id)
    {
        $product = Product::with(['images', 'sections'])->where('id', $id)->orWhere('slug', $id)->firstOrFail();
        
        $categoryIds = $product->categories->pluck('id');

        // related products
        $relatedProducts = Product::with('images')
            ->where('id', '!=', $product->id) // current product exclude
            ->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            })
            ->take(6)
            ->get();

        return view('frontend.pages.product-detail', compact('product', 'relatedProducts'));
    }

    public function suggest(Request $request)
    {
        $query = $request->q;

        $products = Product::where('name', 'LIKE', "%$query%")
            ->with('categories')
            // ->limit(5)
            ->get();

        return response()->json($products);
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        
        return view('frontend.pages.page', compact('page'));
    }

    public function categories()
    {
        $categories = Category::where('is_active', 1)->whereHas('products', function ($q) {
            $q->where('status', 1);
        })->withCount(['products as active_products_count' => function ($q) {
            $q->where('status', 1);
        }])->get();

        return view('frontend.pages.categories', compact('categories'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('name', $slug)->firstOrFail();
       
        return view('frontend.pages.category-products', compact('category'));
    }

    public function collections()
    {
        $collections = Collection::where('is_active', 1)->withCount(['products as active_products_count' => function ($q) {
            $q->where('status', 1);
        }])->get();

        return view('frontend.pages.collections', compact('collections'));
    }

    public function collectionProducts($slug)
    {
        $collection = Collection::where('name', $slug)->firstOrFail();
       
        return view('frontend.pages.collection-products', compact('collection'));
    }
}
