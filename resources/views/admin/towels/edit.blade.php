<!DOCTYPE html>
<html>
<head>
  <title> حوله های خاص | حوله رزا</title>

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
        <li class="active"> حوله های خاص</li>
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
              <h3 class="box-title"> ویرایش حوله</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <form role="form" action="{{route('towels.update',['towel'=>$selectedtowel->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">نام حوله</label>
                    <input type="text" class="form-control" required id="towel_name" value="{{$selectedtowel->name}}" name="towel_name" placeholder="نام حوله">
                  </div>
                  <div class="input-group" style="width: 100%;padding: 10px">
                    <div id="picture" style="width: 100%;margin: 5px auto;">
                      @if($selectedtowel->image!=null)
                        <a onclick="deletemainImage()">
                          <i class="fa fa-times btn btn-danger btn-lg"></i>
                        </a><img style="width: 50%" src="{{$selectedtowel->image}}" />
                      @endif
                    </div>
                    <button type="button" class="browse btn btn-primary" id="imageUpload" style="width: 100%;padding: 10px;margin: auto" > انتخاب تصویر </button>
                    <input  type="text" value="{{$selectedtowel->image}}" hidden name="mainImage" style="width: 100%;height: 100%" id="featured_image" placeholder="آدرس تصویر" readonly  />

                  </div>

                  <label class="box-title" id="category_title">دسته بندی ها</label>
                  <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                      @foreach($categories as $category)
                        @if($category->english_name=='gift-towel'||$category->english_name=='promotional-towel')

                        <li>
                          <a>{{$category->name}}
                            <div class="material-switch pull-left">
                              <input name="cat{{$category->id}}" id="cat{{$category->id}}" @if($selectedtowel->hasCategory($category->id)) checked @endif type="checkbox" class="categories"/>
                              <label for="cat{{$category->id}}" class="label-info"></label>
                            </div>
                          </a>
                        </li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-success" style="width: 100%">ثبت</button>
                </div>
              </form>
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
              <h3 class="box-title">محصولات</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <form action="{{route('towels.search')}}" method="get">
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

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد حوله</th>
                    <th class="mailbox-star">نام حوله</th>
                    <th class="mailbox-name">دسته بندی</th>
                    <th class="mailbox-name">تصویر</th>
                    <th class="mailbox-subject">ویرایش</th>
                    <th class="mailbox-subject">حذف</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($products as $product)
                    @foreach($product->categories as $category)
                      @if($category->english_name=='gift-towel'||$category->english_name=='promotional-towel')
                        <tr>
                          <td class="mailbox-star">{{$product->id}}</td>
                          <td class="mailbox-star"><a> {{$product->name}}</a></td>
                          <td class="mailbox-name">{{$category->name}}</td>
                          <td class="mailbox-name"><img src="{{$product->image}}" style="width: 30px;"></td>
                          <td class="mailbox-subject"><a href="{{route('towels.edit',['towel' => $product->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                          <td class="mailbox-subject">
                            <form action="{{route('towels.destroy',['towel'=>$product->id])}}" method="post">
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
