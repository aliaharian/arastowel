<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<link rel="icon" type="image/png" href="https://statics.arastowel.com/images/icons/favicon.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/slick/slick.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/css/util.css">
<link rel="stylesheet" type="text/css" href="/css/main.css">
<link rel="stylesheet" type="text/css" href="https://statics.arastowel.com/css/ajax-cart.css">
<!--===============================================================================================-->
{{--favicons--}}
<link rel="apple-touch-icon" sizes="57x57" href="https://statics.arastowel.com/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://statics.arastowel.com/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://statics.arastowel.com/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://statics.arastowel.com/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://statics.arastowel.com/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://statics.arastowel.com/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://statics.arastowel.com/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://statics.arastowel.com/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://statics.arastowel.com/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="https://statics.arastowel.com/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://statics.arastowel.com/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://statics.arastowel.com/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://statics.arastowel.com/images/favicon-16x16.png">
<link rel="manifest" href="https://statics.arastowel.com/images/manifest.json">
<meta name="msapplication-TileColor" content="#951a82">
<meta name="msapplication-TileImage" content="https://statics.arastowel.com/images/ms-icon-144x144.png">
<meta name="theme-color" content="#951a82">



<meta name="msapplication-navbutton-color" content="#951a82">
<meta name="apple-mobile-web-app-status-bar-style" content="#951a82">

<meta name="format-detection" content="telephone=no">

<!-- Add to Home Screen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Aras Towel">

<!-- Touch Icons -->
<link rel="apple-touch-icon" href="https://statics.arastowel.com/images/apple-icon-57x57.pngg">
<link rel="apple-touch-icon-precomposed" href="https://statics.arastowel.com/images/apple-icon-57x57.png">
<!-- In most cases, one 180×180px touch icon in the head is enough -->
<!-- If you use art-direction and/or want to have different content for each device, you can add more touch icons -->

<!-- Startup Image -->
<link rel="apple-touch-startup-image" href="https://statics.arastowel.com/images/apple-icon-57x57.png">
<link rel="mask-icon" href="https://statics.arastowel.com/images/apple-icon-57x57.png" color="#951a82">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Add to homescreen -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="google" value="notranslate">






<script>
    function deleteorder(id) {
        {{--delete pre order--}}
                $body = $("body");
                console.log('aaa');
                var pre_order_id = id;
                $(document).on({
                    ajaxStart: function () {
                        $body.addClass("loading");
                    },
                    ajaxStop: function () {
                        $body.removeClass("loading");
                    }
                });

                jQuery.ajax({

                        url: "{{ route('deleteFromCart') }}",
                        method: 'get',
                        data: {
                            pre_order_id: pre_order_id
                        },
                        success: function (response) {
                            // What to do if we succeed
                            $('.header-wrapicon2 ').html(response);
                        }
                    }
                );
                swal("محصول مورد نظر", "با موفقیت از سبد خرید حذف شد", "warning");

    }


</script>


@php date_default_timezone_set("Asia/Tehran") @endphp