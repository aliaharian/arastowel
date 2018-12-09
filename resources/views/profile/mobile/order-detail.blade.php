<!DOCTYPE html>
<html lang="fa">
<head>
    <title>جزئیات سفارش - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >

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

                @if($invoice!=null)
                <div class="o-page">
                    <div class="o-page-navigation">
                        <div class="o-page-navigation__title">سفارش {{$invoice->invoice_number}}</div>
                        <a href="/profile/orders/" class="o-page-navigation__btn-back fa fa-arrow-left">بازگشت</a>
                    </div>
                    <div class="c-profile-order">
                        <div class="o-collapse">
                            <div class="o-round-cart">
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">نام تحویل گیرنده</div>
                                    <div class="c-profile-info__value">{{$invoice->full_name}}</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">تعداد مرسوله</div>
                                    <div class="c-profile-info__value">۱ عدد</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">مبلغ قابل پرداخت</div>
                                    <div class="c-profile-info__value">
                                        <div>@if($invoice->payed==0)
                                                {{number_format($invoice->transaction_amount)}}  تومان
                                            @else
                                                0
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">مبلغ کل</div>
                                    <div class="c-profile-info__value">{{number_format($invoice->transaction_amount)}}  تومان</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">تاریخ ثبت سفارش</div>
                                    <div class="c-profile-info__value">{{\Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime($invoice->created_at))}}</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">شماره تماس تحویل گیرنده</div>
                                    <div class="c-profile-info__value">{{$invoice->phone_number}}</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">آدرس</div>
                                    <div class="c-profile-info__value">{{$invoice->address}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="o-collapse">
                            <div class="o-page-navigation"></div>
                            <div class="o-round-cart">
                                <div class="c-profile-order-steps" style="overflow-x: scroll;">
                                    <div class="c-profile-order-steps__container">
                                        <div class="c-profile-order-steps__item swiper-slide @if($invoice->status=='در صف بررسی') is-active @endif" style="width: 252.5px;">
                                            <img data-src="https://statics.arastowel.com/images/ordering.png" src="https://statics.arastowel.com/images/ordering.png">
                                            <span>در صف بررسی</span>
                                        </div>
                                        <hr>
                                        <div class="c-profile-order-steps__item swiper-slide  @if($invoice->status=='تایید سفارش') is-active @endif" style="width: 252.5px;">
                                            <img data-src="https://statics.arastowel.com/images/list.png" src="https://statics.arastowel.com/images/list.png">
                                            <span>تایید سفارش</span>
                                        </div>
                                        <hr class="">
                                        <div class="c-profile-order-steps__item swiper-slide swiper-slide-prev @if($invoice->status=='آماده سازی سفارش') is-active @endif" style="width: 252.5px;">
                                            <img data-src="https://statics.arastowel.com/images/barbari.png" src="https://statics.arastowel.com/images/barbari.png">
                                            <span>آماده‌سازی سفارش</span>
                                        </div>
                                        <hr class="">
                                        <div class="c-profile-order-steps__item swiper-slide @if($invoice->status=='تحویل به مامور ارسال') is-active @endif" style="width: 252.5px;">
                                            <img data-src="https://statics.arastowel.com/images/motor_cycle.png" src="https://statics.arastowel.com/images/mororcycle.png">
                                            <span>تحویل به مامور ارسال</span>
                                        </div>
                                        <hr class="">
                                        <div class="c-profile-order-steps__item swiper-slide @if($invoice->status=='تحویل مرسوله به مشتری') is-active @endif" style="width: 252.5px;">
                                            <img data-src="https://statics.arastowel.com/images/pack.png" src="https://statics.arastowel.com/images/pack.png">
                                            <span>تحویل مرسوله به مشتری</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="c-profile-order__status"><span class="c-profile-orders__header-status">
                            {{$invoice->status}}
                        </span></div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">کد پیگیری</div>
                                    <div class="c-profile-info__value">{{$invoice->tracking_code}}
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">نحوه ارسال سفارش</div>
                                    <div class="c-profile-info__value">تحویل توسط حوله ارس (ارسال رایگان سفارش‌های بالاتر از ۵ میلیون تومان)
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">مبلغ این مرسوله</div>
                                    <div class="c-profile-info__value">{{number_format($invoice->transaction_amount)}}
                                        <span> تومان</span></div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">هزینه ارسال</div>
                                    <div class="c-profile-info__value">{{number_format($invoice->post_price)}} <span> تومان</span></div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">زمان تحویل</div>
                                    <div class="c-profile-info__value">@if($invoice->arrival_date!=null)
                                            {{\Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime($invoice->arrival_date))}}
                                        @else
                                            با شما تماس گرفته خواهد شد
                                        @endif</div>
                                </div>
                            </div>
                        </div>
                        <div class="c-product-row c-product-row--inner-page">
                            @foreach($invoice_line_items as $item)

                            <div class="c-product-box">
                                <div class="c-product-box__content">
                                    <div class="c-product-box__count">{{$item->qty}}</div>
                                    <a class="c-product-box__img js-url "
                                       href="{{route('shop.product',['product_id' => $item->product_id, 'product_name'=>str_replace(' ','-',\App\Product::find($item->product_id)->name)])}}"><img
                                                alt="{{\App\Product::find($item->product_id)->name}}"
                                                src="{{$item->image}}" width="80px"></a>
                                    <div class="c-product-box__title">
                                        {{\App\Product::find($item->product_id)->name}}</span>
                                        @if($item->color_id!=0&&$item->size_id==0)
                                            <div class="c-product-box__seller"><span>رنگ: </span><span
                                                        class="c-product-box__seller-name">{{\App\Color::find($item->color_id)->name}}</span></div>

                                        @elseif($item->color_id!=0&&$item->size_id!=0)
                                            <div class="c-product-box__seller"><span>رنگ: </span><span
                                                        class="c-product-box__seller-name">{{\App\Color::find($item->color_id)->name}}</span></div>
                                            <div class="c-product-box__seller"><span>سایز : {{\App\size::find($item->size_id)->name}}</span></div>

                                        @endif
                                    </div>
                                    <div class="c-price c-price--bottom">
                                        <div class="c-price__value">
                                            {{number_format($item->off_price*$item->qty)}}
                                            <span class="c-price__currency"> تومان</span></div>
                                    </div>
                                </div>
                            </div>
                                @endforeach


                        </div>
                    </div>
                </div>

                @else
                    <div class="alert alert-danger">این فاکتور وجود ندارد</div>
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
