<!DOCTYPE html>
<html>
<head>
  <title> بلاگ | حوله رزا</title>

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
        بلاگ
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> بلاگ</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('blog.create')}}" class="btn btn-primary btn-block margin-bottom">افزودن نوشته جدید</a>

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
                <li><a href="{{route('blog.index')}}"><i class="fa fa-inbox"></i> همه نوشته ها
                <li><a href="{{route('blog.type',['type'=>1])}}"><i class="fa fa-envelope-o"></i> منتشر شده</a></li>
                <li><a href="{{route('blog.type',['type'=>0])}}"><i class="fa fa-file-text-o"></i> پیش نویس</a></li>
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
              <h3 class="box-title">نوشته ها</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <form action="{{route('blog.search')}}" method="get">
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
                {{$posts->links()}}

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد نوشته</th>
                    <th class="mailbox-star">عنوان</th>
                    <th class="mailbox-name">تصویر</th>
                    <th class="mailbox-name">تاریخ انتشار</th>
                    <th class="mailbox-subject">وضعیت</th>
                    <th class="mailbox-subject">نویسنده</th>
                    <th class="mailbox-subject">ویرایش</th>
                    <th class="mailbox-subject">حذف</th>

                  </tr>
                  </thead>

                  <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <td class="mailbox-star">{{$post->id}}</td>
                    <td class="mailbox-star"><a target="_blank" href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}"> {{$post->title}}</a></td>
                    <td class="mailbox-name"><img src="{{$post->image}}" style="width: 30px"></td>
                    <td class="mailbox-name"><span>@if($post->published==1){{$post->persian_date}} @else منتشر نشده@endif </span></td>
                    <td class="mailbox-subject">@if($post->published==1)منتشر شده@else <span style="color: darkred;font-weight: bold;">پیش نویس</span>@endif</td>
                    <td class="mailbox-subject">{{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}</td>
                    <td class="mailbox-subject"><a href="{{route('blog.edit',['blog' => $post->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                    <td class="mailbox-subject">
                      <form action="{{route('blog.destroy',['blog'=>$post->id])}}" method="post">
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
                {{$posts->links()}}

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
