<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class TowelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $categories=Category::all();
        return view('admin.towels.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'towel_name' => 'required',
            'mainImage' => 'required'
        ]);
        $product=new Product();
        $product->name=$request->towel_name;
        $product->image=$request->mainImage;
        $product->save();
        $categories=Category::all();
        foreach ($categories as $category){
            $cat='cat'.$category->id;
            if ($request->$cat=='on'){
                $categoriesArray[]=$category->id;
            }
        }
        if (isset($categoriesArray)) $product->categories()->sync($categoriesArray);
        $pm='حوله با موفقیت اضافه شد';
        $products=Product::all();
        $categories=Category::all();

        return view('admin.towels.index',compact('pm','categories','products'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Product::all();
        $categories=Category::all();
        $selectedtowel=Product::find($id);
        return view('admin.towels.edit',compact('products','categories','selectedtowel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'towel_name' => 'required',
            'mainImage' => 'required'
        ]);
        $product=Product::find($id);
        $product->name=$request->towel_name;
        $product->image=$request->mainImage;
        $product->save();
        $categories=Category::all();
        foreach ($categories as $category){
            $cat='cat'.$category->id;
            if ($request->$cat=='on'){
                $categoriesArray[]=$category->id;
            }
        }
        if (isset($categoriesArray)) $product->categories()->sync($categoriesArray);
        $pm='حوله با موفقیت ویرایش شد';
        $products=Product::all();
        $categories=Category::all();

        return view('admin.towels.index',compact('pm','categories','products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return back();
    }
}
