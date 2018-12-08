<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=Tag::simplePaginate(10);
        return view('admin.tags.index',compact('tags'));
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
            'tag_name' => 'required',
        ]);

        $tags=new Tag();
        $tags->tag_name=$request->tag_name;
        $tags->save();
        $pm='تگ با موفقیت اضافه شد';
        $tags=Tag::simplePaginate(10);


        return view('admin.tags.index',compact('pm','tags'));
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
        $selectedtag=Tag::find($id);
        $tags=Tag::simplePaginate(10);
        return view('admin.tags.edit',compact('selectedtag','tags'));
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
            'tag_name' => 'required',
        ]);

        $tags=Tag::find($id);
        $tags->tag_name=$request->tag_name;
        $tags->save();
        $pm='تگ با موفقیت ویرایش شد';
        $tags=Tag::simplePaginate(10);
        return view('admin.tags.index',compact('pm','tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::find($id)->delete();
        return back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $tags = Tag::where('tag_name', 'LIKE', '%'.$search.'%')->simplePaginate(10);
        return view('admin.tags.index', compact('tags'));
    }
}
