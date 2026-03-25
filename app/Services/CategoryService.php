<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService
{
    // Get all categories
    public function getAll()
    {
        return Category::latest()->get();
    }

    // Get single
    public function getById($id)
    {
        return Category::findOrFail($id);
    }

    // Create
    public function create($data)
    {
        $data['slug'] = Str::slug($data['name']);

        return Category::create($data);
    }

    // Update
    public function update($id, $data)
    {
        $category = Category::findOrFail($id);

        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);

        return $category;
    }

    // Soft Delete
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return true;
    }

    // Restore
    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return $category;
    }
}