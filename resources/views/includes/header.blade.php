@php
	function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

        $user_ip = getUserIP();
                $agent = new \Jenssegers\Agent\Agent();
                $user_platform = $agent->platform();
                $user_browser = $agent->browser();
            $pre_order=\App\Pre_order::where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get();
@endphp

<div class="modal">
	<div class="animsition-loading-1">
		<div data-loader="ball-scale">
		</div>
	</div>
</div>


<div class="wrap_header fixed-header2 trans-0-4">
	<a title="حوله ارس" href="{{route('index')}}" class="logo">
		<img src="/svg/final.svg" height="32" alt="حوله ارس" title="حوله ارس">
	</a>

	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">
				<li>
					<a title="صفحه اصلی حوله ارس" href="{{route('index')}}">صفحه اصلی</a>
				</li>
				<li>
					<a title="درباره حوله ارس" href="{{route('about-us')}}">درباره ما</a>
				</li>
				<li>
					<a title="خرید اینترنتی حوله" href="{{route('shop')}}">فروشگاه</a>
				</li>

				<li class="sale-noti">
					<a title="بلاگ حوله ارس" href="{{route('blog')}}">بلاگ</a>
				</li>

				<li>
					<a title="پیگیری خرید" href="{{route('profile.order-tracking')}}">پیگیری خرید</a>
				</li>



				<li>
					<a title="تماس با حوله ارس" href="{{route('contact-us')}}">تماس با ما</a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="header-icons">
		<a title="ورود به حوله ارس" href="{{route('login')}}" class="header-wrapicon1 dis-block">
			@if(\Illuminate\Support\Facades\Auth::check())
			<img src="/files/loggeduser_final.png" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس" width="27">
				@else
				<img src="/files/user.png" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس" width="27">
			@endif
		</a>

		<span class="linedivide1"></span>

        <div class="header-wrapicon2" >

			<i class="fa fa-shopping-cart fa-2x opencart"></i>
            <span class="header-icons-noti">{{$pre_order->count()}}</span>

            <div class="header-cart header-dropdown c-navi-list__dropdown c-navi-list__basket-dropdown js-dropdown-menu" style="display: block;">
                @if($pre_order->count()!=0)

                    <div class="c-navi-list__basket-header">
                        <div class="c-navi-list__basket-total">
                            @php $total_price=0;$off_total_price=0; @endphp
                            @foreach($pre_order as $order)
                                @php
                                    $off_total_price+=($order->off_price*$order->qty);
                                    $total_price+=($order->price*$order->qty);
                                @endphp
                            @endforeach
                            <span>مبلغ کل خرید:</span>
                            <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>
                        </div>

                    </div>
                @else
                    <div class="alert alert-info">برای شروع خرید به صفحه فروشگاه مراجعه کنید</div>
                @endif

                <ul class="c-navi-list__basket-list">
                    @foreach($pre_order as $order)

                        <li class="js-mini-cart-item">
                            <button class="c-navi-list__basket-item-remove" style="text-align: center" id="{{$order->id}}" onclick="deleteorder(this.id);">X</button>

                            <div class="c-navi-list__basket-item-content">
                                <div class="c-navi-list__basket-item-image">
                                    <img alt="{{\App\Product::find($order->product_id)->name}}" title="{{\App\Product::find($order->product_id)->name}}" src="{{$order->image}}" width="45">
                                </div>
                                <div class="c-navi-list__basket-item-details">
                                    <div class="c-navi-list__basket-item-title">
                                        {{\App\Product::find($order->product_id)->name}}
                                    </div>
                                    <div class="c-navi-list__basket-item-params">
                                        <div class="c-navi-list__basket-item-props">
                                            <span> {{$order->qty}} عدد</span>
                                            @if($order->color_id!=0||$order->size_id!=0)
                                                &nbsp;
                                                <span>رنگ
                                                    {{\App\Color::find($order->color_id)->name}}
									</span>
                                            @endif
                                            @if($order->size_id!=0)
                                                <span>سایز
                                                    {{\App\size::find($order->size_id)->name}}
									</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </li>
                    @endforeach


                </ul>
                    @if($pre_order->count()!=0)
                        <a title="ثبت سفارش و ارسال" href="{{route('shipping')}}" class="c-navi-list__basket-submit" style="left:10px">ثبت سفارش و ارسال</a>
                        <a title="مشاهده سبد خرید" href="{{route('cart')}}" class="c-navi-list__basket-submit" style="right:10px">مشاهده سبد خرید</a>

                    @else
                        <a title="صفحه اصلی" href="{{route('index')}}" class="c-navi-list__basket-submit" style="left:10px">صفحه اصلی</a>
                        <a title="فروشگاه" href="{{route('shop')}}" class="c-navi-list__basket-submit" style="right:10px">فروشگاه</a>
                    @endif
            </div>



        </div>


    </div>
