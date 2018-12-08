<?php

namespace App\Http\Controllers;

use App\blog;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=blog::simplePaginate(9);
        return view('admin.blog.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        return view('admin.blog.add-blog',compact('tags'));
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
            'title' => 'required',
        ]);
        $blog=new blog();
        $blog->title=$request->title;
        $blog->content=$request->ckeditor;
        $blog->image=$request->mainImage;
        $blog->user_id=Auth::user()->id;
        if (isset($request->draft)){
            $blog->published=0;
        }
        else{
            $blog->published=1;
            $blog->persian_date=jdate()->format('%d %B %Y');
        }
        $blog->save();
        $tags=Tag::all();
        foreach ($tags as $tag){
            $t='tag'.$tag->id;
            if ($request->$t=='on'){
                $tagsArray[]=$tag->id;
            }
        }
        if (isset($tagsArray)) $blog->tags()->sync($tagsArray);

        $pm='مطلب شما با موفقیت ذخیره شد';
        return view('admin.blog.add-blog',compact('tags','pm'));

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
        $blog=blog::find($id);
        $tags=Tag::all();
        return view('admin.blog.edit-blog',compact('blog','tags'));
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
            'title' => 'required',
        ]);
        $blog=blog::find($id);
        $blog->title=$request->title;
        $blog->content=$request->ckeditor;
        $blog->image=$request->mainImage;
        $blog->user_id=Auth::user()->id;
        if (isset($request->draft)){
            $blog->published=0;
        }
        else{
            $blog->published=1;
            $blog->persian_date=jdate()->format('%d %B %Y');
        }
        $blog->save();
        $tags=Tag::all();
        foreach ($tags as $tag){
            $t='tag'.$tag->id;
            if ($request->$t=='on'){
                $tagsArray[]=$tag->id;
            }
        }
        if (isset($tagsArray)) $blog->tags()->sync($tagsArray);

        $pm='مطلب شما با موفقیت ذخیره شد';
        return view('admin.blog.edit-blog',compact('tags','pm','blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blog::find($id)->delete();
//        $articles=DB::table('articles')->get();
        return back();
    }

    public function type(Request $request)
    {
        $type = $request->type;
        $posts = blog::where('published', 'LIKE', $type)->simplePaginate(10);
        return view('admin.blog.index', compact('posts'));

    }

    public function search(Request $request)
    {
        $search = $request->search;
        $posts = blog::where('title', 'LIKE', '%'.$search.'%')->simplePaginate(10);
        return view('admin.blog.index', compact('posts'));
    }
}
