<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function store(Request $request)
    {
        $result = false;

        if($request['paymentType'] == 1){
            $result = $this->checkout($request);
        }
        if ($request['paymentType'] == 2){

            if (Auth::check()) {
                return $this->vnpay($request);
            } else {
                return route('login');
            }
        }

        return $result;
    }

    public function return(Request $request)
    {
        if ($request->vnp_ResponseCode == "00") {

            $order = Order::find($request->vnp_TxnRef);
            $order->update(['status' => 1]);
            $order_detail = OrderDetail::with('product')->where('order_id', $order->id)->get();

            $details = [
                'title' => 'Mail from ItSolutionStuff.com',
                'body' => 'This is for testing email using smtp'
            ];

            Mail::to(Auth::user()->email)->send(new MyTestMail(['order' => $order,'order_detail' => $order_detail]));

            return redirect()->route('mypage.home.index')->with('cart-success', 'Đã thanh toán phí dịch vụ');
        }

        return redirect()->route('mypage.view-cart.index')->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }

    public function vnpay($request){

        $user = Auth::user();

        $totalPrice = 0;

        foreach ($request['cart'] as $item) {
            $totalPrice += $item['price']*$item['quantity'];
        }

        $order = Order::create([
            "total_price" => $totalPrice,
            "address" => $user->address,
            "phone" => $user->phone,
            "payment_type_id" => 1
        ]);

        foreach ($request['cart'] as $item) {
            OrderDetail::create([
                "price" => $item['price'],
                "quantity" => $item['quantity'],
                "order_id" => $order->id,
                "product_id" => $item['id']
            ]);
        }

        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
        $vnp_Amount = $order->total_price * 100; // total price
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $vnp_ExpireDate = $expire;
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => env('VNP_TMNCODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => "vn",
            "vnp_OrderInfo" => "Thanh toan mua sach qua cua hang", // noi dung thanh toan
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => env('VNP_RETURNURL'),
            "vnp_TxnRef" => $order->id, // ma don hang
            "vnp_ExpireDate" => $vnp_ExpireDate
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASHSECRET') !== null) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, env('VNP_HASHSECRET'));//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return $vnp_Url;
    }

    public function checkout($request){
        $totalPrice = 0;

        foreach ($request['cart'] as $item) {
            $totalPrice += $item['price']*$item['quantity'];
        }

        $order = Order::create([
            "total_price" => $totalPrice,
            "address" => $request['address'],
            "phone" => $request['phone'],
            "payment_type_id" => 1
        ]);

        foreach ($request['cart'] as $item) {
            OrderDetail::create([
                "price" => $item['price'],
                "quantity" => $item['quantity'],
                "order_id" => $order->id,
                "product_id" => $item['id']
            ]);
        }

        return true;
    }
}
