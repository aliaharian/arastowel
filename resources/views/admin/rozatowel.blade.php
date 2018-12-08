<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--
    Document Title
    =============================================
    -->
    <title>ویرابش صفحه ی رزا</title>
    <style>
        @media (max-width:640px) {
            #home {
                background-attachment:initial!important;
                background-position: center!important;
                background-repeat: no-repeat!important;
                background-size: cover!important;
            }
        }
        .work-caption {
            width: 100%!important;
            padding: 0 20px!important;
            opacity: 1!important;
            position: absolute!important;
            bottom: 50%!important;
            z-index: 3!important;
            -webkit-transform: translateY(50%)!important;
            -ms-transform: translateY(50%)!important;
            transform: translateY(50%)!important;
            left: 0!important;
            text-align: center!important;
            overflow: scroll!important;
            
        }
         .work-image:after {
            background: rgba(0, 0, 0, 0.3)!important;
        }
        .work-item:hover .work-caption {
            width: 100%!important;
            padding: 0 20px!important;
            opacity: 1!important;
            position: absolute!important;
            bottom: 50%!important;
            z-index: 3!important;
            -webkit-transform: translateY(50%)!important;
            -ms-transform: translateY(50%)!important;
            transform: translateY(50%)!important;
            left: 0!important;
            text-align: center!important;
            overflow: scroll!important;
        }


    </style>

    <!--
    Stylesheets
    =============================================

    -->
    <!-- Default stylesheets-->
    <link href="https://statics.arastowel.com/roza/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/animate.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/et-line-font.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/flexslider.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/owl.carousel.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/owl.theme.default.min.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/magnific-popup.css" rel="stylesheet">
    <link href="https://statics.arastowel.com/roza/css/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="https://statics.arastowel.com/roza/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="https://statics.arastowel.com/roza/css/default.css" rel="stylesheet">

    <style>
        .displayblock{
            display: block;
        }
    </style>
