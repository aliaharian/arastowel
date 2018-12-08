<!DOCTYPE html>
<html>
<head>
  <title> تخفیف ویژه | حوله رزا</title>

  @include('admin.includes.headerLinks')

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
حوله های خاص
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">حوله های خاص</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          @if(isset($pm))
              <div class="alert alert-success">
                {{$pm}}
              </div>

              @endif
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">تخفیف ویژه</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              @if($hasSpecial==0)
              <form role="form" action="{{route('special.store')}}" method="POST">
                @csrf
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">انتخاب محصول مورد نظر</label>
                    <select name="product">
                      @foreach($products as $product)
                        @if($product->qty!=0 && $product->published==1 && $product->off->count()!=0 )
                          @foreach($product->off as $off)
                            @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                              <option value="{{$product->id}}">{{$product->name}}</option>
                              @endif
                          @endforeach

                          @endif

                        @endforeach
                    </select>
                  </div>
                  <div class="input-group" style="width: 100%;padding: 10px">
                    <div id="picture" style="width: 100%;margin: 5px auto;"></div>
                    <button type="button" class="browse btn btn-primary" id="imageUpload" style="width: 100%;padding: 10px;margin: auto" > انتخاب تصویر </button>
                    <input  type="text" hidden name="mainImage" style="width: 100%;height: 100%" id="featured_image" placeholder="آدرس تصویر" readonly  />
                  </div>

                      <label class="box-title" id="category_title">متن</label>
                  <input type="text" class="form-control" required id="text" name="text" placeholder="متن">

                  <!-- /.box-body -->
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-success" style="width: 100%">ثبت</button>
                </div>
              </form>
                @endif




            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تخفیف ویژه</h3>

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

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">نام حوله</th>
                    <th class="mailbox-star">متن </th>
                    <th class="mailbox-name">تصویر</th>
                    <th class="mailbox-subject">حذف</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($products as $product)
                    @foreach($product->off as $off)
                      @if($off->special==1)

                  <tr>
                    <td class="mailbox-star">{{$product->name}}</td>
                    <td class="mailbox-star"><a> {{$off->text}}</a></td>
                    <td class="mailbox-name"><img src="{{$off->image}}" style="width: 30px;"></td>
                    <td class="mailbox-subject">
                      <form action="{{route('special.destroy',['special'=>$product->id])}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger fa fa-trash"></button>
                      </form>
                    </td>
                  </tr>

                  @endif
                  @endforeach
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
<script type="text/javascript" src="https://statics.arastowel.com/js/jquery.popupWindow.js"></script>

<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });
    $(document).ready(function(){

        $('#imageUpload').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/main',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain=function (file){
            $('#picture').html('<a onclick="deletemainImage()"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img style="width: 50%" src="' + file + '" /> ');
            $('#featured_image').val(file);
        }
    });

    function deletemainImage() {
        $('#picture').html('');
        $('#featured_image').val('');
    }
</script>
</body>
</html>
