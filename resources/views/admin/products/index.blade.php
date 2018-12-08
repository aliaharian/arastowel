<!DOCTYPE html>
<html>
<head>
  <title> محصولات | حوله رزا</title>

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
        محصولات
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> محصولات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('products.create')}}" class="btn btn-primary btn-block margin-bottom">افزودن محصول جدید</a>

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
                <li><a href="{{route('products.index')}}"><i class="fa fa-inbox"></i> همه محصولات
                <li><a href="{{route('products.type',['type'=>1])}}"><i class="fa fa-envelope-o"></i> منتشر شده</a></li>
                <li><a href="{{route('products.type',['type'=>0])}}"><i class="fa fa-file-text-o"></i> پیش نویس</a></li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">محصولات</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <form action="{{route('products.search')}}" method="get">
                  <input type="text" name="search" class="form-control input-sm" placeholder="جستجو">
                    <button type="submit" class="fa fa-search form-control-feedback" value="search"></button>
                  </form>
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
                {{$products->links()}}

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد محصول</th>
                    <th class="mailbox-star">نام محصول</th>
                    <th class="mailbox-name">قیمت</th>
                    <th class="mailbox-name">موجودی انبار</th>
                    <th class="mailbox-subject">وضعیت</th>
                    <th class="mailbox-subject">حراج</th>
                    <th class="mailbox-subject">پیشنهادی</th>
                    <th class="mailbox-subject">ویرایش</th>
                    <th class="mailbox-subject">حذف</th>

                  </tr>
                  </thead>

                  <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td class="mailbox-star">{{$product->id}}</td>
                    <td class="mailbox-star"><a target="_blank" href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}"> {{$product->name}}</a></td>
                    <td class="mailbox-name">@if($product->variable!=2){{number_format($product->price)}}@else<span style="color: darkred;font-weight: bold;"> قیمت متغیر</span>@endif</td>
                    <td class="mailbox-name"><span @if($product->qty==''||$product->qty==0) style="color: darkred;font-weight: bold" @endif>{{$product->qty}}</span></td>
                    <td class="mailbox-subject">@if($product->published==1)منتشر شده@else <span style="color: darkred;font-weight: bold;">پیش نویس</span>@endif</td>
                    <td class="mailbox-subject">@if($product->off->count()==0)<span class="fa fa-times" style="color: darkred;font-weight: bold;"></span>@else
                        @php $hasoff=0 @endphp
                      @foreach($product->off as $off)
                          @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                            @php $percent=100-$off->percent; $newprice=$product->price*$percent/100;  @endphp
                            @php $hasoff=1 @endphp
                          @endif
                        @endforeach
                      @if($hasoff==1)
                        <span class="fa fa-check" style="color: darkgreen;font-weight: bold;"></span>
                      @elseif($hasoff==0)
                          <span class="fa fa-exclamation" style="color: darkgoldenrod;font-weight: bold;"></span>
                        @endif
                      @endif</td>
                    <td class="mailbox-subject">@if($product->featured==0)<a href="{{route('products.promote',['id'=>$product->id])}}" class="fa fa-times btn btn-danger"></a>@else <a href="{{route('products.promote',['id'=>$product->id])}}" class="fa fa-check btn btn-success" ></a>
                      @endif</td>
                    <td class="mailbox-subject"><a href="{{route('products.edit',['product' => $product->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                    <td class="mailbox-subject">
                      <form action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
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
                {{$products->links()}}

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
