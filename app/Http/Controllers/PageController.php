<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    public function list()
    {
        $pages = Page::latest();

        return DataTables::of($pages)
            ->addIndexColumn()

            ->addColumn('status', function ($row) {
                $checked = $row->status ? 'checked' : '';
                return '
                    <div class="form-check form-switch toggle-switch">
                        <input class="form-check-input toggle-status" type="checkbox"  data-id="'.$row->id.'" '.$checked.'>
                    </div>';
            })
            ->addColumn('actions', function ($row) {
                return '
                    <a href="/admin/pages/'.$row->id.'/edit" class="primary-btn hover:bg-blue-600 text-white text-xs px-3 py-1 rounded shadow-sm transition">
                        <i class="lni lni-pencil"></i>
                    </a>
                    <button class="btn btn-danger dltBtn hover:bg-blue-600 text-white text-xs px-3 py-1 rounded shadow-sm transition" data-id="'.$row->id.'">
                        <i class="lni lni-trash-can"></i>
                    </button>
                ';
            })
            ->rawColumns(['status','actions'])
            ->make(true);
    }

    public function index()
    {
        return view('admin.modules.Page.list');
    }

    public function create()
    {
        return view('admin.modules.Page.add');
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'nullable|unique:pages,slug',
            'content' => 'nullable',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:0,1',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->all();

            // ✅ Slug generate (if empty)
            $data['slug'] = $request->slug 
                ? Str::slug($request->slug) 
                : Str::slug($request->title);

            // ✅ Unique slug fix (important 🔥)
            $count = Page::where('slug', $data['slug'])->count();
            if ($count > 0) {
                $data['slug'] = $data['slug'] . '-' . time();
            }

            // ✅ Hero Image Upload
            if ($request->hasFile('hero_image')) {
                $file = $request->file('hero_image');
                $name = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/pages'), $name);
                $data['hero_image'] = $name;
            }

            // ✅ Save
            Page::create($data);

            return response()->json([
                'status' => true,
                'message' => 'Page created successfully'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.modules.Page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->all();

        // slug generate if empty
        $data['slug'] = $request->slug 
            ? Str::slug($request->slug) 
            : Str::slug($request->title);

        if ($request->hasFile('hero_image')) {

            $path = public_path('uploads/pages/');

            // delete old image
            if ($page->hero_image && File::exists($path.$page->hero_image)) {
                File::delete($path.$page->hero_image);
            }

            $file = $request->file('hero_image');
            $name = time().'.'.$file->getClientOriginalExtension();
            $file->move($path, $name);

            $data['hero_image'] = $name;
        }

        $page->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Page updated successfully'
        ]);
    }

    public function updateStatus(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->status = $request->status;
        $page->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return response()->json([
            'status' => true,
            'message' => 'Page deleted successfully'
        ]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/editor'), $filename);

            return response()->json([
                'location' => asset('uploads/editor/' . $filename)
            ]);
        }
    }
}
