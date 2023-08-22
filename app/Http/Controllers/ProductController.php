<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $products=Product::where('feature','product')->get();
       
        return view('products.index',compact('products'));


     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {$addons=Product::where('feature','add-on')->get()->pluck('name','id');
    $remove=Product::where('feature','remove')->get()->pluck('name','id');
     $categories=Category::pluck('name','id');
     $tags=Tag::pluck('name','id');
     
     return view('products.create',compact('categories','tags','remove','addons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,png,svg|max:2048',
            'quantity'=>'required',
            'feature'=>'required',
            'category_id'=>'required',
            'tags' => 'array',
             'remove'=>'array',
             'add'=>'array',
        ]);
        $input=$request->all();
        $combinedRelatedProducts = array_merge(
            $request->input('add', []),
            $request->input('remove', [])
          );
        if($image=$request->file('image')){
            $destinationPath='images/';
            $productImage=date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$productImage);
            $input['image']="$productImage";
        }
       $product=Product::create($input);
        
    if ($request->has('tags')) {
        $tags = $request->input('tags');
       
        // Attach the selected tags to the product
       
        $product->tags()->attach($tags); 
    }
    if ( $combinedRelatedProducts) {
        $product->relatedProducts()->attach($combinedRelatedProducts);
    }

   

        return redirect()->route("products.index")->with('success',"Product added successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   $addons=Product::where('feature','add-on')->get()->pluck('name','id');
        $remove=Product::where('feature','remove')->get()->pluck('name','id');
        $tags=Tag::pluck('name','id');
         $categories=Category::pluck('name','id');
        return view('products.edit',compact('product','categories','tags','addons','remove'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'quantity' => 'required',
            'feature' => 'required',
            'tags' => 'array',
            'add' => 'array',
            'remove' => 'array',
        ]);
    
        $input = $request->except('tags','add','remove'); // Exclude tags from the update input
        $combinedRelatedProducts = array_merge(
            $request->input('add', []),
            $request->input('remove', [])
          );
      
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = $productImage;
        } else {
            unset($input['image']);
        }
    
        $product->update($input);
    
        if ($request->has('tags')) {
            $tags = $request->input('tags');
           
            // Sync the selected tags to the product
           
            $product->tags()->sync($tags); 
        } else {
            // If no tags are provided, detach all tags from the product
            $product->tags()->detach();
        }
        if ( $combinedRelatedProducts) {
            $product->relatedProducts()->sync($combinedRelatedProducts);
        }
        else{
            $product->relatedProducts()->detach();
        }
        
    
        return redirect()->route("products.index")->with('success', "Product updated successfully");
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->route("products.index")->with('success',"Product deleted successfuly");
    }
}
