<?php

namespace App\Http\Controllers;

use App\blog;
use App\Category;
use App\Product;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function mainSite()
    {
        /* create new sitemap object */
        $sitemap = App::make("sitemap");

        /* add item to the sitemap (url, date, priority, freq) */
        $sitemap->add(URL::to('/'), date('c', time()), '1.0', 'daily');
        $sitemap->add(route('about-us'),date('c', time()),'0.8', 'monthly');
        $sitemap->add(route('blog'),date('c', time()),'0.8', 'daily');
//        blog
        $blogs = blog::where('published',1)->get();

        foreach ($blogs as $blog) {
            $images = [
                ['url' => URL::to($blog->image), 'title' => $blog->title],
            ];
            $sitemap->add(route('blog.post', [$blog->id, str_replace(' ','-',$blog->title)]), $blog->updated_at, '0.80', 'daily',$images);
        }

        $tags=Tag::all();
        foreach ($tags as $tag){
            $sitemap->add(route('blog.tagSearch', [$tag->tag_name]), $tag->updated_at, '0.80', 'daily');

        }




        /*******************************************************/

        $sitemap->add(route('shop'),date('c', time()),'0.8', 'daily');


        $products = Product::where('published',1)->get();


        /* add every tab to the sitemap */
        foreach ($products as $product) {
           $images = array();

            foreach($product->galleries as $gallery){
                if ($gallery!=null&&$gallery!=''){
                    $images[] = array(
                        'url' => $gallery->address,
                        'title' => $product->name
                    );
                }
            }
            if ($product->variable!=0){
                foreach($product->color as $color) {
                    if($color->image!=null){
                        $images[] = array(
                            'url' => $color->image,
                            'title' => $product->name
                        );
                    }
                }
            }
            $images[] = array(
                'url' => $product->image,
                'title' => $product->name
            );

            $sitemap->add(route('shop.product', [$product->id, str_replace(' ','-',$product->name)]), $product->updated_at, '0.85', 'daily',$images);
        }

        $categories=Category::all();
        foreach ($categories as $category){
            if ($category->english_name!='promotional-towel' && $category->english_name!='gift-towel' )
            $sitemap->add(route('shop.category', [$category->english_name]), $category->updated_at, '0.80', 'daily');
        }

        /*******************************************************/
        $sitemap->add(route('contact-us'),date('c', time()),'0.8', 'monthly');

        $sitemap->add(route('freeshipping'),date('c', time()),'0.8', 'monthly');

        /*******************************************************/

        $images = array();
        $products=Product::all();
        foreach ($products as $product){
            foreach($product->categories as $category){
                if($category->english_name=='gift-towel'){
                    $images[] = array(
                        'url' => $product->image,
                        'title' => $product->name
                    );
                }
            }
        }
        $sitemap->add(route('gift-pack'),date('c', time()),'0.9', 'daily',$images);
        /*******************************************************/
        $sitemap->add(route('product-return'),date('c', time()),'0.8', 'monthly');
        /*******************************************************/

        $images = array();
        $products=Product::all();
        foreach ($products as $product){
            foreach($product->categories as $category){
                if($category->english_name=='promotional-towel'){
                    $images[] = array(
                        'url' => $product->image,
                        'title' => $product->name
                    );
                }
            }
        }
        $sitemap->add(route('promotional-towels'),date('c', time()),'0.9', 'daily',$images);
        /*******************************************************/
        $sitemap->add(route('shopping-steps'),date('c', time()),'0.8', 'monthly');


        return $sitemap->render('xml');
    }
}
