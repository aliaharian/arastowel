<!DOCTYPE html>
<html lang="fa">
<head>
    <title>کارت های هدیه شما - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="animsition">

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
                        <span>کارت های هدیه</span>
                    </div>
                    @if($gifts->count()==0)
                        <div class="c-profile-empty">
                            <i class="fa fa-exclamation-circle fa-2x"></i>
                            موردی برای نمایش وجود ندارد!
                        </div>

                    @else
                    <div class="alert alert-info">برای استفاده از کارت های هدیه خود می توانید کد هدیه نوشته شده بر روی کارت را در قسمت تسویه حساب سبد خرید خود وارد کنید</div>
                    <div class="alert alert-info">کارت هدیه مختص حساب کاربری شماست و فقط یک بار قابل استفاده می باشد</div>
                        @foreach($gifts as $gift)

                        <div class="o-collapse o-round-cart c-profile-wishlist__item js-favorite-container ">
                        <header class="c-profile-wishlist__item-product">
                            <a href="{{route('shop')}}" class="c-profile-wishlist__item-image">
                                <i class="fa fa-gift fa-2x" style="font-size: 8em"></i>
                            </a>
                            <div class="c-profile-wishlist__item-details">
                                <a href="{{route('shop')}}" class="c-profile-wishlist__item-row c-profile-wishlist__item-name">
                                    کارت هدیه {{$gift->percent}} درصدی حوله ارس با کد:
                                </a>
                                <br>
                                <h4 class="text-center text-danger">{{$gift->code}}</h4>

                                <div class="c-profile-wishlist__item-row">
                                    <div class="c-price"><div class="c-price__value">
                                            {{$gift->percent}} <span class="c-price__currency">درصد تخفیف</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </header>

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
