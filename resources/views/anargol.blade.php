<!DOCTYPE html>
<html lang="fa">
<head>
	<title>حوله ی انارگل - مشاهده و خرید اینترنتی انواع حوله های تن پوش ، دست و صورت ، استخری و حمام</title>
	<meta charset="UTF-8">
	<meta name="description" content="Riddle - Portfolio Template">
	<meta name="keywords" content="portfolio, riddle, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="https://statics.arastowel.com/images/anargollogo.jpg" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/magnific-popup.css"/>
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/style.css"/>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>



	<!-- intro section start -->
	<section class="intro-section">
		<div class=" text-center">
			<div class="row" style="margin: 0;padding: 0;top:0;left: 0;">
				<div  style="margin: 0;padding: 0;left: 0;right: 0;top: 0;width:100%;height: 240px;margin-bottom:30px;background-image: url(https://statics.arastowel.com/anargol/images/anarhead2.jpg);background-size: cover;background-position: center">
				</div>
			</div>
		</div>
	</section>
	<!-- intro section end -->


	<!-- portfolio section start -->
	<section class="portfolio-section">

		<div class="container-fluid p-md-0" style="margin: 0;padding: 0;left: 0;right: 0;top: 0;">
			<div class="row portfolios-area">

				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_1')
				<div class="mix col-lg-6 col-md-6 web">
					<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<div class="pi-inner">
							<h2>
								{!! $anargol_content->upper_text !!}
							</h2>
						</div>
					</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_2')
						<div class="mix col-lg-6 col-md-6 digital">
							<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
								<div class="pi-inner">
									<h2>
										{!! $anargol_content->upper_text !!}
									</h2>
								</div>
							</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_3')
						<div class="mix col-lg-4 col-md-6 web">
							<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
								<div class="pi-inner">
									<h2>
										{!! $anargol_content->upper_text !!}
									</h2>
								</div>
							</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_4')
				<div class="mix col-lg-4 col-md-6 digital">
					<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<div class="pi-inner">
							<h2>
								{!! $anargol_content->upper_text !!}
							</h2>
						</div>
					</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_5')
				<div class="mix col-lg-4 col-md-6 rened">
					<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<div class="pi-inner">
							<h2>
								{!! $anargol_content->upper_text !!}
							</h2>
						</div>
					</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_6')
					<div class="mix col-lg-12 col-md-6 brand">
						<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
							<div class="pi-inner">
								<h2>
									{!! $anargol_content->upper_text !!}
								</h2>
							</div>
						</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_7')
				<div class="mix col-lg-6 col-md-6 rened">
					<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<div class="pi-inner">
							<h2>
								{!! $anargol_content->upper_text !!}
							</h2>
						</div>
					</a>
				</div>
					@endif
				@endforeach
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_8')
				<div class="mix col-lg-6 col-md-6 brand">
					<a  href="{{$anargol_content->image}}" class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<div class="pi-inner">
							<h2>
								{!! $anargol_content->upper_text !!}
							</h2>
						</div>
					</a>
				</div>
					@endif
				@endforeach

			</div>
		</div>


	</section>
	<!-- portfolio section end -->


	<!-- footer section start -->
	<footer class="footer-section text-center">
		<div class="container">
			<div class="social-links">
				<a title="پینترست" href=""><span class="fa fa-pinterest"></span></a>
				<a title="لینکدین" href=""><span class="fa fa-linkedin"></span></a>
				<a title="اینستاگرام" href="https://instagram.com/anargolholding"><span class="fa fa-instagram"></span></a>
				<a title="فیسبوک" href=""><span class="fa fa-facebook"></span></a>
				<a title="توییتر" href=""><span class="fa fa-twitter"></span></a>
			</div>
			<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Arastowel.com/anargoltowel
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
		</div>
	</footer>
	<!-- footer section end -->



	<!--====== Javascripts & Jquery ======-->
	<script src="https://statics.arastowel.com/anargol/js/jquery-2.1.4.min.js"></script>
	<script src="https://statics.arastowel.com/anargol/js/bootstrap.min.js"></script>
	<script src="https://statics.arastowel.com/anargol/js/mixitup.min.js"></script>
	<script src="https://statics.arastowel.com/anargol/js/magnific-popup.min.js"></script>
	<script src="https://statics.arastowel.com/anargol/js/main.js"></script>
</body>
</html>