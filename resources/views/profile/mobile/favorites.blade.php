<!DOCTYPE html>
<html lang="fa">
<head>
    <title>علاقمندی ها - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body>

@include('includes.header')


<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-color: #c8c8c8;padding-bottom: 0px;padding-top: 0px;min-height: 2px;">
</section>

<!-- content page -->
<section class="bgwhite p-t-40 p-b-38">

    <div class="container" style="max-width: 98%">
        <div class="row" style="direction: rtl">
            <div class="col-md-3 ">
                @include('profile.includes.header')

            </div>
            <div class="col-md-9">
                {{--<div class="c-profile-empty">--}}
                {{--<i class="fa fa-exclamation-circle fa-2x"></i>--}}
                {{--موردی برای نمایش وجود ندارد!--}}
                {{--</div>--}}
                <div class="c-profile-wishlist">
                    <div class="o-headline o-headline--profile">
                        <span>لیست علاقمندی ها</span>
                    </div>
                    @if($favorites->count()==0)
                        <div class="c-profile-empty">
                            <i class="fa fa-exclamation-circle fa-2x"></i>
                            موردی برای نمایش وجود ندارد!
                        </div>

                    @else
                        @foreach($favorites as $favorite)

                        <div class="o-collapse o-round-cart c-profile-wishlist__item js-favorite-container ">
                        <header class="c-profile-wishlist__item-product">
                            <a href="{{route('shop.product',['product_id' => $favorite->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($favorite->product_id)->name)])}}" class="c-profile-wishlist__item-image">
                                <img width="80px" alt="{{\App\Product::find($favorite->product_id)->name}}" src="{{\App\Product::find($favorite->product_id)->image}}">
                            </a>
                            <div class="c-profile-wishlist__item-details">
                                <a href="{{route('shop.product',['product_id' => $favorite->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($favorite->product_id)->name)])}}" class="c-profile-wishlist__item-row c-profile-wishlist__item-name">
                                    {{\App\Product::find($favorite->product_id)->name}}
                                </a>

                            </div>
                        </header>
                        <div class="c-profile-wishlist__item-actions">
                            <a href="{{route('shop.product',['product_id' => $favorite->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($favorite->product_id)->name)])}}" class="c-profile-wishlist__action c-profile-wishlist__action--primary">مشاهده محصول</a>

                            <form action="{{route('favorites.destroy',['product'=>$favorite->product_id])}}"
                                  method="post">
                                {{method_field('delete')}}
                                {{csrf_field()}}
                                <button type="submit" class="c-profile-wishlist__action c-profile-wishlist__action--secondary js-remove-favorite-btn">حذف</button>

                            </form>
                        </div>
                    </div>
                        @endforeach
                    @endif

                </div>


            </div>


        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>
