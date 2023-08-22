<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('coupon.index',['data'=>Coupon::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required', 
            'expire_date' => 'required',
            'discount' => 'required',
            'activation_date' => 'required',
        ]);

      
       Coupon::create($validatedData);

        return redirect()->route('coupon.index')->with('success', 'Data saved successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        return view('coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validatedData = $request->validate([
            'code' => 'required', 
            'expire_date' => 'required',
            'discount' => 'required',
            'activation_date' => 'required',
        ]);

      $input=$request->all();
       $coupon->update($input);

        return redirect()->route('coupon.index')->with('success', 'Data saved successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $record = Coupon::find($coupon->id);

        if (!$record) {
            return redirect()->back()->with('error', 'Coupon not found.');
        }

        
        $record->delete();

        return redirect()->route('coupon.index')->with('success', 'Coupon deleted successfully.');
    }
}
