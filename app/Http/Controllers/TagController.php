<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags=Tag::all();
        return view('tags.index',compact('tags'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
             'image'=>'|image|mimes:jpeg,png,svg|max:2048',
        ]);
        
        $input = $request->except('image');
        $tag = Tag::create($input);
        $input=$request->all();
     
        if($image=$request->file('image')){
            $destinationPath='images/';
            $productImage='tag_'.$tag->id.'_'.date('YmdHis').".".$image->getClientOriginalExtension();
            $image->move($destinationPath,$productImage);
            $tag->image = $productImage;
            $tag->save();
        }
       
       return redirect()->route("tags.index")->with('success',"Tag added successfuly");
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $input=$request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $productImage ='product_' . $tag->id . '_'. date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $input['image'] = $productImage;
        } else {
            unset($input['image']);
        }
        $tag->update($input);
       return redirect()->route("tags.index")->with('success',"Tag updated successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        
        return redirect()->route("tags.index")->with('success',"tag deleted successfuly");
    }
}
