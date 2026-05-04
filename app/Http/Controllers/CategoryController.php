<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->middleware('auth');
        $this->categoryService = $categoryService;
    }

    // 📄 List
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::latest();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('image', function ($row) {
                    return $row->image 
                        ? '<img src="'.asset($row->image).'" width="50">' 
                        : 'No Image';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y');
                })
                ->addColumn('is_active', function ($row) {
                    $checked = $row->is_active ? 'checked' : '';
                    return '
                        <div class="form-check form-switch toggle-switch">
                            <input class="form-check-input toggle-status" type="checkbox"  data-id="'.$row->id.'" '.$checked.'>
                        </div>';
                })
                ->addColumn('actions', function ($row) {
                    return '
                        <div class="flex items-center gap-2 min-w-[180px]   ">
                            <div class="action">
                                <button class="editBtn btn primary-btn me-2 border" 
                                    data-id="'.$row->id.'" 
                                    data-name="'.$row->name.'" 
                                    data-image="'.$row->image.'">
                                    <i class="lni lni-pencil"></i>
                                </button>
                                <button class="text-danger dltBtn btn btn-danger" data-id="'.$row->id.'">
                                    <i class="lni lni-trash-can"></i>
                                </button>
                            </div>
                        </div>';
                })
                ->rawColumns(['image', 'is_active', 'actions'])
                ->make(true);
        }

        return view('admin.modules.Category.list');
    }

    // ➕ Create form
    public function create()
    {
        return view('categories.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);
        $data = $request->all();

        // Upload image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/categories'), $filename);

            $data['image'] = 'uploads/categories/' . $filename;
        }

        $this->categoryService->create($data);

        return response()->json([
            'status' => true,
            'message' => 'Category added successfully'
        ]);
    }

    //Edit form
    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('categories.edit', compact('category'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $data = $request->all();

        // Upload new image
        if ($request->hasFile('image')) {

            // delete old image
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/categories'), $filename);

            $data['image'] = 'uploads/categories/' . $filename;
        }

        $this->categoryService->update($id, $data);

        return response()->json([
            'status' => true,
            'message' => 'Category updated successfully'
        ]);
    }
    
    public function updateStatus(Request $request)
    {
        $category = Category::findOrFail($request->id);

        $category->is_active = $request->status;
        $category->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete(); // soft delete

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully'
        ]);
    }

    // Restore
    public function restore($id)
    {
        $this->categoryService->restore($id);

        return redirect()->route('categories.index')
            ->with('success', 'Category restored');
    }



    // Frontednd API Functions
    
}
