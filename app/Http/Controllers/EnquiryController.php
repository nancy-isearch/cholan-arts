<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnquiryService;
use App\Models\Enquiry;
use Yajra\DataTables\Facades\DataTables;

class EnquiryController extends Controller
{
    protected $enquiryService;

    public function __construct(EnquiryService $enquiryService)
    {
        $this->enquiryService = $enquiryService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Enquiry::with('product')->latest();

            return DataTables::of($data)
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('d M Y');
                })
                ->addColumn('product_name', function ($row) {
                    return $row->product ? $row->product->name : '-';
                })
                ->addColumn('actions', function ($row) {
                    return '
                        <div class="flex items-center gap-2 min-w-[180px]   ">
                        <button 
                            class="primary-btn hover:bg-blue-600 text-white text-xs px-3 py-1 rounded shadow-sm transition viewBtn"
                            data-id="'.$row->id.'">
                            <i class="lni lni-pencil"></i>
                        </button>
                        <select 
                            class="text-xs px-2 py-1 rounded border border-gray-300 bg-white text-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-400 statusChange"
                            data-id="'.$row->id.'">
                            <option value="pending" '.($row->status=='pending'?'selected':'').'>Pending</option>
                            <option value="in-progress" '.($row->status=='in-progress'?'selected':'').'>In Progress</option>
                            <option value="completed" '.($row->status=='completed'?'selected':'').'>Completed</option>
                        </select>

                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.modules.Enquiry.list');
    }

    // Store (AJAX)
    public function store(Request $request)
    {
        $this->enquiryService->store($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Enquiry submitted successfully'
        ]);
    }

    public function show($id)
    {
        $enquiry = Enquiry::with('product')->findOrFail($id);
        return response()->json($enquiry);
    }

    // Update Status (Admin use)
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,in-progress,completed'
        ]);

        $enquiry = $this->enquiryService->updateStatus($id, $request->status);

        return response()->json([
            'status' => true,
            'message' => 'Status updated',
            'data' => $enquiry
        ]);
    }
}
