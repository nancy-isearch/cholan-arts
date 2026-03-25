<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Enquiry;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index()
    {
        $data['totalProducts'] = Product::count();
        $data['activeProducts'] = Product::where('status', 1)->count();
        $data['inactiveProducts'] = Product::where('status', 0)->count();

        $data['totalCategories'] = Category::count();
        $data['activeCategories'] = Category::where('is_active', 1)->count();
        $data['inactiveCategories'] = Category::where('is_active', 0)->count();

        $data['totalEnquiries'] = Enquiry::count();
        $data['pendingEnquiries'] = Enquiry::where('status', 'pending')->count();
        $data['completedEnquiries'] = Enquiry::where('status', 'completed')->count();

        return view('admin.modules.Dashboard.dashboard', $data);
    }

    public function getChartData(Request $request)
    {
        $type = $request->type;

        $labels = [];
        $data = [];

        // YEARLY (Month wise)
        if ($type == 'yearly') {
            for ($i = 1; $i <= 12; $i++) {
                $labels[] = Carbon::create()->month($i)->format('M');

                $data[] = Enquiry::whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', $i)
                    ->count();
            }
        }

        // MONTHLY (Date wise current month)
        elseif ($type == 'monthly') {
            $days = Carbon::now()->daysInMonth;

            for ($i = 1; $i <= $days; $i++) {
                $labels[] = $i;

                $data[] = Enquiry::whereYear('created_at', date('Y'))
                    ->whereMonth('created_at', date('m'))
                    ->whereDay('created_at', $i)
                    ->count();
            }
        }

        // WEEKLY (Last 7 days)
        elseif ($type == 'weekly') {
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);

                $labels[] = $date->format('D');

                $data[] = Enquiry::whereDate('created_at', $date->format('Y-m-d'))
                    ->count();
            }
        }

        // PARTICULAR MONTH
        elseif ($type == 'month') {
            $month = $request->month; // 1-12
            $year = date('Y');

            $days = Carbon::create()->month($month)->daysInMonth;

            for ($i = 1; $i <= $days; $i++) {
                $labels[] = $i;

                $data[] = Enquiry::whereYear('created_at', $year)
                    ->whereMonth('created_at', $month)
                    ->whereDay('created_at', $i)
                    ->count();
            }
        }

        // DATE RANGE
        elseif ($type == 'range') {
            $start = Carbon::parse($request->start_date);
            $end = Carbon::parse($request->end_date);

            while ($start <= $end) {
                $labels[] = $start->format('d M');

                $data[] = Enquiry::whereDate('created_at', $start->format('Y-m-d'))
                    ->count();

                $start->addDay();
            }
        }

        return response()->json([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    public function getEnquiryStats(Request $request)
    {
        $type = $request->type;

        if ($type == 'yearly') {
            $data = \DB::table('enquiries')
                ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->pluck('total', 'month');

            $labels = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

            $finalData = [];
            for ($i = 1; $i <= 12; $i++) {
                $finalData[] = $data[$i] ?? 0;
            }

            return response()->json([
                'labels' => $labels,
                'data' => $finalData
            ]);
        }

        if ($type == 'monthly') {

            $year = date('Y');
            $month = date('m');

            $daysInMonth = Carbon::create($year, $month)->daysInMonth;

            $data = \DB::table('enquiries')
                ->selectRaw('DAY(created_at) as day, COUNT(*) as total')
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->groupBy('day')
                ->pluck('total', 'day');

            $labels = [];
            $finalData = [];

            for ($i = 1; $i <= $daysInMonth; $i++) {
                $labels[] = $i;
                $finalData[] = $data[$i] ?? 0; // 👈 missing days = 0
            }

            return response()->json([
                'labels' => $labels,
                'data' => $finalData
            ]);
        }

        if ($type == 'range') {
            $from = Carbon::parse($request->from);
            $to = Carbon::parse($request->to);

            // DB data
            $data = \DB::table('enquiries')
                ->selectRaw('DATE(created_at) as date, COUNT(*) as total')
                ->whereBetween('created_at', [$from, $to])
                ->groupBy('date')
                ->pluck('total', 'date');

            // Generate full date range
            $period = CarbonPeriod::create($from, $to);

            $labels = [];
            $finalData = [];

            foreach ($period as $date) {
                $formatted = $date->format('Y-m-d');

                $labels[] = $formatted;

                // agar DB me data hai toh wo lo, warna 0
                $finalData[] = $data[$formatted] ?? 0;
            }

            return response()->json([
                'labels' => $labels,
                'data' => $finalData
            ]);
        }
    }

    

    public function getTopProducts(Request $request)
    {
        $type = $request->type; // weekly, monthly, yearly

        $query = Enquiry::query();

        // ✅ Filter logic
        if ($type == 'weekly') {
            $query->whereDate('created_at', '>=', Carbon::now()->subDays(7));
        } elseif ($type == 'monthly') {
            $query->whereMonth('created_at', Carbon::now()->month);
        } elseif ($type == 'yearly') {
            $query->whereYear('created_at', Carbon::now()->year);
        }

        $topProducts = $query->select('product_id', DB::raw('COUNT(*) as total_enquiries'))
            ->whereNotNull('product_id')
            ->groupBy('product_id')
            ->orderByDesc('total_enquiries')
            ->with(['product.categories']) // relationship needed
            ->take(5)
            ->get();

        return response()->json($topProducts);
    }
    
}
