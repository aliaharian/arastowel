<!DOCTYPE html>
<html lang="fa">
<head>
    <title>تکمیل فرایند خرید - فروشگاه اینترنتی حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/shipping.css">

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

    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container c-shipment-page">

                <section class="o-page">
                    <div class="o-page__row">
                        <section class="o-page__content">
                            <div id="shipping-data">
                                <div class="o-headline o-headline--checkout">
                                    <span>انتخاب آدرس تحویل سفارش</span>
                                </div>
                                @foreach($addresses as $address)
                                <div id="address-section">
                                    <div class="c-checkout-contact is-completed js-user-address-container" id="user-default-address-container">
                                        <div class="c-checkout-contact__content js-default-recipient-box">
                                            <ul class="c-checkout-contact__items">
                                                <li class="c-checkout-contact__item c-checkout-contact__item--username">
                                                    گیرنده: <span class="js-recipient-full_name">{{$address->name}} {{$address->last_name}}</span>
                                                </li>
                                                <li class="c-checkout-contact__item c-checkout-contact__item--location ">
                                                    <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                        شماره تماس: <span class="js-recipient-mobile_phone">{{$address->phone_number}}</span>
                                                    </div>
                                                    <div class="c-checkout-contact__item--message">
                                                        کد پستی: <span class="js-recipient-post_code">{{$address->postal_code}}</span>
                                                    </div>
                                                    <br>
                                                    استان <span>تهران</span>
                                                    ، شهرستان <span>{{\App\country::where('id',$address->country_id)->value('name')}}</span>،
                                                    شهر <span>{{\App\city::where('id',$address->city_id)->value('name')}}</span>،
                                                    <span>{{$address->address}}</span>
                                                </li>
                                                <li class="c-checkout-contact__item c-checkout-contact__item--message"></li>
                                            </ul>
                                            <div></div>
                                        </div>
                                        <a href="{{route('profile.address.edit')}}" class="c-checkout-contact__location" id="change-address-btn">تغییر آدرس ارسال</a>
                                    </div>
                                    <div class="c-checkout-address js-user-address-container" id="user-address-list-container" style="display: none">

                                        <button class="c-checkout-address__cancel" id="cancel-change-address-btn"></button>
                                    </div>
                                </div>
                                    <form method="post" action="{{route('add-invoice')}}">
                                        @csrf


                                        <ul class="c-checkout-paymethod m-b-20">
                                            <li data-event="change_payment_method">
                                                <div class="c-checkout-paymethod__item has-options js-checkout-paymethod__item is-selected is-select-mode">
                                                    <h4 class="c-checkout-paymethod__title">
                                                        شیوه های پرداخت
                                                    </h4>
                                                    <img data-src="" src="">
                                                </div>
                                                <div class="c-checkout-paymethod__options">
                                                    <div class="c-checkout-paymethod__providers">
                                                        <div class="c-checkout-paymethod__providers-arrow"></div>

                                                        <label class="">
                                                <span class="c-ui-radio" data-event="change_online_bank">
                                                    <input type="radio" name="bank_id" value="cash">
                                                    <span class="c-ui-radio__check"></span>
                                                </span>
                                                            <span class="c-checkout-paymethod__source-title" style="text-align: right;font-size: 13px;">پرداخت هنگام تحویل کالا</span>
                                                            <img data-src="https://statics.arastowel.com/images/e-pay.png" src="https://statics.arastowel.com/images/e-pay.png">
                                                        </label>


                                                        <label data-snt-event="dkPaymentPageClick">
                                                        <span class="c-ui-radio" data-event="change_online_bank">
                                                        <input type="radio" name="bank_id" checked value="zarinpal">
                                                        <span class="c-ui-radio__check"></span>
                                                        </span>
                                                        <span class="c-checkout-paymethod__source-title" style="text-align: right">زرین پال</span>
                                                        <img  src="https://statics.arastowel.com/images/zarinpal.png">
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                @endforeach
                                <form method="post" id="shipping-data-form">
                                    <div class="js-eco-delivery " style="">

                                        <div class="c-checkout-pack">
                                            <div class="c-checkout-pack__row">
                                                <section class="c-swiper c-swiper--products-compact js-swiper-box-container">
                                                    <div class="c-box">
                                                        @foreach($pre_order as $order)

                                                        <div class="swiper-container swiper-container-horizontal js-swiper-container js-swiper-cart-parcel swiper-container-rtl">
                                                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                                                <div class="swiper-slide js-product-box-container swiper-slide-active" style="width: 161.167px;">
                                                                    <div class="c-product-box c-product-box--compact js-product-box">
                                                                        <div class="c-product-box__amount">{{$order->qty}}</div>

                                                                        <a class="c-product-box__img js-url">
                                                                            <img alt="{{\App\Product::find($order->product_id)->name}}" class="swiper-lazy swiper-lazy-loaded" src="{{$order->image}}"></a>
                                                                        <div class="c-product-box__title">
                                                                            {{\App\Product::find($order->product_id)->name}}
                                                                            @if($order->color_id!=0&&$order->size_id==0)

                                                                                <br>
                                                                                رنگ
                                                                                {{\App\Color::find($order->color_id)->name}}
                                                                            @elseif($order->color_id!=0&&$order->size_id!=0)
                                                                                <br>
                                                                                رنگ

                                                                                {{\App\Color::find($order->color_id)->name}}
                                                                                <br>
                                                                                سایز
                                                                                {{\App\size::find($order->size_id)->name}}
                                                                            @endif
                                                                            {{number_format($order->off_price*$order->qty)}}تومان
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <div class="c-checkout__actions"><a href="/cart/" class="btn-link-spoiler">
                                    « بازگشت به سبد خرید
                                </a>
                            </div>

                        </section>

                        <aside class="o-page__asidei">
                            <div class="c-checkout-aside">
                                <div class="c-checkout-summary">
                                    <div class="c-checkout-summary__main">
                                        <ul class="c-checkout-summary__summary">
                                            @if($pre_order->count()!=0)
                                                <div class="header-cart-total">
                                                    @php $total_price=0;$off_total_price=0; @endphp
                                                    @foreach($pre_order as $order)
                                                        @php
                                                            $off_total_price+=($order->off_price*$order->qty);
                                                            $total_price+=($order->price*$order->qty);
                                                        @endphp
                                                    @endforeach

                                            <li>
                                                <span>مبلغ کل</span>
                                                    <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>

                                                @endif
                                            </li>
                                            <li>
                                                <span>هزینه ارسال:</span>
                                                <span>
                                                    <span>
                                                        @if($off_total_price>=5000000)
                                                            <span>رایگان</span>
                                                        @else
                                                            <span>8,000 </span> تومان</span><span class="hidden"> + </span>

                                                    @endif
                                                </span>
                                            </li>
                                                </div>
                                        </ul>
                                        <div class="c-checkout-summary__devider">
                                            <div>

                                            </div>
                                        </div>
                                        <div class="c-checkout-summary__content">
                                            <div class="c-checkout-summary__price-title">مبلغ قابل پرداخت:</div>
                                            <div class="c-checkout-summary__price-value">
                                                <span class="c-checkout-summary__price-value-amount" id="cartPayablePrice">
                                                    <span>
                                                     @if($off_total_price>=5000000)
                                                            <span>{{number_format($off_total_price)}} </span> </span><span class="hidden"> + </span>
                                                        @else
                                                            <span>{{number_format($off_total_price+8000)}} </span> </span><span class="hidden"> + </span>

                                                    @endif
                                                    </span>
                                                </span>
                                                تومان
                                            </div>
                                            <button type="submit" class="btn-checkouti">تایید و ثبت سفارش</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </section>
            </div>
        </div>
        <div id="sidebar">
            <aside>

            </aside>
        </div>
    </main>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>
