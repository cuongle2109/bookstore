<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class StatisticController extends Controller
{
    protected $statisticThisMonth = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function statisticThisMonth()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $daysInMonth = Carbon::now()->daysInMonth;

        $orders = Order::whereBetween('created_at', [$start, $end])->where('status', '1')->get();

        for ($i = 0; $i <= $daysInMonth; $i++) {
            $this->statisticThisMonth[$i] = 0;
            $this->calculatorTotalPriceOrders($orders, $i);
        }

        return Response::json(array('daysInMonth' => $daysInMonth, 'data' => $this->statisticThisMonth));
    }

    private function calculatorTotalPriceOrders($orders, $i)
    {
        foreach ($orders as $order) {

            $year = $order->created_at->format('Y');
            $month = $order->created_at->format('m');
            $day = $order->created_at->format('d');

            if ($year === Carbon::now()->format('Y') &&
                $month === Carbon::now()->format('m') &&
                $day == $i
            ) {
                $this->statisticThisMonth[$i] = $this->statisticThisMonth[$i] + $order->total_price;
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function productTopThisMonth()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $data = DB::table('orders')
            ->select(DB::raw('products.name, sum(order_details.quantity) as total_quantity'))
            ->whereBetween('order_details.created_at', [$start, $end])
            ->where('status', '1')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->groupBy('product_id')
            ->orderBy('total_quantity', 'desc')
            ->limit(10)
            ->get();

        return Response::json($data);
    }
}
