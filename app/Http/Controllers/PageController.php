<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Policy;

class PageController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function admin()
    {
        return view('backend.index' , ['page' => 'orders']);
    }

    public function order($price)
    {
        $session = "";
        $order = "";
        $policy = "";
        // echo session('order_session')->count();
        if (session()->has('order_session') ) {
            $session = true;
            $order = Order::where('order_session' , session('order_session'))->first();
            $policy = Policy::where('order_id' , $order->id)->first();
        }else{
            $session = false;
        }
        // dd($session);
        return view('frontend.order' , ['session' => $session , 'order' => $order , 'policy' => $policy , 'price' => $price]);
    }
}
