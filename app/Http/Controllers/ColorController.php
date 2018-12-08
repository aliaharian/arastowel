<?php

namespace App\Http\Controllers;

use App\Color;
use foo\bar;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors=Color::simplePaginate(10);
        return view('admin.colors.index',compact('colors'));
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
            'color_name' => 'required',
            'color_english_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);

        $colors=new Color();
        $colors->name=$request->color_name;
        $colors->english_name=$request->color_english_name;
        $colors->image=$request->mainImage;
        $colors->save();
        $pm='رنگ با موفقیت اضافه شد';
        $colors=Color::simplePaginate(10);


        return view('admin.colors.index',compact('pm','colors'));
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
        $selectedcolor=Color::find($id);
        $colors=Color::simplePaginate(10);
        return view('admin.colors.edit',compact('selectedcolor','colors'));

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
            'color_name' => 'required',
            'color_english_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u'
        ]);

        $colors=Color::find($id);
        $colors->name=$request->color_name;
        $colors->english_name=$request->color_english_name;
        $colors->image=$request->mainImage;
        $colors->save();
        $pm='رنگ با موفقیت ویرایش شد';
        $colors=Color::simplePaginate(10);
        return view('admin.colors.index',compact('pm','colors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Color::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $colors = Color::where('name', 'LIKE', '%'.$search.'%')->simplePaginate(10);
        return view('admin.colors.index', compact('colors'));
    }
}

