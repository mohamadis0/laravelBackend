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
    public function index(Request $request)
    {
        $filter = $request->input('filter');
    
        $query = Product::query();
    
        if ($filter) {
            $query->where('feature', $filter);
        }
    
        $products = $query->get();
    
        return view('products.index', compact('products'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    
    {
    
     $categories=Category::pluck('name','id');
      $addons=Product::where('feature','ingredient')->get()->pluck('name','id');
    
     $tags=Tag::pluck('name','id');
     $ingredients=Product::where('feature','ingredient')->get()->pluck('name','id');
     return view('products.create',compact('categories','tags','addons','ingredients'));

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
            'add'=>'array',
            'ingredient' => 'array',
            'ingredient_removable' => 'array',
            'ingredient_removable.*' => 'boolean',
        ]);
       
        $input = $request->except('image');
       
        $product = Product::create($input);
    
        if($image=$request->file('image')){
            $destinationPath='images/';
            $productImage='product_'.$product->id.'_'.date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$productImage);
            $product->image = $productImage;
            $product->save();
        }
        if($product->feature=='product'){
            if ($request->has('tags')) {
                $tags = $request->input('tags');
               
                // Attach the selected tags to the product
               
                $product->tags()->attach($tags); 
            }
            if ($add=$request->input('add')) {
                $product->addons()->attach($add);
            }
            
            if ($request->has('ingredient')) {
                $ingredients = $request->input('ingredient');
                $ingredientRemovable = $request->input('ingredient_removable', []);
            
                foreach ($ingredients as $ingredientId => $value) {
                    // Check if the ingredient ID exists and is removable
                    if (isset($ingredientRemovable[$ingredientId])) {
                        $removable = $ingredientRemovable[$ingredientId] == 1;
                    } else {
                        $removable = false;
                    }
            
                    // Attach the ingredient to the product and store the "removability" status
                    $product->ingredients()->attach($ingredientId, ['removable' => $removable]);
                }
            }
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
    {    
        $categories=Category::pluck('name','id');
        $addons=Product::where('feature','ingredient')->get()->pluck('name','id');
      
       $tags=Tag::pluck('name','id');
       $ingredients=Product::where('feature','ingredient')->get()->pluck('name','id');
    //   dd($ingredients);
        return view('products.edit',compact('product','categories','tags','ingredients','addons'));
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
        ]);
    
        // Prepare the input data, excluding 'tags', 'add', and 'remove' fields
        $input = $request->except('tags', 'add', 'remove');
    
        // Handle the uploaded image, if provided
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $productImage ='product_' . $product->id . '_'. date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = $productImage;
        } else {
            unset($input['image']);
        }
    
        // Update the product with the new input data
        $product->update($input);
    
        // Sync or detach tags based on the provided input
        if ($request->has('tags')) {
            $tags = $request->input('tags');
            $product->tags()->sync($tags);
        } else {
            $product->tags()->detach();
        }
    
        // Sync or detach addons based on the provided input
        if ($add = $request->input('add')) {
            $product->addons()->sync($add);
        } else {
            $product->addons()->detach();
        }
    
        $ingredients = $request->input('ingredient', []);
        $ingredientRemovable = $request->input('ingredient_removable', []);
        
        // Get the list of ingredient IDs that are selected
        $selectedIngredientIds = array_keys($ingredients);
        
        // Get the list of ingredient IDs associated with the product
        $currentIngredientIds = $product->ingredients->pluck('id')->toArray();
        
        // Detach ingredients that are associated with the product but not selected
        $ingredientsToDetach = array_diff($currentIngredientIds, $selectedIngredientIds);
        $product->ingredients()->detach($ingredientsToDetach);
        
        foreach ($ingredients as $ingredientId => $value) {
            // Check if the ingredient ID exists and is removable
            if (isset($ingredientRemovable[$ingredientId]) && $ingredientRemovable[$ingredientId] == 1) {
                $removable = true;
            } else {
                $removable = false;
            }
        
            // Attach the ingredient to the product and store the "removability" status
            $product->ingredients()->syncWithoutDetaching([$ingredientId => ['removable' => $removable]]);
        }
        
    
        // Return a redirect response with a success message
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

    public function getAddons($productId)
{
    $product = Product::find($productId);
    $addons = $product->addons;
    
    return response()->json($addons);
}
}
