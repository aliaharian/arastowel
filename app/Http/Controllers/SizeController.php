<?php

namespace App\Http\Controllers;

use App\size;
use foo\bar;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes=size::simplePaginate(10);
        return view('admin.sizes.index',compact('sizes'));
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
            'size_name' => 'required',
            'size_english_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);

        $sizes=new size();
        $sizes->name=$request->size_name;
        $sizes->english_name=$request->size_english_name;
        $sizes->image=$request->mainImage;
        $sizes->save();
        $pm='سایز با موفقیت اضافه شد';
        $sizes=size::simplePaginate(10);


        return view('admin.sizes.index',compact('pm','sizes'));
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
        $selectedsize=size::find($id);
        $sizes=size::simplePaginate(10);
        return view('admin.sizes.edit',compact('selectedsize','sizes'));

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
            'size_name' => 'required',
            'size_english_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);

        $sizes=size::find($id);
        $sizes->name=$request->size_name;
        $sizes->english_name=$request->size_english_name;
        $sizes->image=$request->mainImage;
        $sizes->save();
        $pm='رنگ با موفقیت ویرایش شد';
        $sizes=size::simplePaginate(10);
        return view('admin.sizes.index',compact('pm','sizes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        size::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $sizes = size::where('name', 'LIKE', '%'.$search.'%')->simplePaginate(10);
        return view('admin.sizes.index', compact('sizes'));
    }
}

