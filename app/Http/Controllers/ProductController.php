<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Collection;
use App\Models\ProductImage;
use App\Models\ProductSection;
use Illuminate\Support\Str;
use DB;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.modules.Product.list');
    }

    public function getList(Request $request)
    {
        $products = Product::with(['images', 'categories'])->latest();

        return datatables()->of($products)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                return $row->feature_image 
                    ? '<img src="'.asset('uploads/products/'.$row->id .'/'.$row->feature_image).'" width="50">' 
                    : 'No Image';
            })
            ->addColumn('categories', function ($row) {
                if ($row->categories->isEmpty()) {
                    return 'NA';
                }

                return $row->categories->pluck('name')->implode(', ');
            })
            ->addColumn('collections', function ($row) {
                if ($row->collections->isEmpty()) {
                    return 'NA';
                }

                return $row->collections->pluck('name')->implode(', ');
            })
            ->addColumn('is_featured', function ($row) {
                $checked = $row->is_featured ? 'checked' : '';
                return '
                    <div class="form-check form-switch toggle-switch">
                        <input class="form-check-input toggle-feature" type="checkbox"  data-id="'.$row->id.'" '.$checked.'>
                    </div>';
            })
            ->addColumn('is_active', function ($row) {
                $checked = $row->status ? 'checked' : '';
                return '
                    <div class="form-check form-switch toggle-switch">
                        <input class="form-check-input toggle-status" type="checkbox"  data-id="'.$row->id.'" '.$checked.'>
                    </div>';
            })
            ->addColumn('actions', function ($row) {
                return '
                    <a href="/admin/products/'.$row->id.'/edit" class="btn primary-btn me-2 border">
                        <i class="lni lni-pencil"></i>
                    </a>
                    <button class="btn btn-danger dltBtn" data-id="'.$row->id.'">
                        <i class="lni lni-trash-can"></i>
                    </button>
                ';
            })
            ->rawColumns(['image', 'price', 'is_featured', 'is_active', 'actions', 'categories'])
            ->make(true);
    }

    public function add()
    {
        $categories = Category::where('is_active', 1)->get();
        $collections = Collection::where('is_active', 1)->get();

        return view('admin.modules.Product.add', compact('categories', 'collections'));
    }

    /**
     * Store Product
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
            // 'short_description' => 'required'
        ]);

        DB::beginTransaction();

        try {

            // base slug
            $baseSlug = Str::slug($request->name);

            // get similar slugs count
            $count = Product::where('slug', 'LIKE', $baseSlug . '%')->count();

            // final slug
            $slug = $count ? $baseSlug . '-' . ($count + 1) : $baseSlug;

            // Create Product
            $product = Product::create([
                'name' => $request->name,
                'slug' => $slug,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount,
                'material' => $request->material,
                'finish' => $request->finish,
                'technique' => $request->technique,
                'available_sizes' => $request->available_sizes,
                'gi_certified' => $request->gi_certified,
                'delivery' => $request->delivery,
                'tags' => $request->tags,
                'stock' => $request->stock ?? 0,
                // 'is_featured' => $request->is_featured ?? 0,
                'origin' => $request->origin,
                'about_title' => $request->about_title,
                'about_description' => $request->about_description,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);

            // attach multiple categories
            $product->categories()->attach($request->category_id);  

            // attach multiple collections
            $product->collections()->attach($request->callection_id);  

            //Upload Images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('uploads/products/'.$product->id.'/'), $name);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $name
                    ]);
                }
            }

            //Upload Images
            if ($request->hasFile('feature_image')) {
                $image = $request->file('feature_image');
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/products/'.$product->id.'/'), $name);
                $product->update([
                    'feature_image' => $name
                ]);
            }

            //Upload Images
            if ($request->hasFile('about_image')) {
                $image = $request->file('about_image');
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/products/'.$product->id.'/'), $name);
                $product->update([
                    'about_image' => $name
                ]);
            }

            //Save FAQs
            if ($request->has('faqs')) {
                foreach ($request->faqs as $faq) {
                    \App\Models\ProductFaq::create([
                        'product_id' => $product->id,
                        'question'   => $faq['question'],
                        'answer'     => $faq['answer'],
                    ]);
                }
            }

            // Save Sections (Tabs Data)
            if ($request->sections) {
                foreach ($request->sections as $key => $section) {
                    if (!empty($section['description'])) {
                        $imageName = null;

                        //IMAGE upload (per section)
                        if ($request->hasFile("sections.$key.image")) {
                            $image = $request->file("sections.$key.image");
                            $imageName = time().'_image_'.$key.'.'.$image->getClientOriginalExtension();
                            $image->move(public_path('uploads/products/'.$product->id .'/'), $imageName);
                        }

                        ProductSection::create([
                            'product_id' => $product->id,
                            'type' => $section['type'], // about, care, etc.
                            'title' => $section['title'] ?? null,
                            'description' => $section['description'],
                            'image' => $imageName,
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Product added successfully'
            ]);

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Edit Product
     */
    public function edit($id)
    {
        $product = Product::with(['images', 'sections', 'faqs'])->findOrFail($id);
        $productCategoryIds = $product->categories->pluck('id')->toArray();
        $categories = Category::where('is_active', 1)->get();

        $productCollectionIds = $product->collections->pluck('id')->toArray();
        $collections = Collection::where('is_active', 1)->get();
        
        return view('admin.modules.Product.edit', compact('product', 'categories', 'productCategoryIds', 'productCollectionIds', 'collections'));
    }

    /**
     * Update Product
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
            // check if name changed
            // if ($product->name != $request->name) {

            //     $baseSlug = Str::slug($request->name);
            //     $slug = $baseSlug;
            //     $i = 1;

            //     // ensure unique slug (ignore current product)
            //     while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            //         $slug = $baseSlug . '-' . $i++;
            //     }

            // } else {
                // keep old slug
                // $slug = $product->slug;
            // }

            // Update Product
            $product->update([
                'name' => $request->name,
                // 'slug' => $slug,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'price' => $request->price,
                'discount' => $request->discount,
                'material' => $request->material,
                'tags' => $request->tags,
                'delivery' => $request->delivery,
                'gi_certified' => $request->gi_certified,
                'available_sizes' => $request->available_sizes,
                'technique' => $request->technique,
                'origin' => $request->origin,
                'finish' => $request->finish,
                'stock' => $request->stock,
                'about_title' => $request->about_title,
                'about_description' => $request->about_description,
            ]);
            
            // sync categories (important 🔥)
            $product->categories()->sync($request->category_id);

            // sync categories (important 🔥)
            $product->collections()->sync($request->collection_id);

            // Images (optional - append only)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $name = time().'_'.$image->getClientOriginalName();
                    $image->move(public_path('uploads/products/'.$product->id.'/'), $name);
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $name
                    ]);
                }
            }

            // Delete old FAQs
            $product->faqs()->delete();

            // Insert new FAQs
            if ($request->has('faqs')) {
                foreach ($request->faqs as $faq) {
                    if (!empty($faq['question']) && !empty($faq['answer'])) {
                        \App\Models\ProductFaq::create([
                            'product_id' => $product->id,
                            'question'   => $faq['question'],
                            'answer'     => $faq['answer'],
                        ]);
                    }
                }
            }

            //Upload Images
            if ($request->hasFile('feature_image')) {
                $image = $request->file('feature_image');
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/products/'.$product->id.'/'), $name);
                $product->update([
                    'feature_image' => $name
                ]);
            }

            //Upload Images
            if ($request->hasFile('about_image')) {
                $image = $request->file('about_image');
                $name = time().'_'.$image->getClientOriginalName();
                $image->move(public_path('uploads/products/'.$product->id.'/'), $name);
                $product->update([
                    'about_image' => $name
                ]);
            }

            // Sections (delete old + insert new)
            $product->sections()->delete();
            if ($request->sections) {
                foreach ($request->sections as $key => $section) {
                    if (!empty($section['description'])) {
                        $imageName = null;

                        //IMAGE upload (per section)
                        if ($request->hasFile("sections.$key.image")) {
                            $image = $request->file("sections.$key.image");
                            $imageName = time().'_image_'.$key.'.'.$image->getClientOriginalExtension();
                            $image->move(public_path('uploads/products/'.$product->id.'/'), $imageName);
                        }

                        ProductSection::create([
                            'product_id' => $product->id,
                            'type' => $section['type'],
                            'title' => $section['title'] ?? null,
                            'description' => $section['description'],
                            'image' => $imageName,
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Product updated successfully'
            ]);

        } catch (\Exception $e) {

            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Delete Product
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully'
        ]);
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        // delete file
        $path = public_path('uploads/products/'.$image->product_id .'/' . $image->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully'
        ]);
    }

    public function updateStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => true]);
    }

    public function updateFeature(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->is_featured = $request->feature;
        $product->save();

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $product = Product::with(['images', 'sections'])->findOrFail($id);

        return view('admin.modules.Product.view', compact('product'));
    }

    public function bulkUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        DB::beginTransaction();

        try {

            $file = fopen($request->file('file'), 'r');

            // Skip header
            fgetcsv($file);

            $slugs = []; // track duplicates inside file
            $rowNumber = 1;

            while (($row = fgetcsv($file)) !== false) {

                $rowNumber++;

                $name = trim($row[0] ?? '');
                $price = $row[1] ?? 0;
                $description = $row[2] ?? '';

                if (!$name) {
                    throw new \Exception("Row {$rowNumber}: Product name is required");
                }

                // base slug
                $baseSlug = Str::slug($name);
                $slug = $baseSlug;
                $i = 1;

                $existingSlugs = Product::pluck('slug')->toArray();

                while (
                    in_array($slug, $existingSlugs) ||
                    isset($slugs[$slug])
                ) {
                    $slug = $baseSlug . '-' . $i++;
                }

                $existingSlugs[] = $slug;
                $slugs[$slug] = true;

                $product = Product::create([
                    'name' => $name,
                    'slug' => $slug,
                    'price' => $price,
                    'description' => $description,
                    'sub_title' => $row[4] ?? null,
                    'about_title' => $row[5] ?? null,
                    'about_description' => $row[6] ?? null,
                    'material' => $row[7] ?? null,
                    'finish' => $row[8] ?? null,
                    'technique' => $row[9] ?? null,
                    'origin' => $row[10] ?? null,
                    'delivery' => $row[11] ?? null,
                    'stock' => $row[12] ?? 0,
                    'gi_certified' => $row[13] ?? null,
                    'tags' => $row[14] ?? null,
                    'available_sizes' => $row[15] ?? null,
                    'meta_title' => $row[16] ?? null,
                    'meta_keywords' => $row[17] ?? null,
                    'meta_description' => $row[18] ?? null,
                ]);

                // ✅ Categories by name
                if (!empty($row[3])) {
                    $categoryNames = array_map('trim', explode(',', $row[3]));

                    $categoryIds = [];

                    foreach ($categoryNames as $catName) {
                        $category = Category::firstOrCreate(
                            ['name' => strtolower($catName)],
                            ['is_active' => 1]
                        );

                        $categoryIds[] = $category->id;
                    }

                    $product->categories()->sync($categoryIds);
                }
            }

            fclose($file);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Products uploaded successfully'
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function downloadSample()
    {
        $filename = "sample_products.csv";

        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['name', 'price', 'description', 'categories', 'subtitle', 'About Title', 'About Description', 'Material', 'Finish', 'Technique', 'Origin', 'Delivery Info', 'Stock', 'GI Certified', 'Tags', 'Available Sizes', 'Meta Title', 'Meta Keywords', 'Meta Description'];

        $callback = function() use ($columns) {
            $file = fopen('php://output', 'w');

            // Add header row
            fputcsv($file, $columns);

            // Sample data rows
            fputcsv($file, ['Ganesha Idol', '1200', 'Beautiful handcrafted idol', 'Ganesha, Bronze', 'Ganesha Idol', 'Test', 'Lorem ipsum testing purpose', 'Stone', 'Antique', 'Modern', 'Tamil Nadu', 'Pan-India', 25, 'ASI', 'ganesha,ganesha idol, ganesha statue', '16", 2",6"', 'Cholan Arts', 'Cholan Arts, Cholan Dynasty', 'Lorem ipsum test description']);
            fputcsv($file, ['Shiva Statue', '2500', 'Premium bronze statue', 'Shiva']);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function downloadImage($url, $productId, $key = 0)
    {
        try {
            // Get image content
            $contents = file_get_contents($url);

            if (!$contents) return null;

            // Extension detect
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
            if (!$extension) {
                $extension = 'jpg'; // fallback
            }

            // Same naming pattern like your code
            $imageName = time() . '_image_' . $key . '.' . $extension;

            // Path same as your logic
            $destinationPath = public_path('uploads/products/' . $productId . '/');

            // Folder create if not exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Save image
            file_put_contents($destinationPath . $imageName, $contents);

            return $imageName;

        } catch (\Exception $e) {
            return null;
        }
    }

    private function generateSizes($dimension)
    {
        // Agar tumhe AX ignore karke fixed sizes chahiye
        $sizes = [];

        for ($i = 8; $i <= 32; $i += 8) {
            $sizes[] = $i . '"';
        }

        return implode(',', $sizes);
    }

    public function importProducts()
    {
        ini_set('max_execution_time', 300); // 5 minutes
            // ya
            // set_time_limit(300);
        $file = storage_path('app/p15.xlsx');
        $rows = Excel::toArray([], $file)[0];

        // ✅ Skip header row
        unset($rows[0]);
        $rows = array_values($rows);

        // ✅ Slug handling
        $existingSlugs = Product::pluck('slug')->toArray();
        $slugs = [];

        $lastProduct = null;
        $key = 0;

        foreach (array_chunk($rows, 100) as $chunk) {

            foreach ($chunk as $row) {

                $title = trim($row[1] ?? '');
                $description = $row[2] ?? '';
                $imageUrl = $row[32] ?? '';
                $dimension = $row[49] ?? ''; // AX column

                // 👉 SIZE LOGIC (fixed as per your requirement)
                $sizes = $this->generateSizes($dimension);

                // 👉 NEW PRODUCT
                if (!empty($title)) {

                    $baseSlug = Str::slug($title);
                    $slug = $baseSlug;
                    $i = 1;

                    while (
                        in_array($slug, $existingSlugs) ||
                        isset($slugs[$slug])
                    ) {
                        $slug = $baseSlug . '-' . $i++;
                    }

                    $existingSlugs[] = $slug;
                    $slugs[$slug] = true;

                    $product = Product::create([
                        'name' => $title,
                        'description' => $description,
                        'price' => 0,
                        'slug' => $slug,
                        'available_sizes' => $sizes // 👈 SAVE SIZE HERE
                    ]);

                    $lastProduct = $product;
                    $key = 0;

                    // 👉 Feature Image
                    if (!empty($imageUrl)) {
                        $imagePath = $this->downloadImage($imageUrl, $product->id, $key);

                        if ($imagePath) {
                            $product->update([
                                'feature_image' => $imagePath
                            ]);
                        }

                        $key++;
                    }
                }

                // 👉 SAME PRODUCT (gallery images)
                else if ($lastProduct && !empty($imageUrl)) {

                    $imagePath = $this->downloadImage($imageUrl, $lastProduct->id, $key);

                    if ($imagePath) {
                        ProductImage::create([
                            'product_id' => $lastProduct->id,
                            'image' => $imagePath
                        ]);
                    }

                    $key++;
                }
            }
        }

        return "✅ Import Completed Successfully";
    }
}
