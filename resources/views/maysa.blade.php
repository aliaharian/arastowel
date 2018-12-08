<!DOCTYPE html>
<html lang="fa">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ========== Title ========== -->
    <title> حوله مایسا - خرید اینترنتی پک حوله های مایسا در رنگ ها و طرح عای متنوع</title>
    <!-- ========== Favicon Ico ========== -->
    <link rel="icon" href="https://statics.arastowel.com/maysa/img/maysam2.png">
    <!-- ========== STYLESHEETS ========== -->
    <!-- Bootstrap CSS -->
    <link href="https://statics.arastowel.com/maysa/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts Icon CSS -->
    <link href="https://statics.arastowel.com/maysa/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/maysa/css/et-line.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/maysa/css/ionicons.min.css" rel="stylesheet">
    <!-- Carousel CSS -->
    <link href="https://statics.arastowel.com/maysa/css/slick.css" rel="stylesheet">
    <!-- Magnific-popup -->
    <link rel="stylesheet" href="https://statics.arastowel.com/maysa/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://statics.arastowel.com/maysa/css/animate.min.css">
    <!-- Custom styles for this template -->
    <link href="https://statics.arastowel.com/maysa/css/main.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="loader">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<div class="body-container container-fluid">
    <a class="menu-btn" href="javascript:void(0)">
        <i class="fa fa-area-chart"></i>
    </a>
    <div class="row justify-content-center">
        <!--=================== side menu ====================-->
        <div class="col-lg-2 col-md-3 col-12 menu_block">

            <!--logo -->
            <div class="logo_box">
                <a title="حوله مایسا" href="#">
                    <img src="https://statics.arastowel.com/maysa/img/maysam2.png" alt="حوله مایسا" width="150px">
                </a>
            </div>
            <!--logo end-->


            <!--social and copyright -->
            <div class="side_menu_bottom">
                <div class="side_menu_bottom_inner">
                    <ul class="social_menu">
                        <li>
                            <a href="#"> <i class="fa fa-pinterest"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-facebook"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa fa-twitter"></i> </a>
                        </li>
                        <li>
                            <a title="اینستاگرام مایسا" href="https://instagram.com/maysatowel" target="_blank"> <i class="fa fa-instagram"></i> </a>
                        </li>
                    </ul>
                    <div class="copy_right">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script><br> All rights reserved <br> Arastowel.com/maysatowel</p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
            <!--social and copyright end -->

        </div>
        <!--=================== side menu end====================-->

        <!--=================== content body ====================-->
        <div class="col-lg-10 col-md-9 col-12 body_block  align-content-center">
            <!--=================== filter portfolio start====================-->







            <div class="portfolio gutters grid img-container">
                <div class="grid-sizer col-sm-12 col-md-6 col-lg-3"></div>
            @php
                $url = 'https://www.instagram.com/explore/tags/maysatowel/?__a=1';
                $JSON = file_get_contents($url);

                $data = json_decode($JSON);
                    $data2=$data->graphql->hashtag->edge_hashtag_to_media->edges;
            @endphp
            <!-- Block4 -->
                @php $i=0 @endphp
                @foreach ($data2 as $datas)
                    @if($i<12)
                <div class="grid-item branding  col-sm-12 col-md-6 col-lg-3">
                    <a href="{{$datas->node->thumbnail_src}}" title="@php
                        $captions=$datas->node->edge_media_to_caption->edges;
                    @endphp
                    @foreach($captions as $caption)
                    {{$caption->node->text}}
                    @endforeach">
                        <div class="project_box_one">
                            <img src="{{$datas->node->thumbnail_src}}" alt="@php
                                $captions=$datas->node->edge_media_to_caption->edges;
                            @endphp
                            @foreach($captions as $caption)
                            {{$caption->node->text}}
                            @endforeach" />
                            <div class="product_info">
                                <div class="product_info_text">
                                    <div class="product_info_text_inner">
                                        <i class="fa fa-plus"></i>
                                        <h4>@php
                                                $captions=$datas->node->edge_media_to_caption->edges;
                                            @endphp
                                            @foreach($captions as $caption)
                                                {{$caption->node->text}}
                                            @endforeach
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                        @php $i = $i+1 @endphp
                    @endif
                @endforeach





            </div>
            <!--=================== filter portfolio end====================-->




        </div>
        <!--=================== content body end ====================-->
    </div>

    <div class="c-footer__more-info">
        <div class="container">
            <div class="c-footer__description-content">
                <div class="c-footer__content">
                    <article class="c-footer__seo">
                        <h1>برند حوله ارس ، تولیدکننده انواع حوله تن پوش ، حوله دست و صورت ، حوله حمام، حوله استخری ، پالتویی و ...</h1>
                        <p>
                        <span class="c-footer__seo--content" id="seo-main-content">
                            کیفیت ‌، لطافت ، زیبایی!
                            <br>
                            افتخار داریم که ، لذت زیبایی را به شما تقدیم می داریم.
                           <br>
                            بهترین ها را به شما هدیه می کنیم ، شما نیز آن را به بهترین دوستانتان هدیه دهید.
                            جهت مشاهده انواع<a title="حوله ارس" href="{{route('index')}}">حوله های ارس</a> ، <a title="حوله رزا" href="{{route('roza')}}">رزا</a> ، <a title="حوله مایسا" href="{{route('maysa')}}">مایسا</a> و <a title="حوله انارگل" href="{{route('anargol')}}">انارگل</a> به بخش<a href="{{route('shop')}}">فروشگاه</a>
                            مراجعه کنید.
                            </span>
                            <span class="c-footer__seo-readmore display-none" id="js-footer-readmore-content">
                            <br>
