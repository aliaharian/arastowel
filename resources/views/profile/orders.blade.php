<!DOCTYPE html>
<html lang="fa">
<head>
    <title>سفارشات شما - حوله ارس</title>
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
                @if($invoices==null)
                    <div class="c-profile-empty">
                        <i class="fa fa-exclamation-circle fa-2x"></i>
                        موردی برای نمایش وجود ندارد!
                    </div>

                @else
                    <div class="o-headline o-headline--profile">
                        <span> سفارش‌ها </span>
                    </div>
                    <div class="c-table-orders">
                        <div class="c-table-orders__head c-table-orders__head--highlighted">
                            <div class="c-table-orders__row">
                                <div class="c-table-orders__cell c-table-orders__cell--hash">no.</div>
                                <div class="c-table-orders__cell c-table-orders__cell--id">شماره سفارش</div>
                                <div class="c-table-orders__cell c-table-orders__cell--date">تاریخ ثبت سفارش</div>
                                <div class="c-table-orders__cell c-table-orders__cell--price">مبلغ قابل پرداخت</div>
                                <div class="c-table-orders__cell c-table-orders__cell--price">مبلغ کل</div>
                                <div class="c-table-orders__cell c-table-orders__cell--payment">عملیات پرداخت</div>
                                <div class="c-table-orders__cell c-table-orders__cell--detail"> جزییات</div>
                            </div>
                        </div>
                        <div class="c-table-orders__body">

                            @foreach($invoices as $invoice)
                            <div class="c-table-orders__row">
                                <div class="c-table-orders__cell c-table-orders__cell--hash">{{$invoice->id}}</div>
                                <div class="c-table-orders__cell c-table-orders__cell--id">{{$invoice->invoice_number}}</div>
                                <div class="c-table-orders__cell c-table-orders__cell--date">{{\Morilog\Jalali\CalendarUtils::strftime('d M Y', strtotime($invoice->created_at))}}</div>
                                <div class="c-table-orders__cell c-table-orders__cell--price">
                                    <div> @if($invoice->payed==0)
                                            {{number_format($invoice->transaction_amount)}}  تومان
                                        @else
                                            0
                                        @endif
                                    </div>
                                </div>
                                <div class="c-table-orders__cell c-table-orders__cell--price">
                                    {{number_format($invoice->transaction_amount)}}  تومان

                                </div>
                                <div class="c-table-orders__cell c-table-orders__cell--payment">
                                    <span class="c-table-orders__payment-status c-table-orders__payment-status--ok">@if($invoice->payed==0)
                                            پرداخت نشده
                                        @else
                                            پرداخت موفق
                                        @endif</span>
                                </div>
                                <div class="c-table-orders__cell c-table-orders__cell--detail pos-relative">
                                    <a href="/profile/order/{{$invoice->invoice_number}}" class="btn-order-more fa fa-arrow-left"></a>
                                </div>
                            </div>
                                @endforeach



                        </div>
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
