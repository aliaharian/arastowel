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
            <div class="col-md-9 text-right">
                @if($invoice!=null)


                    <div class="c-profile-navbar">
                        <a href="/profile/orders/" class="c-profile-navbar__btn-back fa fa-arrow-right">بازگشت</a>
                        <h4>سفارش {{$invoice->invoice_number}}
                            <span>ثبت شده در تاریخ
                                {{\Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime($invoice->created_at))}}
                            </span>
                        </h4>
                    </div>
                    <div class="c-profile-order-address">
                        <div class="c-profile-order-address__row">
                            <div class="c-profile-order-address__col">
                                <p>
                                    <span>تحویل گیرنده: </span>
                                    {{$invoice->full_name}}
                                </p>
                            </div>
                            <div class="c-profile-order-address__col">
                                <p>
                                    <span>شماره تماس تحویل گیرنده: </span>
                                    {{$invoice->phone_number}}
                                </p>
                            </div>
                        </div>
                        <div class="c-profile-order-address__row">
                            <div class="c-profile-order-address__col">
                                <p>
                                    <span>آدرس تحویل گیرنده:</span>
                                {{$invoice->address}}
                                </p>
                            </div>
                            <div class="c-profile-order-address__col"><p>
                                    <span>تعداد مرسوله:</span>
                                    ۱ مرسوله
                                </p>
                            </div>
                        </div>
                        <div class="c-profile-order-address__row">
                            <div class="c-profile-order-address__col">
                                <p>
                                    <span>مبلغ قابل پرداخت:</span>
                                    @if($invoice->payed==0)
                                         {{number_format($invoice->transaction_amount)}}  تومان
                                        @else
                                        0
                                    @endif
                                </p>
                            </div>
                            <div class="c-profile-order-address__col">
                                <p>
                                    <span>مبلغ کل:</span>
                                    {{number_format($invoice->transaction_amount)}}  تومان
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="c-profile-order">
                        <section class="c-profile-order-steps has-note swiper-container js-profile-order-steps swiper-container-horizontal swiper-container-rtl">
                            <div class="c-profile-order-steps__container swiper-wrapper" style="transition-duration: 0ms;">
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
                            <div class="c-profile-order-steps__button c-profile-order-steps__button--next swiper-button-disabled">

                            </div>
                            <div class="c-profile-order-steps__button c-profile-order-steps__button--prev">

                            </div>
                        </section>
                        <div class="c-profile-order-steps__note">
                            <ul>
                                <li>{{$invoice->status}}</li>
                            </ul>
                        </div>
                        <div class="c-table-draught">
                            <div class="c-table-draught__row">
                                <div class="c-table-draught__col">
                                    کد پیگیری: {{$invoice->tracking_code}}
                                </div>
                                <div class="c-table-draught__col">زمان
                                    تحویل:
                                    @if($invoice->arrival_date!=null)
                                    {{\Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime($invoice->arrival_date))}}
                                    @else
                                        با شما تماس گرفته خواهد شد
                                @endif
                                </div>
                            </div>
                            <div class="c-table-draught__row">
                                <div class="c-table-draught__col">نحوه ارسال سفارش: تحویل توسط حوله ارس (ارسال رایگان سفارش‌های بالاتر از ۵ میلیون تومان)</div>
                                <div class="c-table-draught__col">هزینه ارسال
                                    : {{number_format($invoice->post_price)}} تومان
                                </div>
                            </div>
                            <div class="c-table-draught__row"><div class="c-table-draught__col c-table-draught__col--total">مبلغ این
                                    مرسوله:
                                    : {{number_format($invoice->transaction_amount)}} تومان

                                </div>
                            </div>
                        </div>
                        <div class="c-table-order">
                            <div class="c-table-order__head">
                                <div class="c-table-order__row">
                                    <div class="c-table-order__cell c-table-order__cell--number">کد محصول</div>
                                    <div class="c-table-order__cell c-table-order__cell--product-name">نام محصول</div>
                                    <div class="c-table-order__cell c-table-order__cell--value">تعداد</div>
                                    <div class="c-table-order__cell c-table-order__cell--price-value">قیمت واحد</div>
                                    <div class="c-table-order__cell c-table-order__cell--price-total">قیمت کل</div>
                                    <div class="c-table-order__cell c-table-order__cell--discount">تخفیف</div>
                                    <div class="c-table-order__cell c-table-order__cell--price-final">قیمت نهایی</div>
                                </div>
                            </div>
                            <div class="c-table-order__body">
                                @foreach($invoice_line_items as $item)
                                <div class="c-table-order__row">
                                    <div class="c-table-order__cell c-table-order__cell--number">{{$item->product_id}}</div>
                                    <div class="c-table-order__cell c-table-order__cell--product-name">
                                        <div class="c-table-order__product">
                                            <figure style="float: right">
                                                <a href="{{route('shop.product',['product_id' => $item->product_id, 'product_name'=>str_replace(' ','-',\App\Product::find($item->product_id)->name)])}}" class="">
                                                    <img width="100px" alt="{{\App\Product::find($item->product_id)->name}}" src="{{$item->image}}">
                                                </a>
                                            </figure>
                                            <h5 style="    float: left;
    margin-right: 10px;">
                                                <span>{{\App\Product::find($item->product_id)->name}}</span>
                                                @if($item->color_id!=0&&$item->size_id==0)
                                                    <span>
                                                    رنگ
                                                        {{\App\Color::find($item->color_id)->name}}</span>
                                                @elseif($item->color_id!=0&&$item->size_id!=0)
                                                    <span>
                                                    رنگ

                                                    {{\App\Color::find($item->color_id)->name}}
                                                    </span>
                                                    <span>
                                                    سایز
                                                    {{\App\size::find($item->size_id)->name}}
                                                    </span>
                                                @endif
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="c-table-order__cell c-table-order__cell--value">{{$item->qty}}</div>
                                    <div class="c-table-order__cell c-table-order__cell--price-value">{{number_format($item->price)}}
                                        تومان
                                    </div>
                                    <div class="c-table-order__cell c-table-order__cell--price-total">{{number_format($item->price*$item->qty)}}
                                        تومان
                                    </div>
                                    <div class="c-table-order__cell c-table-order__cell--discount">{{$item->off_percent}}٪ </div>
                                    <div class="c-table-order__cell c-table-order__cell--price-final">{{number_format($item->off_price*$item->qty)}}
                                        تومان
                                    </div>

                                </div>
                                    @endforeach


                            </div>
                        </div>
                    </div>
            </div>
            @else
                <div class="alert alert-danger">این فاکتور وجود ندارد</div>
                @endif


        </div>
    </div>
</section>

<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>
