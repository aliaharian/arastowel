<!DOCTYPE html>
<html lang="fa">
<head>
    <title>پروفایل کاربری - حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://arastowel.com/css/profile.css">

    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body >

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
                <div class="c-profile-info">
                    <div class="o-headline o-headline--profile">
                        <span>اطلاعات شخصی</span>
                    </div>
                    <div class="o-collapse">

                        <div class="o-round-cart c-profile-info__box">
                            <section class="c-profile-info__box-section">
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">تصویر پروفایل:</div>
                                    <div class="c-profile-info__value">
                                        <img class="c-profile-info__image" src="{{\Illuminate\Support\Facades\Auth::user()->avatar}}">
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">نام و نام خانوادگی:</div>
                                    <div class="c-profile-info__value">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">شماره تلفن همراه:</div>
                                    <div class="c-profile-info__value">{{$additional_information->value('phone_number')}}
                                        @if($additional_information->value('phone_number')=='') - @endif
                                    </div>
                                </div>
                                <div class="c-profile-info__row">
                                    <div class="c-profile-info__label">پست الکترونیک:</div>
                                    <div class="c-profile-info__value">
                                        {{\Illuminate\Support\Facades\Auth::user()->email}}
                                    </div>
                                </div><div class="c-profile-info__row">
                                    <div class="c-profile-info__label">کد ملی:</div>
                                    <div class="c-profile-info__value">{{$additional_information->value('national_number')}}
                                        @if($additional_information->value('national_number')=='') - @endif
                                    </div>
                                </div>
                                <div class="c-profile-info__row c-profile-info__row--no-border">
                                    <div class="c-profile-info__label">شماره کارت:</div>
                                    <div class="c-profile-info__value c-profile-info__value--ltr"> @php
                                            $newcard='-';
                                            if (strlen($additional_information->value('card_number'))==16){
                                            $card=str_split($additional_information->value('card_number'),4);
                                            $newcard=$card[0].'-'.$card[1].'-'.$card[2].'-'.$card[3];
                                            }
                                        @endphp

                                        {{$newcard}}
                                    </div>
                                </div>
                            </section>
                            <div class="c-profile-info__actions">
                                <a href="/profile/additional-info/" class="c-profile-info__action js-edit-profile-button">ویرایش</a>
                            </div>
                        </div>
                    </div>
                </div>

                @if($invoices!=null)

                <div class="c-profile-orders">
                    <div class="o-headline o-headline--profile">
                        <span>آخرین سفارش ها</span>
                    </div>
                    @php $i=0 @endphp
                    @foreach($invoices as $invoice)
                        @if($i<3)
                    <div class="o-collapse">
                        <div class="o-round-cart c-profile-orders__item">
                            <header class="c-profile-orders__header">
                                <a href="/profile/order/{{$invoice->invoice_number}}" class="c-profile-orders__header-details">
                                    <div class="c-profile-orders__header-summary">
                                        <div class="c-profile-orders__header-row">
                                            <span class="c-profile-orders__header-id">{{$invoice->invoice_number}}</span>
                                            <span class="c-profile-orders__header-state">
                                                @if($invoice->payed==0)
                                                    پرداخت نشده
                                                @else
                                                    پرداخت موفق
                                                @endif</span>
                                        </div>
                                    </div>
                                </a>
                                <hr class="c-ui-separator">
                                <div class="c-profile-orders__header-data">
                                    <div class="c-profile-info__row">
                                        <div class="c-profile-info__label">تاریخ ثبت سفارش</div>
                                        <div class="c-profile-info__value">{{\Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime($invoice->created_at))}}</div>
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
                                        <div class="c-profile-info__value">
                                            {{number_format($invoice->transaction_amount)}}  تومان
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                            @php $i=$i+1 @endphp
                        @endif
                    @endforeach





                </div>
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
