<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use \Illuminate\Support\Facades\Redirect;

Route::get('/','mainController@index')->name('index');
Route::get('product','mainController@shop')->name('shop');
Route::get('products/category/{category}','mainController@shopCategory')->name('shop.category');
Route::get('product/{product_id}/{product_name}','mainController@showProduct')->name('shop.product');
Route::group(['middleware' => ['auth', 'verified','address','orders']], function() {
    Route::get('shipping','mainController@shipping')->name('shipping');
    Route::post('/invoice/create','mainController@createInvoice')->name('add-invoice');
});

Route::group(['middleware' => ['orders']], function() {
    Route::get('cart','mainController@cart')->name('cart');
});

Route::get('blog','mainController@blog')->name('blog');
Route::get('blog/{blog_id}/{blog_title}','mainController@showPost')->name('blog.post');
Route::get('blog/search/tag/{tag_name}','mainController@blogByTag')->name('blog.tagSearch');
Route::get('blog/search', 'mainController@blogsearch')->name('blog.msearch');


Route::get('about-us','mainController@aboutUs')->name('about-us');
Route::get('gift-pack','mainController@giftPack')->name('gift-pack');
Route::get('promotional-towels','mainController@promotionalTowels')->name('promotional-towels');
Route::get('freeshipping','mainController@freeshipping')->name('freeshipping');
Route::get('shopping-steps',function (){return view('shopping-steps');})->name('shopping-steps');
Route::get('product-return',function (){return view('product-return');})->name('product-return');
Route::get('contact-us','mainController@contactUs')->name('contact-us');
Route::get('403','mainController@error403')->name('403');
Route::get('rozatowel','mainController@roza')->name('roza');
Route::get('anargoltowel','mainController@anargol')->name('anargol');
Route::get('maysatowel','mainController@maysa')->name('maysa');



Route::group(['prefix'=>'profile','middleware'=>['auth','verified']], function() {
    Route::get('', 'ProfileController@index')->name('profile.index');
    Route::get('order-tracking', 'ProfileController@orderTracking')->name('profile.order-tracking');
    Route::get('orders', 'ProfileController@orders')->name('profile.orders');
    Route::get('favorites', 'ProfileController@favorites')->name('profile.favorites');
    Route::delete('favorites/{product}', 'ProfileController@destroyFavorites')->name('favorites.destroy');
    Route::get('giftcards', 'ProfileController@giftcards')->name('profile.giftcards');
    Route::get('addresses', 'ProfileController@addresses')->name('profile.addresses');
    Route::get('personal-info', 'ProfileController@personalInfo')->name('profile.personal-info');
    Route::put('edit-personal-info', 'ProfileController@editPersonalInfo')->name('edit-personal-info');
    Route::get('additional-info', 'ProfileController@additionalInfo')->name('profile.additional-info');
    Route::get('order/{invoice_number}', 'ProfileController@orderDetail')->name('profile.order-detail');
    Route::get('reset-password', 'ProfileController@resetPassword')->name('profile.reset-password');
    Route::put('changepass', 'ProfileController@changepass')->name('profile.changepass');
    Route::get('addresses/add', 'ProfileController@addAddress')->name('profile.address.add');
    Route::post('addresses/add/{callback}', 'ProfileController@storeAddress')->name('profile.address.store');
    Route::get('addresses/edit', 'ProfileController@editAddress')->name('profile.address.edit');
    Route::put('addresses', 'ProfileController@updateAddress')->name('profile.address.update');
    Route::delete('addresses/delete', 'ProfileController@destroyAddress')->name('profile.address.destroy');

    Route::get('show-order', 'ProfileController@sendOrderTrack')->name('send-orderTrack');
});



