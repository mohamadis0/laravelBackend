<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderLine;
use App\Models\Payment;
use App\Models\Product;
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
        $products = Product::where('feature','product')->get();
        $addons= Product::where('feature','add-on')->get();
        return view('dashboard.order.create',compact('products','addons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product'=>'required|exists:products,id',
            'quantity'=>'required',
        ]);
        $user_id = auth()->user()->id;
        $available_order = Order::where('client_id', $user_id)
        ->where('status', 'draft')
        ->latest('id')
        ->first();
        $product_id = $request->input('product');
            $quantity = $request->input('quantity');
        if($available_order){
            $available_order->products()->attach($product_id, ['quantity' => $quantity]);
            return redirect()->route('order.index')->with('message','product added to order');
        }
           $order =  Order::create([
                'status'=>'draft',
                'ordered_date'=>'2023-08-23',
                'client_id'=>$user_id,
                'payment_id'=>11,
                'coupon_id'=>1,
               ]);
               $order->save();
               $order->products()->attach($product_id, ['quantity' => $quantity]);
            return redirect()->route('order.index')->with('message','product added to order');

        
        
       
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
