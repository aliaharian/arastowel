<?php

namespace App\Http\Controllers;

use App\address;
use App\blog;
use App\Blog_to_tag;
use App\brand_page;
use App\Category;
use App\city;
use App\country;
use App\invoice;
use App\invoice_line_item;
use App\Pre_order;
use App\Product;
use App\product_to_color;
use App\product_to_size;
use App\Tag;
use Carbon\Carbon;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Zarinpal\Laravel\Facade\Zarinpal;

class mainController extends Controller
{
    public function index()
    {
        $products = Product::where('published', 1)->paginate(999999999);
        $sizes = product_to_size::all();
        return view('index', compact('products', 'sizes'));
    }

    public function shop()
    {

        $products = Product::where('published', 1)->orderBy('qty', 'desc')->paginate('9');
        $sizes = product_to_size::all();


        return view('shop', compact('products', 'sizes'));
    }

    public function shopCategory($category)
    {
        $categoryid = Category::where('english_name', $category)->value('id');
        $categoryArray = Category::find($categoryid);
        $products = Product::where('published', 1)->orderBy('qty', 'desc')->paginate('900');
        $sizes = product_to_size::all();
        return view('category', compact('categoryArray', 'products', 'sizes'));
    }

    public function showProduct($product_id, $product_title)
    {
        $product = Product::find($product_id);
        $products = Product::where('published', 1)->paginate(99999999999);
        $sizes = product_to_size::all();
        $colors = product_to_color::all();
        return view('product-detail', compact('product', 'product_title', 'products', 'sizes', 'colors'));

    }

    public function cart(Request $request)
    {
        $user_ip = $request->ip();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        //return $pre_order;
        return view('cart', compact('pre_order'));

    }

    public function shipping(Request $request)
    {
        $user_ip = $request->ip();
        $agent = new Agent();

        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        $addresses = address::where('user_id', Auth::user()->id)->paginate(99999);
        //return $pre_order;
        return view('shipping', compact('pre_order', 'addresses'));

    }


    public function blog()
    {
        $products = Product::where('published', 1)->paginate(9999999999);
        $sizes = product_to_size::all();
        $posts = blog::orderBy('updated_at', 'desc')->paginate(3);
        $tags = Tag::all();
        return view('blog', compact('products', 'sizes', 'posts', 'tags'));
    }

    public function showPost($blog_id, $blog_title)
    {
        try {
            $post = blog::find($blog_id);
            $products = Product::all();
            $sizes = product_to_size::all();
            $tags = Tag::all();

            return view('blog-detail', compact('products', 'sizes', 'post', 'tags'));
        } catch (Exception $e) {
            echo 'failed';
        }
    }

    public function blogByTag($tag_name)
    {
        $products = Product::where('published', 1)->paginate(99999999999999);
        $sizes = product_to_size::all();
        $tag_id = Tag::where('tag_name', str_replace('-', ' ', $tag_name))->orderBy('updated_at', 'desc')->value('id');
        $selectedTags = Blog_to_tag::where('tag_id', $tag_id)->get();
        $tags = Tag::all();
        return view('blog-by-tag', compact('products', 'sizes', 'selectedTags', 'tags', 'tag_name'));
    }


    public function blogsearch(Request $request)
    {
        $search = $request->search;
        $products = Product::where('published', 1)->paginate(99999999999999);
        $sizes = product_to_size::all();
        $tags = Tag::all();
        $posts = blog::where('title', 'LIKE', '%' . $search . '%')->orderBy('updated_at', 'desc')->paginate(9);
        return view('blog', compact('posts', 'tags', 'products', 'sizes'));
    }


    public function aboutUS()
    {
        return view('about-us');
    }

    public function contactUS()
    {
        return view('contact-us');
    }

    public function giftPack()
    {
        $products = Product::orderBy('id', 'desc')->paginate(9999);

        return view('gift-pack', compact('products'));
    }

    public function promotionalTowels()
    {
        $products = Product::orderBy('id', 'desc')->paginate(9999);
        return view('promotional-towels', compact('products'));

    }

    public function freeshipping()
    {
        return view('freeshipping');

    }

    public function roza()
    {
        $roza = brand_page::where('page', 'roza')->get();
        return view('roza', compact('roza'));

    }

    public function anargol()
    {
        $anargol = brand_page::where('page', 'anargol')->get();

        return view('anargol', compact('anargol'));

    }

