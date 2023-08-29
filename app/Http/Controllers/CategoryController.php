<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('category.index',['data'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required', 
            'Icon' => 'required',
        ]);

        $input = $request->except('Icon');
        $category = Category::create($input);

        if($image=$request->file('Icon')){
            
            $destinationPath='images/';
            $productImage='category_'.$category->id.'_'.date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$productImage);
            $category->Icon = $productImage;
            $category->save();
              
        }

        return redirect()->route('category.index')->with('success', 'Data saved successfully');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $input=$request->all();
        // dd($input);
        $image=$request->file('Icon');
        // dd($image);
        if($image=$request->file('Icon')){
            // dd($image);
            $destinationPath='images/';
            $productImage='category_'.$category->id.'_'.date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$productImage);
            $input['Icon']="$productImage";
        }else {
            unset($input['Icon']);
        }

    //   dd($input);
       $category->update($input);

        return redirect()->route('category.index')->with('success', 'Data saved successfully');
    
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $record = Category::find($category->id);

        if (!$record) {
            return redirect()->back()->with('error', 'Category not found.');
        }

        
        $record->delete();

        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    
    }
}
