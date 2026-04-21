<?php

namespace App\Services;

use App\Models\Collection;
use Illuminate\Support\Str;

class CollectionService
{
    // 📄 GET ALL
    public function getAll()
    {
        return Collection::latest()->get();
    }

    // 🔍 GET BY ID
    public function getById($id)
    {
        return Collection::findOrFail($id);
    }

    // ➕ CREATE
    public function create($request)
    {
        $data = $request->all();

        // SLUG
        $data['slug'] = Str::slug($data['name']);

        // IMAGE UPLOAD
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'));
        }

        return Collection::create($data);
    }

    // ✏️ UPDATE
    // public function update($id, $request)
    // {
    //     $collection = Collection::findOrFail($id);
    //     $data = $request->all();

    //     // SLUG
    //     if (isset($data['name'])) {
    //         $data['slug'] = Str::slug($data['name']);
    //     }

    //     // IMAGE UPDATE
    //     if ($request->hasFile('image')) {

    //         // delete old image
    //         if ($collection->image && file_exists(public_path($collection->image))) {
    //             unlink(public_path($collection->image));
    //         }

    //         $data['image'] = $this->uploadImage($request->file('image'));
    //     }

    //     $collection->update($data);

    //     return $collection;
    // }

    // 🗑 DELETE (with image delete)
    public function delete($id)
    {
        $collection = Collection::findOrFail($id);

        // delete image
        if ($collection->image && file_exists(public_path($collection->image))) {
            unlink(public_path($collection->image));
        }

        $collection->delete();

        return true;
    }

    // ♻️ RESTORE
    public function restore($id)
    {
        $collection = Collection::withTrashed()->findOrFail($id);
        $collection->restore();

        return $collection;
    }

    // 📤 IMAGE UPLOAD (Reusable)
    private function uploadImage($file)
    {
        $folder = 'uploads/collections';

        // ensure folder exists
        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0755, true);
        }

        $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();

        $file->move(public_path($folder), $filename);

        return $folder.'/'.$filename;
    }

    public function update($id, $request)
    {
        $collection = Collection::findOrFail($id);
        $data = $request->all();

        $data['slug'] = Str::slug($data['name']);

        if ($request->hasFile('image')) {

            // DELETE OLD IMAGE
            if ($collection->image && file_exists(public_path($collection->image))) {
                unlink(public_path($collection->image));
            }

            $data['image'] = $this->uploadImage($request->file('image'));
        }

        $collection->update($data);

        return $collection;
    }
}