Route::group(['prefix'=>'roza-admin','middleware'=>'adminAuth'], function(){
    Route::get('', 'AdminController@index')->name('admin.index');
    Route::get('/profile', 'AdminController@profile')->name('admin.profile');
    /////////////////////////////////

    Route::resource('products','ProductsController', [
        'except' => [ 'show' ]
    ]);
    Route::get('product/search', 'ProductsController@search')->name('products.search');
    Route::get('product/promote/{id}', 'ProductsController@promote')->name('products.promote');
    Route::get('product/type/{type}', 'ProductsController@type')->name('products.type');
    /////////////////////////////////
    Route::resource('invoices','invoiceController', [
        'except' => [ 'create','store','edit' ]
    ]);
//    Route::get('product/search', 'ProductsController@search')->name('products.search');
//    Route::get('product/promote/{id}', 'ProductsController@promote')->name('products.promote');
        Route::get('invoice/type/{type}', 'invoiceController@type')->name('invoices.type');
    /////////////////////////////////

    Route::resource('colors','ColorController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('color/search', 'ColorController@search')->name('colors.search');
    /////////////////////////////////

    Route::resource('sizes','SizeController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('size/search', 'SizeController@search')->name('sizes.search');

    /////////////////////////////////
    Route::resource('blog','BlogController', [
        'except' => [ 'show' ]
    ]);
    Route::get('blog/search', 'BlogController@search')->name('blog.search');
    Route::get('blogs/type/{type}', 'BlogController@type')->name('blog.type');
    /////////////////////////////////
    Route::resource('tags','TagController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('tag/search', 'TagController@search')->name('tags.search');
    //////////////////////////////
    Route::get('rozatowel', 'AdminController@rozatowel')->name('admin.rozatowel');
    Route::post('rozatowel/edit', 'AdminController@rozatowelEdit')->name('roza.edit');
    //////////////////////////////
    Route::get('anargoltowel', 'AdminController@anargoltowel')->name('admin.anargoltowel');
    Route::post('anargoltowel/edit', 'AdminController@anargoltowelEdit')->name('anargol.edit');
/////////////////////
///
    Route::resource('towels','TowelController', [
        'except' => [ 'show','create' ]
    ]);
    Route::get('towel/search', 'TowelController@search')->name('towels.search');


    /////////
    Route::get('product/special', 'AdminController@special')->name('special.index');


});
Route::get('loadPrice','AjaxController@loadPrice')->name('loadPrice');
Route::get('addToCart','AjaxController@addToCart')->name('addToCart');
Route::get('deleteFromCart','AjaxController@deleteFromCart')->name('deleteFromCart');
Route::get('addToWishlist','AjaxController@addToWishlist')->name('addToWishlist');
Route::get('selectCity','AjaxController@selectCity')->name('selectCity');
Route::get('newsletter','AjaxController@newsletter')->name('newsletter');



Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');


//Route::get('testdate',function (){
//
//    return \Morilog\Jalali\Jalalian::forge('now + 200 days')->ago();
//});


//redirect 301

Route::get('/gift-towels', function(){
    return Redirect::to('/gift-pack', 301);
});

Route::get('/sport-towels', function(){
    return Redirect::to('/product', 301);
});

Route::get('/accessories', function(){
    return Redirect::to('/product', 301);
});

Route::get('/gallery', function(){
    return Redirect::to('/product', 301);
});
Route::get('/products', function(){
    return Redirect::to('/product', 301);
});

Route::get('/dyeing-and-finishing', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/towels', function(){
    return Redirect::to('/product', 301);
});

Route::get('/bathrobe-towels', function(){
    return Redirect::to('/products/category/bathrobe-towel', 301);
});

Route::get('/kids-towels', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});

Route::get('/lifestyle', function(){
    return Redirect::to('/blog', 301);
});


Route::get('/lifestyle-single.php', function(){
    return Redirect::to('/blog', 301);
});

Route::get('/products---fa.html', function(){
    return Redirect::to('/product', 301);
});


Route::get('/about---fa.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/contact-us---fa.html', function(){
    return Redirect::to('/contact-us', 301);
});


Route::get('/promotional-towel---fa.html', function(){
    return Redirect::to('/promotional-towels', 301);
});

Route::get('/kids-towels.html', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});


Route::get('/dyeing---fnishing---fa.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/towels---en.html', function(){
    return Redirect::to('/product', 301);
});


Route::get('/arastowel---en.html', function(){
    return Redirect::to('/', 301);
});

Route::get('/accessoris.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/products---en.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/gallery---en.html', function(){
    return Redirect::to('/', 301);
});

Route::get('/accessoris---en.html', function(){
    return Redirect::to('/product', 301);
});

Route::get('/about-us---en.html', function(){
    return Redirect::to('/about-us', 301);
});

Route::get('/kids-towels---en.html', function(){
    return Redirect::to('/products/category/kids-towel', 301);
});


Route::get('/promotional-towel---en.html', function(){
    return Redirect::to('/promotional-towels', 301);
});

Route::get('/gift-towels---en.html', function(){
    return Redirect::to('/gift-pack', 301);
});

Route::get('/sport-towels--en.html', function(){
    return Redirect::to('/product', 301);
});


Route::get('/contact-us---en.html', function(){
    return Redirect::to('/contact-us', 301);
});


Route::get('/dyeing---fnishing---en.html', function(){
    return Redirect::to('/about-us', 301);
});



Route::get('sitemap','SitemapController@mainSite');