    public function maysa()
    {
        return view('maysa');

    }

    public function error403()
    {
        return view('error.403');
    }


    public function createInvoice(Request $request)
    {
        $isHack=0;
        $user_ip = $request->ip();
        $agent = new Agent();
        $user_platform = $agent->platform();
        $user_browser = $agent->browser();
        $pre_order = Pre_order::where('user_ip', $user_ip)->where('user_platform', $user_platform)->where('user_browser', $user_browser)->get();
        foreach ($pre_order as $order) {

            $products=Product::find($order->product_id);
            $remain=$products->qty-$order->qty;
            if ($remain<0){
                $isHack=1;
            }
            if ($order->qty<=0){
                $isHack=1;
            }
        }
        if ($isHack==0) {

            $invoice = new invoice();
            $invoice_number = mt_rand(10000000, 99999999);
            while (invoice::where('invoice_number', $invoice_number)->count() != 0) {
                $invoice_number = mt_rand(10000000, 99999999);
            }
            $invoice->invoice_number = $invoice_number;
            $invoice->user_id = Auth::user()->id;
            $invoice->pay_method = $request->bank_id;
            $number = mt_rand(10000000, 99999999);
            while (invoice::where('tracking_code', $number)->count() != 0) {
                $number = mt_rand(10000000, 99999999);
            }
            $invoice->tracking_code = $number;
            $invoice->status = 'در صف بررسی';
            /////for address
            ///
            ///
            ///
            $address_id = address::where('user_id', Auth::user()->id)->value('id');
            $address = address::find($address_id);
            $invoice->full_name = $address->name . ' ' . $address->last_name;
            $invoice->phone_number = $address->phone_number;
            $invoice->address = '  تهران- شهرستان ' . country::find($address->country_id)->name . '- شهر' . city::find($address->city_id)->name . '-' . $address->address . ' کد پستی :' . $address->postal_code;

            ///
            /// /////for address


            $invoice->save();

            $invoice_id = invoice::where('invoice_number', $invoice_number)->value('id');
            $invoice = invoice::find($invoice_id);


            $total_price = 0;
            $off_total_price = 0;
            foreach ($pre_order as $order) {

                $off_total_price += ($order->off_price * $order->qty);
                $total_price += ($order->price * $order->qty);
            }

            if ($total_price < 5000000) {

                $invoice->post_price = 8000;
                $invoice->transaction_amount = $off_total_price + 8000;

            } else {
                $invoice->post_price = 0;
                $invoice->transaction_amount = $off_total_price;
            }
            $invoice->save();

            foreach ($pre_order as $order) {
                $invoice_line_item = new invoice_line_item();
                $invoice_line_item->invoice_id = $invoice_id;
                $invoice_line_item->product_id = $order->product_id;
                $invoice_line_item->color_id = $order->color_id;
                $invoice_line_item->size_id = $order->size_id;
                $invoice_line_item->qty = $order->qty;
                $invoice_line_item->price = $order->price;
                $invoice_line_item->off_price = $order->off_price;
                $invoice_line_item->off_percent = $order->off_percent;
                $invoice_line_item->image = $order->image;
                $invoice_line_item->save();

                $products = Product::find($order->product_id);
                $remain = $products->qty - $order->qty;
                if ($remain < 0) {
                    $products->qty = 0;
                } else {
                    $products->qty = $remain;
                }
                $products->save();
                Pre_order::find($order->id)->delete();
            }

            if ($total_price < 5000000) {

                $zarinpay = $off_total_price ;

            } else {
                $zarinpay = $off_total_price;
            }

            if ($request->bank_id=='zarinpal'){
                $results = Zarinpal::request(
                    route('index'),          //required
                    $zarinpay,                                  //required
                    'پرداخت فاکتور '.$invoice_number,                             //required
                    'info@arastowel.com'                      //optional
                                           //optional

                );
// save $results['Authority'] for verifying step
                Zarinpal::redirect(); // redirect user to zarinpal

// after that verify transaction by that $results['Authority']
                Zarinpal::verify('OK',1000,$results['Authority']);

            }
            else {


                return redirect('/profile/order/' . $invoice_number);
            }
        }
        else{
            foreach ($pre_order as $order) {
                Pre_order::find($order->id)->delete();
            }
            return redirect('/');
        }
    }
}




















