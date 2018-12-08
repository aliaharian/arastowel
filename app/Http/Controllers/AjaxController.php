<?php

namespace App\Http\Controllers;

use App\city;
use App\favorite;
use App\newsletter;
use App\Pre_order;
use App\Product;
use App\product_to_color;
use App\product_to_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;


class AjaxController extends Controller
{

    public function loadPrice(Request $request)
    {
        $selectedSize=$request->size;
        $product_id=$request->product_id;
        $product=Product::find($product_id);
        $sizes=product_to_size::all();
        return view('ajax.loadPrice',compact('selectedSize','sizes','product'));
    }

    public function showCart()
    {
        return view('ajax.addToCart');
    }

    public function addToCart(Request $request)
    {
        $selectedSize = $request->size;
        $selectedColor = $request->color;
        $product_id = $request->product_id;
        $qty = $request->qty;
        $user_ip = $request->ip();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();

        if (count(Pre_order::where('product_id',$product_id)->where('size_id',$selectedSize)->where('color_id',$selectedColor)->where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get())>0) {
            $existproductid=Pre_order::where('product_id',$product_id)->where('size_id',$selectedSize)->where('color_id',$selectedColor)->where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->value('id');
            $pre_order=Pre_order::find($existproductid);
            $pre_order->qty=$pre_order->qty+$qty;
            $pre_order->save();
        } else {
        $pre_order = new Pre_order();
            $pre_order->qty=$qty;
            $pre_order->product_id=$product_id;
            $pre_order->color_id=$selectedColor;
            $pre_order->size_id=$selectedSize;
            $pre_order->user_ip=$user_ip;
            $pre_order->user_platform=$user_platform;
            $pre_order->user_browser=$user_browser;


            ///////color image
            if (Product::find($product_id)->variable!=0){
                $image=product_to_color::where('product_id',$product_id)->where('color_id',$selectedColor)->value('image');
                if ($image!=''){
                    $pre_order->image=$image;
                }else{
                    $pre_order->image=Product::find($product_id)->image;
                }
            }
            else if (Product::find($product_id)->variable==0){
                $pre_order->image=Product::find($product_id)->image;
            }
            //////////////

            /////////size price
            if (Product::find($product_id)->variable==2){
                $pre_order->price=product_to_size::where('product_id',$product_id)->where('size_id',$selectedSize)->value('price');
                $pre_order->off_price = product_to_size::where('product_id', $product_id)->where('size_id', $selectedSize)->value('price');

            }
            else{
                $pre_order->price=Product::find($product_id)->price;
                $pre_order->off_price = Product::find($product_id)->price;

            }
            ///////////////


            ///////////////off percent

            if (Product::find($product_id)->off->count()>0) {
                foreach (Product::find($product_id)->off as $off) {
                    if (strtotime($off->start) < time() && strtotime($off->end) > time()) {
                        $pre_order->off_percent = $off->percent;
                        $percent = 100 - $off->percent;
                        if (Product::find($product_id)->variable == 2) {
                            $pre_order->off_price = product_to_size::where('product_id', $product_id)->where('size_id', $selectedSize)->value('price') * $percent / 100;
                        } else {
                            $pre_order->off_price = Product::find($product_id)->price * $percent / 100;
                        }
                    }
                }
            }
                ///////////////////
            $pre_order->save();
        }
        $pre_order=Pre_order::where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get();
        //return $pre_order;
        return view('ajax.addToCart',compact('pre_order'));
    }

    public function deleteFromCart(Request $request)
    {
        $user_ip = $request->ip();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        Pre_order::find($request->pre_order_id)->delete();
        $pre_order=Pre_order::where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get();
        //return $pre_order;
        return view('ajax.addToCart',compact('pre_order'));

    }

    public function selectCity(Request $request)
    {
        $selectedCountry=$request->selectedCountry;
        $cities=city::where('province_id',8)->where('county_id',$selectedCountry)->paginate(999999999);
        return view('ajax.selectCity',compact('cities'));
    }

    public function newsletter(Request $request)
    {
        if (newsletter::where('email',$request->email)->count()==0) {
            $newsletter = new newsletter();
            $newsletter->email = $request->email;
            $newsletter->save();
        }
        return '200';
    }

    public function addToWishlist(Request $request)
    {
        if (favorite::where('product_id',$request->product_id)->where('user_id',Auth::user()->id)->count()==0){
            $favorite=new favorite();
            $favorite->user_id=Auth::user()->id;
            $favorite->product_id=$request->product_id;
            $favorite->save();
        }
        return '200';
    }



}
