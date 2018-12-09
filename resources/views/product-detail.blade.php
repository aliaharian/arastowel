<!DOCTYPE html>
<html lang="fa">
<head>
    <title>مشخصات ، قیمت و خرید
    {{$product->name}}
         | فروشگاه اینترنتی حوله ارس
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @include('includes.headLinks')
    {{--seo content--}}

    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
    <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" /><meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:title" content="{{$product->name}}" />
    <meta property="og:url" content="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}" />
    <meta property="og:image" content="{{$product->image}}" />
    <meta property="og:image:secure_url" content="{{$product->image}}" />
    <meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
    <meta property="og:image" content="{{$product->image}}">
    <meta property="og:image:width" content="720">
    <meta property="og:image:height" content="960">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:alt" content="{{$product->name}}" />

    <link rel="image_src" href="{{$product->image}}" />
    <meta property="og:type" content="product" />
    <meta property="article:section" content=" @foreach($product->categories as $category){{$category->name}}@endforeach" />
    <meta property="article:published_time" content="{{$product->created_at}}" />
    <meta property="article:modified_time" content="{{$product->updated_at}}" />
    <meta property="og:updated_time" content="{{$product->updated_at}}" />

    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@ArasTowel" />
    <meta name="twitter:title" content="{{$product->name}}" />
    <meta name="twitter:image" content="{{$product->image}}" />

    <meta http-equiv="content-language" content="fa" />
    <meta name="apple-mobile-web-app-capable" content="yes"/>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <meta name="DC.Identifier" content="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}"/>
    <meta name="DC.Type" content="image"/>
    <meta name="DC.Title" content="{{$product->name}}"/>
    <meta name="DC.Language" content="fa"/>

    <meta name="robots" content="index, follow"/>

    {{--seo content--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body class="animsition loading">




<input id="variable" value="{{$product->variable}}" hidden>
<input id="productId" value="{{$product->id}}" hidden>
<input id="productQty" value="{{$product->qty}}" hidden>
@include('includes.header')
@if($product->published!=1)
    <h1 class="text-center alert alert-danger">
        این محصول وجود ندارد یا هنوز منتشر نشده
    </h1>

    @else

<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="background-color: #f2f2f2;
padding-top: 5px;
padding-bottom: 5px;
margin: 0 38px 0 50px;">
    <a title="صفحه اصلی" href="{{route('index')}}" class="s-text16">
        صفحه اصلی
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>

    <a title="فروشگاه حوله ارس" href="{{route('shop')}}" class="s-text16">
        فروشگاه
        <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
    </a>
    @foreach($product->categories as $category)
        <a title="{{$category->name}}" href="{{route('shop.category', ['category' => $category->english_name])}}" class="s-text16">
            {{$category->name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>
        @php $categoryname=$category->name @endphp
    @endforeach

    <span class="s-text17">
			{{$product->name}}
		</span>
</div>

<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>

                <div class="slick3">

                    <div class="item-slick3 mainimagethumb" data-thumb="{{$product->image}}">
                        <div class="wrap-pic-w">
                            <img src="{{$product->image}}" alt="{{$product->name}}" class="mainimage">
                        </div>
                    </div>


                    @foreach($product->galleries as $gallery)
                        <div class="item-slick3" data-thumb="{{$gallery->address}}"
                             onclick="changeimage('{{$gallery->address}}')">
                            <div class="wrap-pic-w">
                                <img src="{{$gallery->address}}" alt="{{$product->name}}">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="w-size14 p-t-30 respon5" style="text-align: right">
            <h4 class="product-detail-name m-text16 p-b-13" style="text-align: right;font-size: 30px;">
                {{$product->name}}

            </h4>
            @if($product->qty!=0)
                @if($product->variable!=2)
                    <span class="m-text17" style="display: inline-block">
					@php $hasoff=0 @endphp
                        @if($product->off->count()>0)
                            @foreach($product->off as $off)
                                @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                                    @php $percent=100-$off->percent; $newprice=$product->price*$percent/100;  @endphp

                                    <span style="color: purple;"> {{number_format(($newprice))}}</span>
                                    <span style="display: inherit">تومان</span>


                                    <span style="text-decoration: line-through;"> {{number_format($product->price)}}</span>
                                    <span style="display: inherit">تومان</span>

                                    @php $hasoff=1 @endphp
                                @endif
                            @endforeach
                        @endif

                        @if($hasoff==0)
                            <span style="display: inherit;">تومان</span>

                            <span> {{number_format($product->price)}}</span>

                            <span id="here"> </span>

                        @endif

				</span>
                @else
                    <span class="m-text10" id="variable_price">
						برای مشاهده قیمت، سایز مورد نظر خود را انتخاب کنید
				</span>
                @endif
            @else
                <span class="m-text10">
						ناموجود
				</span>
            @endif
            <br><br>
            <br><br>
            <p class="s-text8 p-t-10">
                {!! $product->short_description !!}
            </p>

            <!--  -->
            <div class="p-t-33 p-b-60">
                @if($product->variable!=0)
                    <div class="flex-m flex-w p-b-10" style="direction: rtl">
                        <div class="s-text15 w-size15 t-center">
                            رنگ
                        </div>

                        <div class="rs2-select2 rs3-select2 of-hidden w-size16">
                            @foreach($product->color as $color)
                                @foreach($colors as $selectedcolor)
                                    @if($selectedcolor->product_id==$product->id && $selectedcolor->color_id==$color->id)
                                        @php $selectedcolorImage=$selectedcolor->image @endphp
                                    @endif
                                @endforeach
                                <label class="c-ui-variant c-ui-variant--color colorpicker"
                                       data-code="{{$color->english_name}}" id="color{{$color->id}}"
                                       onclick="hilightcolor(this.id); changeimage('{{$selectedcolorImage}}'); isvalid();">
                                    <span class="c-ui-variant__shape"
                                          style="
                                          @if($color->image!=null)
                                                  background-image:url({{$color->image}});
                                                  background-position: center;
                                                  background-size: cover;
                                                  background-repeat: no-repeat;
                                          @else
                                                  background-color:{{$color->english_name}}
                                          @endif
                                                  "></span>

                                    <input type="radio" value="{{$color->id}}" name="color"
                                           class="js-variant-selector colors">
                                    <span class="c-ui-variant__check">{{$color->name}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($product->variable==2)
                    <div class="flex-m flex-w p-b-10" style="direction: rtl">
                        <div class="s-text15 w-size15 t-center">
                            سایز
                        </div>

                        <div class="rs2-select2 rs3-select2 of-hidden w-size16">
                            @foreach($product->size as $size)
                                <label class="c-ui-variant c-ui-variant--color sizepicker"
                                       data-code="{{$size->name}}" id="size{{$size->id}}"
                                       onclick="hilightsize(this.id); isvalid();">

                                    <input type="radio" value="{{$size->id}}" name="size"
                                           class="js-variant-selector sizes">
                                    <span class="c-ui-variant__check" style="padding-right: 17px;">{{$size->name}}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="flex-r-m flex-w p-t-10">
                    <div class="w-size16 flex-m flex-w" style="    width: 85%;">

                        @if($product->qty!=0)
                        <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" onclick="enable()">
                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                            </button>

                            <input class="size8 m-text18 t-center num-product" id="num-product" type="number" name="num-product"
                                   value="1" readonly>

                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" onclick="disable()">
                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                        @endif
                        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                            <!-- Button -->
                            @if($product->variable==0 && $product->qty!=0)
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addtocart">
                                    افزودن به سبد خرید
                                </button>
                            @elseif(($product->variable==1 || $product->variable==2) &&$product->qty!=0)
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addtocart displaynone">
                                    افزودن به سبد خرید
                                </button>
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addtocartfake">
                                    افزودن به سبد خرید
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-b-45">
                <span class="s-text8 m-l-35">کد محصول:{{$product->id}}</span>
                <span class="s-text8">دسته بندی:
                    @foreach($product->categories as $category)
                        <a title="{{$category->name}}" href="{{route('shop.category', ['category' => $category->english_name])}}"> {{$category->name}}</a>
                        &nbsp;
                    @endforeach
					</span>
            </div>

            <!--  -->
            @if($product->long_description!='')
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content" style="direction: rtl">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        توضیحات
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {!! $product->long_description !!}
                        </p>
                    </div>
                </div>
            @endif
            @if($product->info!='')

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14" style="direction: rtl;">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        اطلاعات اضافه
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {!! $product->info !!}
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                محصولات مرتبط
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($products as $relatedproduct)
                    @php $correct=0 @endphp
                    @foreach($relatedproduct->categories as $relatedcategory)
                        @if($relatedcategory->name==$categoryname)
                            @php $correct=1 @endphp
                        @endif
                    @endforeach
                    @if($relatedproduct->published==1&&$correct==1&&$relatedproduct->id!=$product->id)

                        <div class="item-slick2 p-l-15 p-r-15" style="direction: rtl">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                                    <img src="{{$relatedproduct->image}}" alt="{{$relatedproduct->name}}">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist fa fa-heart-o" aria-hidden="true"></i>
                                            <i class="icon-wishlist fa fa-heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <a href="{{route('shop.product',['product_id' => $relatedproduct->id , 'product_name'=>str_replace(' ','-',$relatedproduct->name)])}}"
                                               class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                خرید محصول
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20">
                                    <a title="{{$relatedproduct->name}}" href="product-detail.blade.php" class="block2-name dis-block s-text3 p-b-5 home-product-name">
                                        {{$relatedproduct->name}}
                                    </a>

                                    <span class="block2-price m-text6 p-r-5 home-product-price">
									@if($relatedproduct->qty!=0)
                                            @if($relatedproduct->variable!=2)
                                                {{number_format($relatedproduct->price)}} تومان
                                            @else

                                                @php $price=0 @endphp

                                                @foreach($sizes as $size)
                                                    @if($size->product_id==$relatedproduct->id)

                                                        @php $price=$size->price @endphp
                                                    @endif

                                                @endforeach
                                                {{number_format($price)}} تومان
                                            @endif
                                        @else
                                            ناموجود
                                        @endif
								</span>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach


            </div>
        </div>

    </div>
</section>
@endif

<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')
<script>
    function hilightcolor(id) {
        $('.colorpicker').removeClass('selected');
        $('#' + id).addClass('selected');
    }

    function hilightsize(id) {
        $('.sizepicker').removeClass('selected');
        $('#' + id).addClass('selected');
    }

    function changeimage(image) {
        if (image !== '') {
            $('.mainimage').prop('src', image);
            $('.mainimagethumb').attr('data-thumb', image);
            $('.slick3-dots li:first-child>img').prop('src', image);
            $('.slick3-dots li:first-child>img').click();
        }
    }

    function isvalid() {
        var variable = $('#variable').val();
        var colorCount = $('input.colors:checked').length;
        if (variable === '1') {
            if (colorCount > 0) {
                $('.addtocart').removeClass('displaynone');
                $('.addtocartfake').addClass('displaynone');

            }
        }
        else if (variable === '2') {
            var sizeCount = $('input.sizes:checked').length;
            if (colorCount > 0 && sizeCount > 0) {
                $('.addtocart').removeClass('displaynone');
                $('.addtocartfake').addClass('displaynone');

            }
        }
    }
    ////////////////////////////////////////////
    var size=0;
    jQuery(document).ready(function () {
        jQuery('.sizepicker').click(function (e) {
            $('input.sizes').each(function () {
                if ($(this).is(':checked')) {
                    size = this.value;
                }
            });

            $body = $("body");

            $(document).on({
                ajaxStart: function() { $body.addClass("loading");  },
                ajaxStop: function() { $body.removeClass("loading"); }
            });

            jQuery.ajax({

                    url: "{{ route('loadPrice') }}",
                    method: 'get',
                    data: {
                        size: size,
                        product_id : $('#productId').val()

                    },
                    success: function (response) {
                        // What to do if we succeed
                        $('#variable_price').html(response);
                        size=0;
                    }
                }
            )
        });
    });
////////////////////////////////////////add to cart senario

     size=0;
    var color=0;

    jQuery(document).ready(function () {
        jQuery('.addtocart').click(function (e) {
            var variable= $('#variable').val();
            if(variable==="1"){
                $('input.colors').each(function () {
                    if ($(this).is(':checked')) {
                        color = this.value;
                    }
                });
            }
            else if(variable==="2") {
                $('input.colors').each(function () {
                    if ($(this).is(':checked')) {
                        color = this.value;
                    }
                });
                $('input.sizes').each(function () {
                    if ($(this).is(':checked')) {
                        size = this.value;
                    }
                });
            }

            $body = $("body");
            console.log(variable);

            $(document).on({
                ajaxStart: function() { $body.addClass("loading");  },
                ajaxStop: function() { $body.removeClass("loading"); }
            });

            jQuery.ajax({

                    url: "{{ route('addToCart') }}",
                    method: 'get',
                    data: {
                        size: size,
                        color: color,
                        product_id : $('#productId').val(),
                        qty:$('#num-product').val()

                    },
                    success: function (response) {
                        // What to do if we succeed
                        $('.header-wrapicon2 ').html(response);
                        size=0;
                        color=0;
                    }
                }
            )
        });
    });

    $( document ).ready(function() {


    });

    function disable() {
        if ($('#productQty').val() - $('#num-product').val() <= 1) {
            $('.btn-num-product-up').addClass('displaynone');
        }
        else {
            $('.btn-num-product-up').removeClass('displaynone');

        }
    }

    function enable() {
        $('.btn-num-product-up').removeClass('displaynone');

    }


</script>


</body>
</html>