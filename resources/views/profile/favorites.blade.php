<!DOCTYPE html>
<html lang="fa">
<head>
    <title>علاقمندی ها - فروشگاه اینترنتی حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="animsition">

@include('includes.header')


<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
         style="background-color: #c8c8c8;padding-bottom: 0px;padding-top: 0px;min-height: 2px;">
</section>

<!-- content page -->
<section class="bgwhite p-t-40 p-b-38">

    <div class="container" style="max-width: 98%">
        <div class="row" style="direction: rtl">
            <div class="col-md-3 ">
                @include('profile.includes.header')

            </div>
            <div class="col-md-9">
                @if($favorites->count()==0)
                    <div class="c-profile-empty">
                    <i class="fa fa-exclamation-circle fa-2x"></i>
                    موردی برای نمایش وجود ندارد!
                    </div>

                @else


                <section class="c-profile-wishlist">
                    <div class="c-profile-navbar">
                        <h4>لیست علاقمندی ها</h4>
                    </div>
                    <ul class="c-profile-wishlist__listing">

                        @foreach($favorites as $favorite)
                            <li class="c-profile-wishlist__list-item js-favorite-container ">
                                <div class="c-profile-wishlist__list-item-thumb">
                                    <a href="{{route('shop.product',['product_id' => $favorite->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($favorite->product_id)->name)])}}"
                                       class="c-profile-wishlist__list-item-img" target="_blank">
                                        <img alt="{{\App\Product::find($favorite->product_id)->name}}"
                                             src="{{\App\Product::find($favorite->product_id)->image}}">
                                    </a>
                                    <form action="{{route('favorites.destroy',['product'=>$favorite->product_id])}}"
                                          method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <button class="c-profile-wishlist__list-item-remove js-remove-favorite-btn fa fa-times"></button>
                                    </form>
                                </div>
                                <div class="c-profile-wishlist__list-item-content">
                                    <div class="c-profile-wishlist__list-item-content-container">
                                        <a href="{{route('shop.product',['product_id' => $favorite->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($favorite->product_id)->name)])}}"
                                           target="_blank">
                                            <h4>{{\App\Product::find($favorite->product_id)->name}}</h4>
                                        </a>
                                    </div>
                                    <div class="c-profile-wishlist__list-item-content-container">
                                        <div class="c-profile-wishlist__list-item-price">

                                        </div>
                                        <a href="{{route('shop.product',['product_id' => $favorite->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($favorite->product_id)->name)])}}"
                                           target="_blank" class="c-profile-wishlist__list-item-button">مشاهده محصول</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </section>
                @endif
            </div>


        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>
