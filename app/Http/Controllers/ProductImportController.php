<?php

namespace App\Http\Controllers;
set_time_limit(0);
ini_set('max_execution_time', 0);
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductSection;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProductImportController extends Controller
{
    public function exportProducts()
    {
        $products = $this->fetchProducts();
        $processed = $this->processProducts($products);

        DB::beginTransaction();

        try {
            foreach ($processed as $item) {
                // Images split
                $imagesArray = array_filter(array_map('trim', explode(',', $item['Images'])));

                 // Generate unique slug
                $slug = $this->generateUniqueSlug($item['Title']);

                // Product insert
                $product = Product::create([
                    'name' => $item['Title'],
                    'slug' => $slug,
                    'description' => $item['Description'] ?? null,
                    'price' => $item['Compare Price'] ?? 0,
                    // 'discount' => $item['Discount %'] ?? 0,
                ]);

                $savedImages = [];

                foreach ($imagesArray as $index => $imgUrl) {

                    $localPath = $this->downloadAndSaveImage($imgUrl, $product->id);

                    if ($localPath) {
                        $savedImages[] = $localPath;

                        // Save in product_images table
                        ProductImage::create([
                            'product_id' => $product->id,
                            'image' => $localPath,
                        ]);
                    }
                }

                // First image as feature image
                if (!empty($savedImages)) {
                    $product->update([
                        'feature_image' => $savedImages[0]
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Products saved successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function downloadAndSaveImage($url, $productId)
    {
        try {
            // Create folder path
            $folderPath = public_path("uploads/products/{$productId}");

            if (!File::exists($folderPath)) {
                File::makeDirectory($folderPath, 0755, true);
            }

            // Get image content
            $imageContent = file_get_contents($url);

            if (!$imageContent) {
                return null;
            }

            // Generate unique filename
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
            $filename = uniqid() . '.' . ($extension ?: 'jpg');

            // Full path
            $filePath = $folderPath . '/' . $filename;

            // Save file
            file_put_contents($filePath, $imageContent);

            // Return DB path (relative)
            return $filename;

        } catch (\Exception $e) {
            return null;
        }
    }

    private function generateUniqueSlug($name)
    {
        $baseSlug = Str::slug($name);
 
        // Get all similar slugs at once (optimized)
        $allSlugs = Product::where('slug', 'LIKE', $baseSlug . '%')
            ->pluck('slug');

        if (!$allSlugs->contains($baseSlug)) {
            return $baseSlug;
        }

        $count = 1;
        while ($allSlugs->contains($baseSlug . '-' . $count)) {
            $count++;
        }

        return $baseSlug . '-' . $count;
    }

    private function fetchProducts()
    {
        $page = 1;
        $allProducts = [];
        $url = "https://cholanarts.com/collections/all/products.json?page=2";

        $response = Http::get($url);

        $data = $response->json();

        $allProducts = array_merge($allProducts, $data['products']);
        $page++;

        sleep(1); // avoid blocking

        return $allProducts;
    }

    private function processProducts($products)
    {
        $result = [];

        foreach ($products as $p) {

            $title = $p['title'] ?? '';
            $description = strip_tags($p['body_html'] ?? '');

            $variants = $p['variants'] ?? [];
            $price = $variants[0]['price'] ?? '';
            $compare_price = $variants[0]['compare_at_price'] ?? '';

            // Discount
            $discount = '';
            if (!empty($compare_price) && $compare_price > $price) {
                $discount = round((($compare_price - $price) / $compare_price) * 100, 2);
            }

            // Images (comma separated)
            $images = [];
            if (!empty($p['images'])) {
                foreach ($p['images'] as $img) {
                    $images[] = $img['src'];
                }
            }

            $images_str = implode(",", $images);

            $result[] = [
                'Title' => $title,
                'Description' => $description,
                'Price' => $price,
                'Compare Price' => $compare_price,
                'Discount %' => $discount,
                'Images' => $images_str,
            ];
        }

        return $result;
    }

    private function downloadCSV($data)
    {
        $response = new StreamedResponse(function () use ($data) {
            $handle = fopen('php://output', 'w');

            // Header
            fputcsv($handle, array_keys($data[0]));

            foreach ($data as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="products.csv"');

        return $response;
    }
}