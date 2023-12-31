<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.payment.index')
                ->with('data',Payment::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.payment.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'method'=>'required',
        ]);
        $old = Payment::where('method',$request->method)->get();
        if($old->isEmpty()){
            Payment::create([
                'method'=>$request->method,
            ]);
            return  redirect()->route('payment.index')->with('message','Added Successfully');
        }
        else{
            return redirect()->route('payment.index')->with('message','Already Added');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        if($payment){
            $payment->delete();
            return redirect()->route('payment.index')->with('message','Delelted Successfully');
        }else{
            return redirect()->route('payment.index')->with('error','An Error Occured');
        }
    }
}
