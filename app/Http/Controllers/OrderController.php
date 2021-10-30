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

    public function viewBooking($id)
    {
        $order = Order::find($id);
        $policy = Policy::where('order_id' , $id)->first();
        ob_start();
        ?>
            <div class="your-order">
                <h5 class="text-center"><strong>Booking details </strong></h5>
                <h6 class="text-center">Book ID #<?=$order->id?></h6>
                <hr>
                <div class="row">
                    <div class="col-12 col-md-7" style="font-size: 14px;">
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-inline">
                                    Fullname <span class="ml-auto">:</span>
                                </div>
                            </div>
                            <div class="col-8 text-left"><?=$order->fullname?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-inline">
                                    Address <span class="ml-auto">:</span>
                                </div>
                            </div>
                            <div class="col-8 text-left"><?=$order->address?> , zipcode <?=$order->zipcode?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-inline">
                                    Email <span class="ml-auto">:</span>
                                </div>
                            </div>
                            <div class="col-8 text-left"><?=$order->email?></div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <div class="form-inline">
                                    Phone <span class="ml-auto">:</span>
                                </div>
                            </div>
                            <div class="col-8 text-left"><?=$order->phone?></div>
                        </div>
                        <div class="book-style mt-3">
                            <div class="row mb-2">
                                <div class="col-6">
                                    <div class="form-inline">
                                    <small> Service type :</small> 
                                    </div>
                                </div>
                                <div class="col-6 text-left">
                                    <div class="form-inline">
                                        <small class="ml-auto"> Massage</small> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-7">
                                    <div class="form-inline">
                                    <small> Massage style :</small> 
                                    </div>
                                </div>
                                <div class="col-5 text-left">
                                    <div class="form-inline">
                                        <small class="ml-auto"> <?=$order->style?></small> 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-7">
                                    <div class="form-inline">
                                    <small> Appointment :</small> 
                                    </div>
                                </div>
                                <div class="col-5 text-left">
                                    <div class="form-inline">
                                        <small class="ml-auto"> 
                                            <?php
                                                $currentDateTime = $order->created_at;
                                                $newDateTime = date('h:i A', strtotime($currentDateTime));
                                            ?>
                                            <?=$newDateTime?>
                                        </small> 
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-12">
                                    <small>
                                        <?php if ($order->price == '119'){ ?>
                                            $ 119.00 Get expert service for <strong>60 minutes</strong> 
                                        <?php }elseif($order->price == '189'){ ?>
                                            $ 189.00 Get expert service for <strong>90 minutes</strong> 
                                        <?php }else { ?>
                                            $ 239.00 Get expert service for <strong>120 minutes</strong> 
                                        <?php } ?>
                                    </small>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5" >
                        <div class="rowjustify-content-center" style="font-size: 14px">
                            <div class="col-12 ">
                                <img src="<?=url('storage/images/'.$order->bill)?>" class="w-100" alt="">
                            </div>
                        </div>
                    <div class="row justify-content-center mt-4">
                    <div class="col-6 text-center">
                            <div class="policy-group">
                                <input type="text" style="font-size: 13px;" class="policy-input" name="signature" value="<?=$policy->signature?>"  readonly>
                                <input type="hidden" value="<?=$order->id?>" name="order_id">
                                <label for="">Clienr Signature</label>
                            </div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="policy-group">
                                <input type="text" style="font-size: 13px;" class="policy-input" name="date" value="<?=$policy->date?>" readonly>
                                <label for="">Date</label>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                
            </div>
        <?php
        $html = ob_get_contents();
        ob_clean();

        return response()->json($html);
    }

    public function updateBookingStatus($id , Request $request)
    {
        $order = Order::find($id);
        $order->order_status = $request->status;

        if($order->save()){
            $export['success'] = true;
        }else{
            $export['success'] = false;
        }

        return response()->json($export);
    }



    public function index()
    {
        $orders = Order::where('order_status' , '>=' , 3)->orderBy('created_at' , 'DESC')->get();
        // dd($orders);
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
                'price' => $request->price,
                'fullname' => $request->fullname,
                'email' => $request->email,
            ]);
            if(!$order){
                session()->forGet('order_session');
                throw new Exception("Can not create order , Please try again !!");   
            }
            $order->order_status = 1;
            if(!$order->save()){
                throw new Exception("Can not save order , Please try again !!");   
            }
            $export['success'] = true;
            $export['order_id'] = $order->id;
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
                
                if(!$order->save()){
                    throw new Exception("Can not save order , Please try again !!");   
                }
            }else if($order->order_status == 2){
                if($request->hasFile('bill')){
                    $image = Storage::putFile('public/images', $request->file('bill'));
                    $order->bill = basename($image);
                    $order->order_status = 3;
                    $order->address = $request->address;
                    $order->phone = $request->phone;
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
