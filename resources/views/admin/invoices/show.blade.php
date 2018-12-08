<!DOCTYPE html>
<html>
<head>
  <title> سفارشات | حوله رزا</title>
  <link rel="stylesheet" href="{{asset('https://statics.arastowel.com/css/profile.css')}}" />

  @include('admin.includes.headerLinks')

  <link rel="stylesheet" href="{{asset('/panel-admin/css/persian-datepicker-0.4.5.min.css')}}" />
<style>
  .display-block{
    display: block!important;
    margin: 0!important;
  }
  p,span,div {
    font-size: 15px !important;
  }

  .toggle_radio{
    position: relative;
    background: #b074ca;
    margin: 4px auto;
    overflow: hidden;
    padding: 0 !important;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    position: relative;
    height: 26px;
    width: 780px;
  }
  .toggle_radio > * {
    float: left;
  }
  .toggle_radio input[type=radio]{
    display: none;
  }
  .toggle_radio label{
    font: 90%/1.618 "Source Sans Pro";
    color: rgba(255,255,255,.9);
    z-index: 0;
    display: block;
    width: 123px;
    height: 20px;
    margin: 0 3px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    cursor: pointer;
    z-index: 1;
    /*background: rgba(0,0,0,.1);*/
    text-align: center;
    /*margin: 0 2px;*/
    /*background: blue;*/ /*make it blue*/
  }
  .toggle_option_slider{
    /*display: none;*/
    /*background: red;*/
    width: 123px;
    height: 20px;
    position: absolute;
    top: 3px;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    -webkit-transition: all .4s ease;
    -moz-transition: all .4s ease;
    -o-transition: all .4s ease;
    -ms-transition: all .4s ease;
    transition: all .4s ease;
  }

  #first_toggle:checked ~ .toggle_option_slider{
    background: rgba(255,255,255,.3);
    left: 3px;
  }
  #second_toggle:checked ~ .toggle_option_slider{
    background: rgba(255,255,255,.3);
    left: 131px;
  }
  #third_toggle:checked ~ .toggle_option_slider{
    background: rgba(255,255,255,.3);
    left: 260px;
  }
  #fourth_toggle:checked ~ .toggle_option_slider{
    background: rgba(255,255,255,.3);
    left: 390px;
  }
  #fifth_toggle:checked ~ .toggle_option_slider{
    background: rgba(255,255,255,.3);
    left: 519px;
  }
  #sixth_toggle:checked ~ .toggle_option_slider{
    background: rgba(255,255,255,.3);
    left: 652px;
  }
</style>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


@include('admin.includes.header')
<!-- right side column. contains the logo and sidebar -->
@include('admin.includes.aside')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        سفارشات
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> سفارشات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- /.col -->
        <div class="col-md-12">


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
            <div class="wrappero">
             <form method="post" action="{{route('invoices.update',['invoice'=>$invoice->id])}}">
               {{csrf_field()}}
               {{method_field('put')}}
              <div class="toggle_radio">
                <input type="radio" value="در صف بررسی" @if($invoice->status=='در صف بررسی') checked @endif class="toggle_option" id="first_toggle" name="toggle_option">
                <input type="radio" value="تایید سفارش" @if($invoice->status=='تایید سفارش') checked @endif class="toggle_option" id="second_toggle" name="toggle_option">
                <input type="radio" value="آماده سازی سفارش" @if($invoice->status=='آماده سازی سفارش') checked @endif class="toggle_option" id="third_toggle" name="toggle_option">
                <input type="radio" value="تحویل به مامور ارسال" @if($invoice->status=='تحویل به مامور ارسال') checked @endif class="toggle_option" id="fourth_toggle" name="toggle_option">
                <input type="radio" value="تحویل مرسوله به مشتری" @if($invoice->status=='تحویل مرسوله به مشتری') checked @endif class="toggle_option" id="fifth_toggle" name="toggle_option">
                <input type="radio" value="لغو سفارش" @if($invoice->status=='لغو سفارش') checked @endif class="toggle_option" id="sixth_toggle" name="toggle_option">
                <label for="first_toggle"><p>در صف بررسی</p></label>
                <label for="second_toggle"><p>تایید سفارش</p></label>
                <label for="third_toggle"><p>آماده سازی سفارش</p></label>
                <label for="fourth_toggle"><p>تحویل به مامور ارسال</p></label>
                <label for="fifth_toggle"><p>تحویل مرسوله به مشتری</p></label>
                <label for="sixth_toggle"><p>لغو سفارش</p></label>
                <div class="toggle_option_slider">
                </div>
              </div>
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
                  <input name="arrival_date" type="text" value="{{$invoice->arrival_date}}">
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
               <button type="submit" class="btn btn-success" style="    width: 100px;
    text-align: center;
    margin: 10px auto;
    height: 35px;
    font-size: 15px;">ثبت</button>
             </form>
          </div>

            <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('admin.includes.footer')
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


@include('admin.includes.footerLinks')
<!-- iCheck -->
<!-- Page Script -->

<!-- AdminLTE for demo purposes -->
<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });

</script>
</body>
</html>
