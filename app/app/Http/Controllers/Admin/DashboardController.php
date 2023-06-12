<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalOrders = $this->totalOrders();
        $totalPriceAllOrders = $this->totalPriceAllOrders();
        $totalOrdersDestroy = $this->totalOrdersDestroy();
        $totalPriceAllOrdersDestroy = $this->totalPriceAllOrdersDestroy();

        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $lastMonth = Carbon::now()->subMonth()->format('m');

        $monthRevenue = $this->monthRevenue($month, $year);
        $lastMonthRevenue = $this->monthRevenue($lastMonth, $year);

        $percentGrowth = $this->percentGrowth($monthRevenue, $lastMonthRevenue);


        return view('dashboard', compact([
            'totalOrders',
            'totalPriceAllOrders',
            'totalOrdersDestroy',
            'totalPriceAllOrdersDestroy',
            'percentGrowth'
        ]));
    }

    private function totalOrders()
    {
        return Order::where('status', '1')->whereDate('created_at', Carbon::today())->count();
    }

    private function totalPriceAllOrders()
    {
        return DB::table('orders')
            ->select(DB::raw('SUM(total_price) as total'))
            ->where('status', '1')
            ->whereDate('created_at', Carbon::today())
            ->get();
    }

    private function totalOrdersDestroy()
    {
        return Order::where('status', '2')
            ->whereDate('created_at', Carbon::today())
            ->count();
    }

    private function totalPriceAllOrdersDestroy()
    {
        return DB::table('orders')
            ->select(DB::raw('SUM(total_price) as total'))
            ->where('status', '2')
            ->whereDate('created_at', Carbon::today())
            ->get();
    }

    private function monthRevenue($month, $year)
    {
        return DB::table('orders')
            ->select(DB::raw('SUM(total_price) as total'))
            ->where('status', '1')
            ->whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get();
    }

    private function percentGrowth($monthRevenue, $lastMonthRevenue)
    {
        $percentGrowth = 0;
//        Công thức tính phần trăm tăng trưởng là: % tăng trưởng = (năm cần tính - năm trước)/năm trước*100
        if ($lastMonthRevenue[0]->total !== null) {
            $percentGrowth = ($monthRevenue[0]->total - $lastMonthRevenue[0]->total) / $lastMonthRevenue[0]->total * 100;
        }

        return $percentGrowth;
    }
}
