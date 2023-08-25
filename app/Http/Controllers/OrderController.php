<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderLine;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductAddon;
use App\Models\ProductProductAddon;
use App\Models\ProductProductRemove;
use App\Models\ProductRemove;
use App\Models\ProductRemoves;
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
    

    public function create( $product_id )
    {

        $product = Product::find($product_id);
    
        return view('dashboard.order.create',compact('product'));
        // dd($addons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|exists:products,id',
            'quantity' => 'required',
            'add' => 'array',
            'remove'=>'array'
        ]);
    
        $user_id = auth()->user()->id;
        $productId = $request->input('product');
        $quantity = $request->input('quantity');
        $addons = $request->input('add', []);
        $removes = $request->input('remove',[]);
    
        $available_order = Order::where('client_id', $user_id)
            ->where('status', 'draft')
            ->latest('id')
            ->first();
    
        if (!$available_order) {
            $available_order = Order::create([
                'status' => 'draft',
                'ordered_date' => '2023-08-23',
                'client_id' => $user_id,
                'payment_id' => 2,
                'coupon_id' => 1,
            ]);
        }
        $old_product = OrderLine::where('product_id',$productId)->first();
        // if(!$old_product){
            $orderLine = OrderLine::create([
                'order_id' => $available_order->id,
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
            $orderLine->products()->attach(['product_id'=>$productId],['order_line_id'=>$orderLine->id]);
        
            
    
            foreach ($addons as $product_id) {
                $product_addon = ProductAddon::create([
                    'order_line_id' => $orderLine->id,
                ]);
                ProductProductAddon::create([
                    'product_id'=>$product_id,
                    'product_addon_id'=>$product_addon->id,
                ]);
            }
            foreach ($removes as $product_id) {
                $product_remove = ProductRemove::create([
                    'order_line_id' => $orderLine->id,
                ]);
                ProductProductRemove::create([
                    'product_id'=>$product_id,
                    'product_remove_id'=>$product_remove->id,
                ]);
            }

        
            return redirect()->route('order.index')->with('message', 'product added to order');
        // }

        // return redirect()->route('order.index')->with('message', 'aleready added');
    
        
    
        
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
    $products = $order->products;
    $orderlines = OrderLine::where('order_id',$order->id)->get();
    
    // foreach($orderlines as $orderline){
    //     $addons = $orderline->product_addons;
    //     foreach($addons as $addon){
    //         $products = $addon->products;
    //         foreach($products as $product){
    //             echo $product->name;
    //         }
    //     }
    // }
return view('dashboard.order.products',compact('orderlines','order','products'));
    
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
    public function updateStatus(Order $order)
    {
        $order->status = 'order';
        $order->save();
        return redirect()->route('order.index')->with('message','Ordered');
    }
}