</head>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
<main>
    <div class="page-loader">
        <div class="loader">Loading...</div>
    </div>
    <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse" onclick="menu()">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="https://statics.arastowel.com/roza/images/roza.png" style="width: 78px;"></a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="" href="#home" onclick="menu()">Home</a></li>
                    <li><a class="" href="#portfolio" onclick="menu()">Our Works</a></li>
                    <li><a class="" href="#about" onclick="menu()">About Us</a></li>
                    <li><a class="" href="#contact" onclick="menu()">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="{{route('roza.edit')}}" method="post">
        {{csrf_field()}}
    @foreach($roza as $roza_content)
        @if($roza_content->position=='main_image')
    <section class="home-section bg-dark-60 portfolio-page-header parallax-bg" id="home" style="background-image: url({{$roza_content->image}})">
        <div class="titan-caption">
            <div class="caption-content">
                <div class="font-alt mb-30 titan-title-size-1"><input type="text" name="main_image_upper_text" style="color: black" value="{!!$roza_content->upper_text!!}"></div>
                <div class="font-alt mb-40 titan-title-size-4"><input type="text" name="main_image_lower_text" style="color: black" value="{!!$roza_content->lower_text!!}"></div>
                <div id="main_image_picture" style="width: 200px;margin: 5px auto;"></div>

                <button type="button" class="btn btn-border-w btn-round" style="letter-spacing: 0" id="main_image_change">تغییر عکس پس زمینه</button>
                <input  type="text" hidden name="main_image_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="main_image_link" placeholder="آدرس تصویر" readonly  />

            </div>
        </div>
    </section>
        @endif
    @endforeach
    <div class="main">
        <section class="module" id="portfolio">
            <div class="container">
                <div class="col-sm-6 col-sm-offset-3">
                    <h2 class="module-title font-alt">Our Works</h2>
                    <div class="module-subtitle font-serif"></div>
                </div>
                <div class="row">
                    <!--<div class="col-sm-12">-->
                    <!--<ul class="filter font-alt" id="filters">-->
                    <!--<li><a class="current wow fadeInUp"  data-filter="*">All</a></li>-->
                    <!--<li><a class="wow fadeInUp"  data-filter=".illustration" data-wow-delay="0.2s">Illustration</a></li>-->
                    <!--<li><a class="wow fadeInUp"  data-filter=".marketing" data-wow-delay="0.4s">Marketing</a></li>-->
                    <!--<li><a class="wow fadeInUp"  data-filter=".photography" data-wow-delay="0.6s">Photography</a></li>-->
                    <!--<li><a class="wow fadeInUp"  data-filter=".webdesign" data-wow-delay="0.6s">Web Design</a></li>-->
                    <!--</ul>-->
                    <!--</div>-->
                </div>
                <ul class="works-grid works-grid-masonry works-grid-3 works-hover-d" id="works-grid">
                    @foreach($roza as $roza_content)
                        @if($roza_content->position=='img_1')
                    <li class="work-item illustration webdesign">
                            <div class="work-image" id="img_1_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text"  name="img_1_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                               متن: <div class="work-descr"><input type="text"  name="img_1_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                               لینک: <div class="work-descr"><input type="text" name="img_1_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_1_change" class="btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_1_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_1_link" placeholder="آدرس تصویر" readonly  />

                            </div>
                    </li>
                        @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_2')
                    <li class="work-item marketing photography">
                        <div class="work-image" id="img_2_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                        <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_2_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_2_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_2_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                            <button type="button" id="img_2_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                            <input  type="text" hidden name="img_2_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_2_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                        @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_3')
                    <li class="work-item illustration photography">
                        <div class="work-image" id="img_3_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_3_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_3_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_3_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_3_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_3_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_3_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_4')
                    <li class="work-item marketing photography">
                        <div class="work-image" id="img_4_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_4_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_4_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_4_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_4_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_4_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_4_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_5')
                    <li class="work-item illustration webdesign">
                        <div class="work-image" id="img_5_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_5_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_5_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_5_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_5_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_5_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_5_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_6')
                    <li class="work-item marketing webdesign">
                        <div class="work-image" id="img_6_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_6_upper_text"   style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_6_lower_text"  style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text"  name="img_6_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_6_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_6_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_6_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                       </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_7')
                    <li class="work-item marketing webdesign">
                        <div class="work-image" id="img_7_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_7_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_7_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_7_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_7_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_7_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_7_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_8')
                    <li class="work-item marketing">
                        <div class="work-image" id="img_8_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_8_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_8_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_8_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_8_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_8_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_8_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_9')
                    <li class="work-item illustration photography">
                        <div class="work-image" id="img_9_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input type="text" name="img_9_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input type="text" name="img_9_lower_text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input type="text" name="img_9_link_text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_9_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_9_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_9_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_10')
                    <li class="work-item illustration marketing">
                        <div class="work-image" id="img_10_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input name="img_10_upper_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input name="img_10_lower_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input name="img_10_link_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_10_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_10_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_10_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                            @endif
                    @endforeach
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='img_11')
                    <li class="work-item illustration webdesign">
                        <div class="work-image" id="img_11_picture"><img src="{{$roza_content->image}}" alt="Portfolio Item"/></div>
                            <div class="work-caption font-alt" style="color: white">
                                عنوان:<h3 class="work-title"><input name="img_11_upper_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h3>
                                متن: <div class="work-descr"><input name="img_11_lower_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->lower_text!!}"></div>
                                لینک: <div class="work-descr"><input name="img_11_link_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->link!!}"></div>
                                <button type="button" id="img_11_change" class=" btn btn-border-w btn-round" style="letter-spacing: 0"> {!! $roza_content->size !!}  تغییر عکس پس زمینه با با ابعاد :</button>
                                <input  type="text" hidden name="img_11_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="img_11_link" placeholder="آدرس تصویر" readonly  />
                            </div>
                        </li>
                        @endif
                    @endforeach

                </ul>
            </div>
        </section>
        <section class="module-small bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text-center">
                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='contact_us')
                        <h4 class="font-alt mb-20"><input type="text" name="contact_us_upper_text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h4><a class="btn btn-border-w " href="#contact">Contact Us</a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="module" id="about">
            <div class="container">
                <div class="row">
                    @foreach($roza as $roza_content)
                        @if($roza_content->position=='about_main')
                    <div class="col-sm-6 col-sm-offset-3">
                        <h2 class="module-title font-alt"><input name="about_main_upper_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></h2>
                        <div class="module-subtitle font-serif"><textarea name="about_main_lower_text" style="color: black;width: 100%;"> {!!$roza_content->lower_text!!}</textarea></div>
                    </div>
                        @endif
                    @endforeach
                </div>
                <div class="row multi-columns-row post-columns">
                    @foreach($roza as $roza_content)
                        @if($roza_content->position=='about_1')
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="post mb-20">
                                    <div class="post-thumbnail"><a id="about_1_change"><span id="about_1_picture"><img  src="{{$roza_content->image}}" alt="Blog-post Thumbnail"/></span></a></div>
                                    <input  type="text" hidden name="about_1_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="about_1_link" placeholder="آدرس تصویر" readonly  />

                                    <div class="post-header font-alt">
                                        <h2 class="post-title"><a><input name="about_1_upper_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></a></h2>

                                    </div>
                                    <div class="post-entry">
                                        <textarea name="about_1_lower_text" style="color: black;width: 100%;height: 300px"> {!!$roza_content->lower_text!!}</textarea>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='about_2')
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="post mb-20">
                                        <div class="post-thumbnail"><a id="about_2_change"><span id="about_2_picture"><img  src="{{$roza_content->image}}" alt="Blog-post Thumbnail"/></span></a></div>
                                        <input  type="text" hidden name="about_2_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="about_2_link" placeholder="آدرس تصویر" readonly  />

                                        <div class="post-header font-alt">
                                            <h2 class="post-title"><a><input name="about_2_upper_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></a></h2>

                                        </div>
                                        <div class="post-entry">
                                            <textarea name="about_2_lower_text" style="color: black;width: 100%;height: 300px"> {!!$roza_content->lower_text!!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        @foreach($roza as $roza_content)
                            @if($roza_content->position=='about_3')
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="post mb-20">
                                        <div class="post-thumbnail"><a id="about_3_change"><span id="about_3_picture"><img  src="{{$roza_content->image}}" alt="Blog-post Thumbnail"/></span></a></div>
                                        <input  type="text" hidden name="about_3_link" style="width: 100%;height: 100%" value="{{$roza_content->image}}" id="about_3_link" placeholder="آدرس تصویر" readonly  />

                                        <div class="post-header font-alt">
                                            <h2 class="post-title"><a><input name="about_3_upper_text" type="text" style="color: black;width: 100%;" value="{!!$roza_content->upper_text!!}"></a></h2>

                                        </div>
                                        <div class="post-entry">
                                            <textarea name="about_3_lower_text" style="color: black;width: 100%;height: 300px"> {!!$roza_content->lower_text!!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                </div>
            </div>
        </section>

        <div class="row">

            <div class="col-sm-5"></div>
            <div class="col-sm-2">        <input type="submit" class="btn btn-success" value="ثبت تغییرات" style="width:100%;letter-spacing: 0;margin: 30px auto;text-align:center;height: 50px;font-size: 18px">
            </div>
            <div class="col-sm-5"></div>
        </div>
    </div>
    </form>



        <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </div>
</main>
<!--
JavaScripts
=============================================
-->
<script src="https://statics.arastowel.com/roza/js/jquery.js"></script>
<script src="https://statics.arastowel.com/roza/js/bootstrap.min.js"></script>
<script src="https://statics.arastowel.com/roza/js/wow.js"></script>
<script src="https://statics.arastowel.com/roza/js/jquery.mb.YTPlayer.js"></script>
<script src="https://statics.arastowel.com/roza/js/isotope.pkgd.js"></script>
<script src="https://statics.arastowel.com/roza/js/imagesloaded.pkgd.js"></script>
<script src="https://statics.arastowel.com/roza/js/jquery.flexslider.js"></script>
<script src="https://statics.arastowel.com/roza/js/owl.carousel.min.js"></script>
<script src="https://statics.arastowel.com/roza/js/smoothscroll.js"></script>
<script src="https://statics.arastowel.com/roza/js/jquery.magnific-popup.js"></script>
<script src="https://statics.arastowel.com/roza/js/jquery.simple-text-rotator.min.js"></script>
<script src="https://statics.arastowel.com/roza/js/plugins.js"></script>
<script src="https://statics.arastowel.com/roza/js/main.js"></script>

<script>
    function menu() {
        $('#custom-collapse').toggleClass('displayblock');
    }
</script>
<script type="text/javascript" src="https://statics.arastowel.com/js/jquery.popupWindow.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#main_image_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/main',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain=function (file){
            $('#main_image_picture').html('<img style="width: 100%" src="' + file + '" /> ');
            $('#main_image_link').val(file);
        }
    });

    //////////////////
    $(document).ready(function(){

        $('#img_1_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img1',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg1=function (file){
            $('#img_1_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_1_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_2_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img2',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg2=function (file){
            $('#img_2_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_2_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_3_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img3',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg3=function (file){
            $('#img_3_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_3_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_4_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img4',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg4=function (file){
            $('#img_4_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_4_link').val(file);
        }
    });

    /////////////////////////
    $(document).ready(function(){

        $('#img_5_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img5',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg5=function (file){
            $('#img_5_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_5_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_6_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img6',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg6=function (file){
            $('#img_6_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_6_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_7_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img7',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg7=function (file){
            $('#img_7_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_7_link').val(file);
        }
    });

    /////////////////////////
    $(document).ready(function(){

        $('#img_8_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img8',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg8=function (file){
            $('#img_8_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_8_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_9_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img9',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg9=function (file){
            $('#img_9_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_9_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_10_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img10',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg10=function (file){
            $('#img_10_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_10_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#img_11_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/img11',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackimg11=function (file){
            $('#img_11_picture').html('<img src="'+file+'" alt="Portfolio Item"/>');
            $('#img_11_link').val(file);
        }
    });



    //////////////////
    $(document).ready(function(){

        $('#about_1_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/about1',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackabout1=function (file){
            $('#about_1_picture').html('<img  src="'+file+'" alt="Blog-post Thumbnail"/>');
            $('#about_1_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#about_2_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/about2',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackabout2=function (file){
            $('#about_2_picture').html('<img  src="'+file+'" alt="Blog-post Thumbnail"/>');
            $('#about_2_link').val(file);
        }
    });
    /////////////////////////
    $(document).ready(function(){

        $('#about_3_change').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/about3',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackabout3=function (file){
            $('#about_3_picture').html('<img  src="'+file+'" alt="Blog-post Thumbnail"/>');
            $('#about_3_link').val(file);
        }
    });
    </script>
</body>
</html>