<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
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
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'country_region'=>'required',
            'adress'=>'required',
            'town_city'=>'required',
            'state'=>'required',
            'zip_code'=>'required',
            'phone'=>'required',
            'email'=>'required',

        ]);
        $user_id = auth()->user()->id;
        // $client_id =User::where('id',$user_id)->client()->id;
        $latestDraftOrder = Order::where('client_id', $user_id)
                            ->where('status', 'draft')
                            ->latest('id')
                            ->first();
        if ($latestDraftOrder) {
        OrderDetails::create([
            'fname'=>$request->input('fname'),
            'lname'=>$request->input('lname'),
            'company_name'=>$request->input('company_name'),
            'country_region'=>$request->input('country_region'),
            'adress'=>$request->input('adress'),
            'town_city'=>$request->input('town_city'),
            'state'=>$request->input('state'),
            'zip_code'=>$request->input('zip_code'),
            'phone'=>$request->input('phone'),
            'email'=>$request->input('email'),
            'notes'=>$request->input('notes'),
            'order_id'=>$latestDraftOrder->id,
        ]);
        dd($request);
    }
        else{
            print_r('No draft order');
        }
        // $user_id = auth()->user()->id;
        // $order_id = Order::where('client_id', $user_id)->latest('id')->value('id');
        // print_r($order_id);
    }

    /**
     * Display the specified resource.
     */
    public function show($order_id)
    {

        $orderDetails = OrderDetails::where('order_id', $order_id)->get();
        dd($orderDetails);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($orderDetailId)
    {
        $user_id = auth()->user()->id;

        // Retrieve the latest draft order for the authenticated user
        $latestDraftOrder = Order::where('client_id', $user_id)
            ->where('status', 'draft')
            ->latest('id')
            ->first();
    
        if ($latestDraftOrder) {
            // Retrieve the specific OrderDetail based on order_id and user input
            $orderDetail = OrderDetails::where('order_id', $latestDraftOrder->id)
                ->findOrFail($orderDetailId);
    
            return view('dashboard.order.addOrder', compact('orderDetail'));
        } else {
            return back()->withErrors('No draft order');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$orderDetailId)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'country_region' => 'required',
            'adress' => 'required',
            'town_city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
    
        // Retrieve the authenticated user's ID
        $user_id = auth()->user()->id;
    
        // Retrieve the latest draft order for the authenticated user
        $latestDraftOrder = Order::where('client_id', $user_id)
            ->where('status', 'draft')
            ->latest('id')
            ->first();
    
        if ($latestDraftOrder) {
            // Update the existing OrderDetail based on order_id and user input
            $orderDetail = OrderDetails::where('order_id', $latestDraftOrder->id)
                ->findOrFail($orderDetailId);
    
            $orderDetail->update([
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'company_name' => $request->input('company_name'),
                'country_region' => $request->input('country_region'),
                'adress' => $request->input('adress'),
                'town_city' => $request->input('town_city'),
                'state' => $request->input('state'),
                'zip_code' => $request->input('zip_code'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'notes' => $request->input('notes'),
            ]);
    
            print_r('Updated Successfully'); 
        } else {
            print_r('No Order To Updated It'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderDetails $orderDetails)
    {
        //
    }
}
