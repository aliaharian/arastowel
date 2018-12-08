<!DOCTYPE html>
<html>
<head>
  <title> سفارشات | حوله رزا</title>

  @include('admin.includes.headerLinks')

  <link rel="stylesheet" href="https://statics.arastowel.com/panel-admin/css/persian-datepicker-0.4.5.min.css" />
<style>
  .display-block{
    display: block!important;
    margin: 0!important;
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
        <div class="col-md-2">

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">پوشه ها</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="{{route('invoices.index')}}"> همه سفارشات
                <li><a href="{{route('invoices.type',['type'=>'در صف بررسی'])}}"> مشاهده نشده</a></li>
                <li><a href="{{route('invoices.type',['type'=>'تحویل مرسوله به مشتری'])}}"> تحویل داده شده</a></li>
                <li><a href="{{route('invoices.type',['type'=>'لغو سفارش'])}}">لغو شده</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-10">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">سفارشات</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">

                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
               <div class="pull-right">



               </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

                <div class="pull-left">
                {{$invoices->links()}}

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد سفارش</th>
                    <th class="mailbox-star">نام کاربر</th>
                    <th class="mailbox-name">نام تحویل گیرنده</th>
                    <th class="mailbox-name">شماره تماس تحویل گیرنده</th>
                    <th class="mailbox-subject">نحوه پرداخت</th>
                    <th class="mailbox-subject">وضعیت پرداخت</th>
                    <th class="mailbox-subject">مبلغ کل(تومان)</th>
                    <th class="mailbox-subject">کد پیگیری</th>
                    <th class="mailbox-subject">وضعیت</th>
                    <th class="mailbox-subject">جزئیات</th>
                    <th class="mailbox-subject">حذف</th>

                  </tr>
                  </thead>

                  <tbody>
                  @foreach($invoices as $invoice)
                  <tr>
                    <td class="mailbox-star">{{$invoice->invoice_number}}</td>
                    <td class="mailbox-star">{{\App\User::where('id',$invoice->user_id)->value('name')}} {{\App\User::where('id',$invoice->user_id)->value('last_name')}}</td>
                    <td class="mailbox-name">{{$invoice->full_name}}</td>
                    <td class="mailbox-name">0{{$invoice->phone_number}}</td>
                    <td class="mailbox-subject">{{$invoice->pay_method}}</td>
                    <td class="mailbox-subject">@if($invoice->payed==0) پرداخت نشده @else پرداخت شده @endif</td>
                    <td class="mailbox-subject">{{number_format($invoice->transaction_amount)}}</td>
                    <td class="mailbox-subject">{{$invoice->tracking_code}}</td>
                    <td class="mailbox-subject">{{$invoice->status}}</td>
                    <td class="mailbox-subject"><a href="{{route('invoices.show',['invoice' => $invoice->id])}}" class="btn btn-info fa fa-eye"></a> </td>
                    <td class="mailbox-subject">
                      <form action="{{route('invoices.destroy',['invoice'=>$invoice->id])}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger fa fa-trash"></button>
                      </form>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="pull-right">


                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-left">
                {{$invoices->links()}}

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
