<?php

namespace App\Http\Controllers;

use App\brand_page;
use App\Off;
use App\Product;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {

       return view('admin.index');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function rozatowel()
    {
        $roza=brand_page::where('page','roza')->get();
        return view('admin.rozatowel',compact('roza'));
    }

    public function rozatowelEdit(Request $request)
    {
        $roza_id=brand_page::where('page','roza')->where('position','main_image')->value('id');
        $roza=brand_page::find($roza_id);
        $roza->upper_text=$request->main_image_upper_text;
        $roza->lower_text=$request->main_image_lower_text;
        $roza->image=$request->main_image_link;
        $roza->save();
        for ($i=1;$i<12;$i++) {
            $image='img_'.$i.'_link';
            $upper_text='img_'.$i.'_upper_text';
            $lower_text='img_'.$i.'_lower_text';
            $link='img_'.$i.'_link_text';
            $roza_id = brand_page::where('page', 'roza')->where('position', 'img_'.$i)->value('id');
            $roza = brand_page::find($roza_id);
            $roza->upper_text = $request->$upper_text;
            $roza->lower_text = $request->$lower_text;
            $roza->image = $request->$image;
            $roza->link = $request->$link;
            $roza->save();
        }

        $roza_id=brand_page::where('page','roza')->where('position','contact_us')->value('id');
        $roza=brand_page::find($roza_id);
        $roza->upper_text=$request->contact_us_upper_text;
        $roza->save();

        $roza_id=brand_page::where('page','roza')->where('position','about_main')->value('id');
        $roza=brand_page::find($roza_id);
        $roza->upper_text=$request->about_main_upper_text;
        $roza->lower_text=$request->about_main_lower_text;
        $roza->save();


        for ($i=1;$i<4;$i++) {
            $image='about_'.$i.'_link';
            $upper_text='about_'.$i.'_upper_text';
            $lower_text='about_'.$i.'_lower_text';
            $roza_id = brand_page::where('page', 'roza')->where('position', 'about_'.$i)->value('id');
            $roza = brand_page::find($roza_id);
            $roza->upper_text = $request->$upper_text;
            $roza->lower_text = $request->$lower_text;
            $roza->image = $request->$image;
            $roza->link = $request->$link;
            $roza->save();
        }



        return back();
    }

    public function anargoltowel()
    {
        $anargol=brand_page::where('page','anargol')->get();
        return view('admin.anargoltowel',compact('anargol'));
    }

    public function anargoltowelEdit(Request $request)
    {
        for ($i=1;$i<9;$i++) {
            $image='img_'.$i.'_link';
            $upper_text='img_'.$i.'_upper_text';
            $roza_id = brand_page::where('page', 'anargol')->where('position', 'img_'.$i)->value('id');
            $roza = brand_page::find($roza_id);
            $roza->upper_text = $request->$upper_text;
            $roza->image = $request->$image;
            $roza->save();
        }
        return back();

    }

    public function special()
    {
        $products=Product::all();
        $hasSpecial=Off::where('special',1)->count();
        return view('admin.special',compact('products','hasSpecial'));
    }

    public function specialStore(Request $request)
    {
        $off_id=Off::where('product_id',$request->product)->value('id');
        $off=Off::find($off_id);
        $off->special=1;
        $off->image=$request->mainImage;
        $off->text=$request->text;
        $off->save();
        return back();
    }

    public function specialDestroy($special)
    {
        $off_id=Off::where('product_id',$special)->value('id');

        $off=Off::find($off_id);
        $off->special=0;
        $off->save();
        return back();
    }

//    public function createGiftCard()
//    {
//        $seed = str_split('abcdefghijklmnopqrstuvwxyz'
//            .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
//            .'0123456789'); // and any other characters
//        shuffle($seed); // probably optional since array_is randomized; this may be redundant
//        $rand = '';
//        foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
//    }
}