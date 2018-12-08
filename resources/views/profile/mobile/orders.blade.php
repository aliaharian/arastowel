<!DOCTYPE html>
<html lang="fa">
<head>
    <title>لیست سفارشات - حوله ارس</title>
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



                    <div class="c-profile-orders">
                        <div class="o-headline o-headline--profile">
                            <span>آخرین سفارش ها</span>
                        </div>
                        @if($invoices!=null)
                            @foreach($invoices as $invoice)

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
                        @endforeach





                    </div>
                @else
                    <div class="c-profile-empty">
                        <i class="fa fa-exclamation-circle fa-2x"></i>
                        موردی برای نمایش وجود ندارد!
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
