<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CollectionService;
use App\Models\Collection;
use Yajra\DataTables\Facades\DataTables;

class CollectionController extends Controller
{
    protected $collectionService;

    public function __construct(CollectionService $collectionService)
    {
        $this->middleware('auth');
        $this->collectionService = $collectionService;
    }

    // 📄 LIST
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Collection::latest();
            return DataTables::of($data)
                ->addIndexColumn()
                // IMAGE COLUMN
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return asset($row->image);
                    }
                    return null;
                })
                ->addColumn('subtitle', function ($row) {
                    if ($row->subtitle) {
                        return \Illuminate\Support\Str::limit($row->subtitle, 50);
                    }
                    return '—';
                })
                ->addColumn('is_active', function ($row) {
                    $checked = $row->is_active ? 'checked' : '';
                    return '
                        <div class="form-check form-switch">
                            <input class="form-check-input toggle-status"
                                type="checkbox"
                                data-id="'.$row->id.'"
                                '.$checked.'>
                        </div>';
                })
                ->addColumn('actions', function ($row) {
                    return '
                        <button class="btn primary-btn me-2 border editBtn" data-id="'.$row->id.'" data-name="'.$row->name.'" data-subtitle="'.$row->subtitle.'" data-image="'.asset($row->image).'">

                            <i class="lni lni-pencil"></i>
                        
                        </button>

                        <button class="btn btn-danger dltBtn" data-id="'.$row->id.'">
                            <i class="lni lni-trash-can"></i>
                        </button>';
                })

                ->rawColumns(['is_active', 'actions'])
                ->make(true);
        }

        return view('admin.modules.Collection.list');
    }

    // 📥 STORE
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:collections,name',
            'subtitle'  => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120'
        ]);

        $this->collectionService->create($request);

        return response()->json([
            'status'  => true,
            'message' => 'Collection added successfully'
        ]);
    }

    // ✏️ UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
            'subtitle'  => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120'
        ]);

        $this->collectionService->update($id, $request);

         return response()->json(['success' => true, 'message' => 'Collection updated successfully']);
    }

    // 🔄 STATUS
    public function updateStatus(Request $request)
    {
        $collection = Collection::findOrFail($request->id);
        $collection->is_active = $request->status;
        $collection->save();

        return response()->json(['success' => true]);
    }

    // 🗑 DELETE
    public function destroy($id)
    {
        $this->collectionService->delete($id);

        return response()->json([
            'success' => true,
            'message' => 'Collection deleted successfully'
        ]);
    }

    // ♻️ RESTORE
    public function restore($id)
    {
        $this->collectionService->restore($id);

        return redirect()->route('collections.index')
            ->with('success', 'Collection restored');
    }
}