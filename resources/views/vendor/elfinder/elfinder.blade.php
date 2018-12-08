<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>elFinder 2.0</title>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="/panel-admin/js/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/elfinder.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset($dir.'/css/theme.css') }}">

        <!-- elFinder JS (REQUIRED) -->
        <script src="{{ asset($dir.'/js/elfinder.min.js') }}"></script>

        @if($locale)
            <!-- elFinder translation (OPTIONAL) -->
            <script src="{{ asset($dir."/js/i18n/elfinder.$locale.js") }}"></script>
        @endif

        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            // Documentation for client options:
            // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
            $().ready(function() {
                $('#elfinder').elfinder({
                    // set your elFinder options here
                    @if($locale)
                        lang: '{{ $locale }}', // locale
                    @endif
                    customData: {
                        _token: '{{ csrf_token() }}'
                    },
                    url : '{{ route("elfinder.connector") }}',  // connector URL
                    soundPath: '{{ asset($dir.'/sounds') }}'
                });
            });
        </script>
        @include('admin.includes.headerLinks')

    </head>
    <body>
    <div class="wrapper">
    @include('admin.includes.header')
    @include('admin.includes.aside')
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    مدیریت فایل ها
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                    <li class="active">مدیریت فایل ها</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
        <!-- Element where elFinder will be created (REQUIRED) -->

        <div id="elfinder"></div>
                    </div>
                </div>
            </section>
        </div>
    @include('admin.includes.footer')

    <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>

    <script src="/panel-admin/js/bootstrap.min.js"></script>

    <script src="/panel-admin/js/adminlte.min.js"></script>

    <script src="/panel-admin/js/pages/dashboard2.js"></script>

    <script src="/panel-admin/js/demo.js"></script>
<script>
    $(document).ready(function() {
        $('#elfinder').elfinder({
            cssAutoLoad : ['elfinder/Material/css/theme.css'], // Array of additional CSS URLs
            url : 'php/connector.php' , // connector URL (REQUIRED)
            lang: 'fa'                         // auto detected language (optional)

        });
    });
</script>

    </body>
</html>
