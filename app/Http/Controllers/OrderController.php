<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Exception;
use App\Policy;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 

    public function index()
    {
        $orders = Order::where('created_at' , 'DESC')->get();
        
        return view('backend.index' , ['page' => 'orders' , 'orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function policy(Request $request)
    {
        $policy = Policy::create([
            'signature' => $request->signature,
            'date' => $request->date,
            'order_id' => $request->order_id,
        ]);

        
        if($policy){
            $export['success'] = true;
            $order = Order::find($request->order_id);
            $order->order_status = 2;
            $order->save();
        }else{
            $export['success'] = false;
        }

        return response()->json($export);
    }

    public function store(Request $request)
    {

        try {
            
            $str = Str::random(16);
            session('order_session');
            session()->put('order_session' , $str);

            $order = Order::create([
                'order_session' => session('order_session'),
                'zipcode' => $request->zipcode,
                'style' => $request->style,
            ]);
            if(!$order){
                throw new Exception("Can not create order , Please try again !!");   
            }
            $order->order_status = 1;
            if(!$order->save()){
                throw new Exception("Can not save order , Please try again !!");   
            }
            $export['success'] = true;
        } catch (Exception $e) {
           $export['success'] = false;
           $export['msg'] = $e->getMessage();
        }
       



       return response()->json($export);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        try {
            
            if($order->order_status == 1){
                $order->fullname = $request->fullname;
                $order->address = $request->address;
                $order->phone = $request->phone;
                if(!$order->save()){
                    throw new Exception("Can not save order , Please try again !!");   
                }
            }else if($order->order_status == 2){
                if($request->hasFile('bill')){
                    $image = Storage::putFile('public/images', $request->file('bill'));
                    $order->bill = basename($image);
                    $order->order_status = 3;
                }
                if(!$order->save()){
                    throw new Exception("Can not upload bill , Please try again !!");   
                }
            }


            $export['success'] = true;
        } catch (Exception $e) {
            $export['success'] = false;
            $export['msg'] = $e->getMessage();
        }
        return response()->json($export);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