</div>

<div class="flex-c-m size22 bg0 s-text21 pos-relative">
	@php
		$agent=new \Jenssegers\Agent\Agent();
	@endphp
	@if(!$agent->isMobile() && !$agent->isTablet())
	<a title="ورود به فروشگاه" href="{{route('shop')}}" class="s-text22 hov6 p-l-5" style="background: #f29a24;border-radius: 14px;padding: 0 12px;font-size: 15px;text-decoration: none;">همین حالا خرید کنید</a>
	@endif

	&nbsp;
	ارسال رایگان برای خرید های بالاتر از ۵۰۰ هزار تومان
	&nbsp;


</div>

<header class="header2">
	<div class="container-menu-header-v2 p-t-26" style="background: #fff">
		<div class="topbar2">
			<div class="topbar-social">
				<a title="فیسبوک" href="https://www.facebook.com/Arastowel/" target="_blank" class="topbar-social-item fa fa-facebook"></a>
				<a title="اینستاگرام" href="https://www.instagram.com/arastowel/" target="_blank" class="topbar-social-item fa fa-instagram"></a>
				<a title="پینترست" href="https://www.pinterest.com/arastowel/" class="topbar-social-item fa fa-pinterest-p" target="_blank"></a>
				<a title="لینکدین" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="topbar-social-item fa fa-linkedin"></a>
				<a title="توییتر" href="https://twitter.com/ArasTowel" class="topbar-social-item fa fa-twitter" target="_blank"></a>
				<a title="یوتوب" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA" target="_blank" class="topbar-social-item fa fa-youtube"></a>
			</div>

			<a title="حوله ارس" href="{{route('index')}}" class="logo2">
				<img src="/svg/final.svg" height="32" alt="حوله ارس" title="حوله ارس">
			</a>

			<div class="topbar-child2" style="direction: ltr">




				<a title="ورود به حوله ارس" href="{{route('login')}}" class="header-wrapicon1 dis-block m-l-30">
					@if(\Illuminate\Support\Facades\Auth::check())
						<img src="/files/loggeduser_final.png" width="27" class="header-icon1" alt="کاربر وارد شده">
					@else
						<img src="/files/user.png" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس" width="27">
					@endif				</a>

				<span class="linedivide1"></span>

                <div class="header-wrapicon2" >

					<i class="fa fa-shopping-cart fa-2x opencart"></i>
					<span class="header-icons-noti">{{$pre_order->count()}}</span>

                    <div class="header-cart header-dropdown c-navi-list__dropdown c-navi-list__basket-dropdown js-dropdown-menu" style="display: block;">
                        @if($pre_order->count()!=0)

                            <div class="c-navi-list__basket-header">
                                <div class="c-navi-list__basket-total">
                                    @php $total_price=0;$off_total_price=0; @endphp
                                    @foreach($pre_order as $order)
                                        @php
                                            $off_total_price+=($order->off_price*$order->qty);
                                            $total_price+=($order->price*$order->qty);
                                        @endphp
                                    @endforeach
                                    <span>مبلغ کل خرید:</span>
                                    <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>
                                </div>

                            </div>
                        @else
                            <div class="alert alert-info">برای شروع خرید به صفحه فروشگاه مراجعه کنید</div>
                        @endif

                        <ul class="c-navi-list__basket-list">
                            @foreach($pre_order as $order)

                                <li class="js-mini-cart-item">
                                    <button class="c-navi-list__basket-item-remove" style="text-align: center" id="{{$order->id}}" onclick="deleteorder(this.id);">X</button>

                                    <div class="c-navi-list__basket-item-content">
                                        <div class="c-navi-list__basket-item-image">
                                            <img alt="{{\App\Product::find($order->product_id)->name}}" width="45" src="{{$order->image}}">
                                        </div>
                                        <div class="c-navi-list__basket-item-details">
                                            <div class="c-navi-list__basket-item-title">
                                                {{\App\Product::find($order->product_id)->name}}
                                            </div>
                                            <div class="c-navi-list__basket-item-params">
                                                <div class="c-navi-list__basket-item-props">
                                                    <span> {{$order->qty}} عدد</span>
                                                    @if($order->color_id!=0||$order->size_id!=0)
                                                        &nbsp;
                                                        <span>رنگ
                                                            {{\App\Color::find($order->color_id)->name}}
									</span>
                                                    @endif
                                                    @if($order->size_id!=0)
                                                        <span>سایز
                                                            {{\App\size::find($order->size_id)->name}}
									</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                            @if($pre_order->count()!=0)
                                <a title="ثبت سفارش و ارسال" href="{{route('shipping')}}" class="c-navi-list__basket-submit" style="left:10px">ثبت سفارش و ارسال</a>
                                <a title="مشاهده سبد خرید" href="{{route('cart')}}" class="c-navi-list__basket-submit" style="right:10px">مشاهده سبد خرید</a>

                            @else
                                <a title="صفحه اصلی" href="{{route('index')}}" class="c-navi-list__basket-submit" style="left:10px">صفحه اصلی</a>
                                <a title="فروشگاه" href="{{route('shop')}}" class="c-navi-list__basket-submit" style="right:10px">فروشگاه</a>
                            @endif
                    </div>



                </div>















            </div>
		</div>

		<div class="wrap_header">

			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<li>
							<a title="صفحه اصلی" href="{{route('index')}}">صفحه اصلی</a>
						</li>
						<li>
							<a title="درباره ما" href="{{route('about-us')}}">درباره ما</a>
						</li>
						<li>
							<a title="فروشگاه اینترنتی" href="{{route('shop')}}">فروشگاه</a>
						</li>

						<li class="sale-noti">
							<a title="بلاگ" href="{{route('blog')}}">بلاگ</a>
						</li>

						<li>
							<a title="پیگیری خرید" href="{{route('profile.order-tracking')}}">پیگیری خرید</a>
						</li>



						<li>
							<a title="تماس با ما" href="{{route('contact-us')}}">تماس با ما</a>
						</li>
					</ul>
				</nav>
			</div>

			<div class="header-icons">

			</div>
		</div>
	</div>

	<div class="wrap_header_mobile">
		<a title="حوله ارس" href="{{route('index')}}" class="logo-mobile">
			<img src="/svg/final.svg" height="32" alt="حوله ارس">
		</a>

		<div class="btn-show-menu">
			<div class="header-icons-mobile">
				<a title="ورود به حوله ارس" href="{{route('login')}}" class="header-wrapicon1 dis-block">
					@if(\Illuminate\Support\Facades\Auth::check())
						<img src="/files/loggeduser_final.png" class="header-icon1" width="27" alt="ورود به حوله ارس">
					@else
						<img src="/files/user.png" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس" width="27">
					@endif				</a>

				<span class="linedivide2"></span>

                <div class="header-wrapicon2" >

					<i class="fa fa-shopping-cart fa-2x opencart"></i>
                    <span class="header-icons-noti">{{$pre_order->count()}}</span>

                    <div class="header-cart header-dropdown c-navi-list__dropdown c-navi-list__basket-dropdown js-dropdown-menu" style="display: block;">
                        @if($pre_order->count()!=0)

                            <div class="c-navi-list__basket-header">
                                <div class="c-navi-list__basket-total">
                                    @php $total_price=0;$off_total_price=0; @endphp
                                    @foreach($pre_order as $order)
                                        @php
                                            $off_total_price+=($order->off_price*$order->qty);
                                            $total_price+=($order->price*$order->qty);
                                        @endphp
                                    @endforeach
                                    <span>مبلغ کل خرید:</span>
                                    <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>
                                </div>

                            </div>
                        @else
                            <div class="alert alert-info">برای شروع خرید به صفحه فروشگاه مراجعه کنید</div>
                        @endif

                        <ul class="c-navi-list__basket-list">
                            @foreach($pre_order as $order)

                                <li class="js-mini-cart-item">
                                    <button class="c-navi-list__basket-item-remove" style="text-align: center" id="{{$order->id}}" onclick="deleteorder(this.id);">X</button>

                                    <div class="c-navi-list__basket-item-content">
                                        <div class="c-navi-list__basket-item-image">
                                            <img alt="{{\App\Product::find($order->product_id)->name}}" width="45" src="{{$order->image}}">
                                        </div>
                                        <div class="c-navi-list__basket-item-details">
                                            <div class="c-navi-list__basket-item-title">
                                                {{\App\Product::find($order->product_id)->name}}
                                            </div>
                                            <div class="c-navi-list__basket-item-params">
                                                <div class="c-navi-list__basket-item-props">
                                                    <span> {{$order->qty}} عدد</span>
                                                    @if($order->color_id!=0||$order->size_id!=0)
                                                        &nbsp;
                                                        <span>رنگ
                                                            {{\App\Color::find($order->color_id)->name}}
									</span>
                                                    @endif
                                                    @if($order->size_id!=0)
                                                        <span>سایز
                                                            {{\App\size::find($order->size_id)->name}}
									</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                        @if($pre_order->count()!=0)
                            <a title="ثبت سفارش و ارسال" href="{{route('shipping')}}" class="c-navi-list__basket-submit" style="left:10px">ثبت سفارش و ارسال</a>
                            <a title="مشاهده سبد خرید" href="{{route('cart')}}" class="c-navi-list__basket-submit" style="right:10px">مشاهده سبد خرید</a>

                            @else
                                <a title="صفحه اصلی" href="{{route('index')}}" class="c-navi-list__basket-submit" style="left:10px">صفحه اصلی</a>
                                <a title="فروشگاه" href="{{route('shop')}}" class="c-navi-list__basket-submit" style="right:10px">فروشگاه</a>
                        @endif
                    </div>



                </div>


            </div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
			</div>
		</div>
	</div>

	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile" style="direction: ltr">



					</div>
				</li>

				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile" style="text-align: center">
						<a title="فیسبوک" href="https://www.facebook.com/Arastowel/" target="_blank" class="topbar-social-item fa fa-facebook"></a>
						<a title="اینستاگرام" href="https://www.instagram.com/arastowel/" target="_blank" class="topbar-social-item fa fa-instagram"></a>
						<a title="پینترست" href="https://www.pinterest.com/arastowel/" class="topbar-social-item fa fa-pinterest-p" target="_blank"></a>
						<a title="لینکدین" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="topbar-social-item fa fa-linkedin"></a>
						<a title="توییتر" href="https://twitter.com/ArasTowel" class="topbar-social-item fa fa-twitter" target="_blank"></a>
						<a title="یوتوب" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA" target="_blank" class="topbar-social-item fa fa-youtube"></a>
					</div>
				</li>

				<li class="item-menu-mobile">
					<a title="صفحه اصلی" href="{{route('index')}}">صفحه اصلی</a>
				</li>
				<li class="item-menu-mobile">
					<a title="درباره ما" href="{{route('about-us')}}">درباره ما</a>
				</li>
				<li class="item-menu-mobile">
					<a title="فروشگاه" href="{{route('shop')}}">فروشگاه</a>
				</li>

				<li class="sale-noti item-menu-mobile">
					<a title="بلاگ" href="{{route('blog')}}">بلاگ</a>
				</li>

				<li class="item-menu-mobile">
					<a title="پیگیری خرید" href="{{route('profile.order-tracking')}}">پیگیری خرید</a>
				</li>
				<li class="item-menu-mobile">
					<a title="تماس با ما" href="{{route('contact-us')}}">تماس با ما</a>
				</li>
			</ul>
		</nav>
	</div>
</header>