ما ترکیبی از هنر ، تخصص ، لطافت و آرامش را در
                            <a href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله های تن پوش</a>
                            و
                            <a href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">پالتویی ارس</a>
                            ،
                            <a href="{{route('shop.category', ['category' => 'kids-towel'])}}">حوله کودک</a>
                            ،
                             <a href="{{route('shop.category', ['category' => 'promotional-towel'])}}">حوله های تبلیغاتی</a>
                            و
                            <a href="{{route('shop.category', ['category' => 'gift-towel'])}}">هدیه</a>
                            و
                            همچنین
                            <a href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله های ابعادی</a>
                            که شامل حوله استخری ، حوله دست و صورت یا به اصطلاح حوله دستی و حوله حمامی می شود ، همراه با تضمین کیفیت ، تنوع طرح ، تنوع و ثبات رنگ برای شما به ارمغان آوردیم.
                        </span>
                            <a style="cursor: pointer" id="js-footer-readmore" onclick="show()">مشاهده بیشتر</a>
                            <br>
                            <a href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله تن پوش</a> |
                            <a href="{{route('shop.category', ['category' => 'kids-towel'])}}">حوله کودک</a> |
                            <a href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله دست و صورت</a> |
                            <a href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله استخری</a> |
                            <a href="{{route('gift-pack')}}">حوله هدیه</a> |
                            <a href="{{route('promotional-towels')}}">حوله تبلیغاتی</a> |
                            <a href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله حمام</a> |
                            <a href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله پالتویی</a>
                        </p>
                    </article>
                </div>
            </div>

        </div>
    </div>
    <div class="fake"></div>
    <script>
        var a=0;
        function show() {
            $('#js-footer-readmore-content').toggleClass('display-none');
            if(a===0){
                $('#js-footer-readmore').html('بستن');

                a=1;
            }else{
                $('#js-footer-readmore').html('مشاهده بیشتر');

                a=0;
            }

        }
    </script>
</div>



<!-- jquery -->
<script src="https://statics.arastowel.com/maysa/js/jquery.min.js"></script>
<!-- bootstrap -->
<script src="https://statics.arastowel.com/maysa/js/popper.js"></script>
<script src="https://statics.arastowel.com/maysa/js/bootstrap.min.js"></script>
<script src="https://statics.arastowel.com/maysa/js/waypoints.min.js"></script>
<!--slick carousel -->
<script src="https://statics.arastowel.com/maysa/js/slick.min.js"></script>
<!--Portfolio Filter-->
<script src="https://statics.arastowel.com/maysa/js/imgloaded.js"></script>
<script src="https://statics.arastowel.com/maysa/js/isotope.js"></script>
<!-- Magnific-popup -->
<script src="https://statics.arastowel.com/maysa/js/jquery.magnific-popup.min.js"></script>
<!--Counter-->
<script src="https://statics.arastowel.com/maysa/js/jquery.counterup.min.js"></script>
<!-- WOW JS -->
<script src="https://statics.arastowel.com/maysa/js/wow.min.js"></script>
<!-- Custom js -->
<script src="https://statics.arastowel.com/maysa/js/main.js"></script>
</body>
</html>