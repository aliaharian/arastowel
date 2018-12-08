<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\gallery;
use App\Off;
use App\Product;
use App\product_to_color;
use App\product_to_size;
use App\size;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('id', 'desc')->simplePaginate('10');
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors=Color::all();
        $sizes=size::all();
        $categories=Category::all();
        return view('admin.products.add-product',compact('colors','sizes','categories'));

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

        $product=new Product();
        $product->name=$request->title;
        $product->short_description=$request->ckeditor;
        $product->long_description=$request->ckeditorlongdesc;
        $product->qty=$request->mainqty;
        if (!isset($request->colorvariable)){
            $product->price=$request->mainprice;
            $request->variable=0;
        }
        else if(isset($request->colorvariable)){
            if(isset($request->sizevariable)) {
                $product->variable = 2;
            }
            else if (!isset($request->sizevariable)){
                $product->variable = 1;
            }
        }
        $product->image=$request->mainImage;
        $product->info=$request->ckeditorinfo;
        if (!isset($request->draft)) {
            $product->published=1;
        }else if (isset($request->draft)) {
            $product->published=0;
        }
        $product->save();

        $colors=Color::all();
        $sizes=size::all();
        $categories=Category::all();
        foreach ($categories as $category){
            $cat='cat'.$category->id;
            if ($request->$cat=='on'){
               $categoriesArray[]=$category->id;
            }
        }
        if (isset($categoriesArray)) $product->categories()->sync($categoriesArray);
        for($gallery=1;$gallery<10;$gallery++){
            $galleryName='gallery'.$gallery;
            if($request->$galleryName!=''){
                $productGallery=new gallery();
                $productGallery->address=$request->$galleryName;
                $productGallery->product_id=Product::orderBy('id','DESC')->first()->id;

                $productGallery->save();
            }
        }
        if (isset($request->colorvariable)) {

                foreach ($colors as $color){
                    $coloroption=$color->id;
                    if ($request->$coloroption=='on'){
                        $colorsArray[]=$color->id;
                    }
                }
            $product->color()->sync($colorsArray);

            foreach ($colors as $color){
                $coloroption=$color->id;
                $productId=Product::orderBy('id','DESC')->first()->id;
                $results = product_to_color::where('product_id', $productId)->where('color_id', $coloroption)->value('id');
                $updateColor=product_to_color::find($results);
                $imageColorName='imageColor'.$coloroption;
                if ($request->$imageColorName!=''&& isset($request->$coloroption)) {
                    $updateColor->image = $request->$imageColorName;
                    $updateColor->save();
                }

            }

            if (!isset($request->sizevariable)) {
                $product->price=$request->mainprice;
            }
            else if(isset($request->sizevariable)){
                    foreach ($sizes as $size){
                        $sizeoption=$size->id;
                        $sizeoptionForForm='Size' . $sizeoption;
                        $productId=Product::orderBy('id','DESC')->first()->id;
                        if($request->$sizeoptionForForm=='on'){
                            $sizeDatabase=new product_to_size();
                            $sizeDatabase->product_id=$productId;
                            $sizeDatabase->size_id=$size->id;
                            $sizeDatabase->save();
                        }
                    }

                    foreach ($sizes as $size){
                        $sizeoption=$size->id;
                        $productId=Product::orderBy('id','DESC')->first()->id;
                        $results = product_to_size::where('product_id', $productId)->where('size_id', $sizeoption)->value('id');
                        $updateSize=product_to_size::find($results);
                        if (!empty($updateSize)) {
                            $priceSizeName = 'priceSize'  . $sizeoption;
                            if ($request->$priceSizeName != '') {
                                $updateSize->price = $request->$priceSizeName;
                                $updateSize->save();
                            }
                        }
                    }
            }
        }

        if (isset($request->off)){
            $off=new Off();
            $productId=Product::orderBy('id','DESC')->first()->id;
            $off->product_id=$productId;
            $off->percent=$request->offpercent;
            $off->start=date('Y-m-d H:i:s',strtotime('+3 hour +30 minutes',strtotime(gmdate("Y-m-d H:i:s", $request->offstart))));
            $off->end=date('Y-m-d H:i:s',strtotime('+3 hour +30 minutes',strtotime(gmdate("Y-m-d H:i:s", $request->offend))));
            $off->save();

        }
        $product->save();

        $pm='محصول شما با موفقیت ذخیره شد';

        return view('admin.products.add-product',compact('colors','sizes','categories','pm'));

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
        $product=Product::find($id);
        $colors=Color::all();
        $sizes=size::all();
        $categories=Category::all();
        $selectedColors=product_to_color::all();
        $selectedSizes=product_to_size::all();
        return view('admin.products.edit-product',compact('product','colors','sizes','categories','selectedColors','selectedSizes'));

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
        $product=Product::find($id);
        $product->name=$request->title;
        $product->short_description=$request->ckeditor;
        $product->long_description=$request->ckeditorlongdesc;
        $product->qty=$request->mainqty;
        if (!isset($request->colorvariable)){
            $product->price=$request->mainprice;
            $request->variable=0;
        }
        else if(isset($request->colorvariable)){
            if(isset($request->sizevariable)) {
                $product->variable = 2;
            }
            else if (!isset($request->sizevariable)){
                $product->variable = 1;
            }
        }
        $product->image=$request->mainImage;
        $product->info=$request->ckeditorinfo;
        if (!isset($request->draft)) {
            $product->published=1;
        }else if (isset($request->draft)) {
            $product->published=0;
        }
        $product->save();

        $colors=Color::all();
        $sizes=size::all();
        $categories=Category::all();
        foreach ($categories as $category){
            $cat='cat'.$category->id;
            if ($request->$cat=='on'){
                $categoriesArray[]=$category->id;
            }
        }
        if (isset($categoriesArray)) $product->categories()->sync($categoriesArray);
        gallery::where('product_id',$id)->delete();
        for($gallery=1;$gallery<10;$gallery++){
            $galleryName='gallery'.$gallery;
            if($request->$galleryName!=''){
                $productGallery=new gallery();
                $productGallery->address=$request->$galleryName;
                $productGallery->product_id=$id;

                $productGallery->save();
            }
        }
        if (isset($request->colorvariable)) {

            foreach ($colors as $color){
                $coloroption=$color->id;
                if ($request->$coloroption=='on'){
                    $colorsArray[]=$color->id;
                }
            }
            $product->color()->sync($colorsArray);

            foreach ($colors as $color){
                $coloroption=$color->id;
                $productId=$id;
                $results = product_to_color::where('product_id', $productId)->where('color_id', $coloroption)->value('id');
                $updateColor=product_to_color::find($results);
                $imageColorName='imageColor'.$coloroption;
                if ($request->$imageColorName!=''&& isset($request->$coloroption)) {
                    $updateColor->image = $request->$imageColorName;
                    $updateColor->save();
                }
            }

            if (!isset($request->sizevariable)) {
                $product->price=$request->mainprice;
            }
            else if(isset($request->sizevariable)){
                product_to_size::where('product_id',$id)->delete();
                foreach ($sizes as $size){
                    $sizeoption=$size->id;
                    $sizeoptionForForm='Size' . $sizeoption;
                    $productId=$id;
                    if($request->$sizeoptionForForm=='on'){
                        $sizeDatabase=new product_to_size();
                        $sizeDatabase->product_id=$productId;
                        $sizeDatabase->size_id=$size->id;
                        $sizeDatabase->save();
                    }
                }

                foreach ($sizes as $size){
                    $sizeoption=$size->id;
                    $productId=$id;
                    $results = product_to_size::where('product_id', $productId)->where('size_id', $sizeoption)->value('id');
                    $updateSize=product_to_size::find($results);
                    if (!empty($updateSize)) {
                        $priceSizeName = 'priceSize'  . $sizeoption;
                        if ($request->$priceSizeName != '') {
                            $updateSize->price = $request->$priceSizeName;
                            $updateSize->save();
                        }
                    }
                }
            }
        }

        if (isset($request->off)){
            Off::where('product_id',$id)->delete();
            $off=new Off();
            $productId=$id;
            $off->product_id=$productId;
            $off->percent=$request->offpercent;
            $off->start=date('Y-m-d H:i:s',strtotime('+3 hour +30 minutes',strtotime(gmdate("Y-m-d H:i:s", $request->offstart))));
            $off->end=date('Y-m-d H:i:s',strtotime('+3 hour +30 minutes',strtotime(gmdate("Y-m-d H:i:s", $request->offend))));
            $off->save();

        }
        $product->save();

        $pm='محصول شما با موفقیت ویرایش شد';

        $product=Product::find($id);
        $colors=Color::all();
        $sizes=size::all();
        $categories=Category::all();
        $selectedColors=product_to_color::all();
        $selectedSizes=product_to_size::all();
        return view('admin.products.edit-product',compact('pm','product','colors','sizes','categories','selectedColors','selectedSizes'));



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
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'LIKE', '%'.$search.'%')->simplePaginate(10);
        return view('admin.products.index', compact('products'));
    }
    public function promote($id)
    {
        $product=Product::find($id);
        if ($product->featured==0){
            $product->featured=1;
            $product->save();
        }
        else {
            $product->featured=0;
            $product->save();
        }
        return back();
    }
    public function type(Request $request)
    {
        $type = $request->type;
        $products = Product::where('published', 'LIKE', $type)->simplePaginate(10);
        return view('admin.products.index', compact('products'));
    }
}
