<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.order.index')->with('orders',Order::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    

    public function create()
    {
        return view('dashboard.order.addOrder');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Order::create([
        'status'=>'draft',
        'order_date'=>'2023-08-23',
        'client_id'=>auth()->user()->id,
        'payment_id'=>Payment::where('name',$request->payment_method)->value('id'),
        'coupon_id'=>Coupon::where('code',$request->coupon_code)->value('id'),
       ]);
       return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {
        $order_details = OrderDetails::where('order_id',$order_id)->first();
        if (!$order_details) {
            return redirect()->route('orderDetails.index')->with('message','No Details For This Order');
        } 
        return view('dashboard.order.showOrderDetails')->with('orderDetails',$order_details);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($order_id)
    {
        $order = Order::find($order_id);
        if($order){
            $order->delete();

        }else{
            print_r("No product to delted");
        }
    }
}
