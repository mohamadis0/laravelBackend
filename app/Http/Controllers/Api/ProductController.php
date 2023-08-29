<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;




class ProductController extends Controller
{
    public function index()
    {

        $products=Product::all();
        return response()->json([
            'success'=>true,
            'message'=>'all products',
            'data'=>$products,
        ]);
    }
    public function show($id)
    {
        $product=Product::find($id);
        
        if(is_null($product)){
            return response()->json([
                'success'=>false,
                'message'=>'failed to fetch product',
                
            ]);
        }
        return response()->json([
            'success'=>true,
            'message'=>'product fetched success',
            'data'=>$product,
            
        ]);
    }
   

}
