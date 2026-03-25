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
                              <button class="text-danger dltBtn" data-id="'.$row->id.'">
                                <i class="lni lni-trash-can"></i>
                              </button>
                            </div>
                        </div>';
                })
                ->rawColumns(['is_active', 'actions'])
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
            'name' => 'required|unique:categories,name'
        ]);
        $this->categoryService->create($request->all());

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
        $request->validate([
            'name' => 'required'
        ]);

        $this->categoryService->update($id, $request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Category updated');
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
