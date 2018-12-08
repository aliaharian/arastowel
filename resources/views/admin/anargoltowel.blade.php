<!DOCTYPE html>
<html lang="en">
<head>
	<title>Riddle - Portfolio Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="Riddle - Portfolio Template">
	<meta name="keywords" content="portfolio, riddle, onepage, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="https://statics.arastowel.com/anargol/images/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/magnific-popup.css"/>
	<link rel="stylesheet" href="https://statics.arastowel.com/anargol/css/style.css"/>


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
			<form action="{{route('anargol.edit')}}" method="post">
				{{csrf_field()}}
			<div class="row portfolios-area">
				@foreach($anargol as $anargol_content)
					@if($anargol_content->position=='img_1')
				<div class="mix col-lg-6 col-md-6 web">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_1_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_1_picture"></div>
						<button type="button" name="img_1_change" id="img_1_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_1_link" id="img_1_link">
					</a>
				</div>
					@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_2')
				<div class="mix col-lg-6 col-md-6 digital">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_2_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_2_picture"></div>
						<button type="button" name="img_2_change" id="img_2_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_2_link" id="img_2_link">
					</a>
				</div>
						@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_3')

				<div class="mix col-lg-4 col-md-6 web">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_3_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_3_picture"></div>
						<button type="button" name="img_3_change" id="img_3_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_3_link" id="img_3_link">
					</a>
				</div>
						@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_4')
				<div class="mix col-lg-4 col-md-6 digital">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_4_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_4_picture"></div>
						<button type="button" name="img_4_change" id="img_4_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_4_link" id="img_4_link">
					</a>
				</div>
						@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_5')
				<div class="mix col-lg-4 col-md-6 rened">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_5_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_5_picture"></div>
						<button type="button" name="img_5_change" id="img_5_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_5_link" id="img_5_link">
					</a>
				</div>
						@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_6')
					<div class="mix col-lg-12 col-md-6 brand">
						<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
							<textarea name="img_6_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
							<div id="img_6_picture"></div>
							<button type="button" name="img_6_change" id="img_6_change" class="btn btn-primary">تغییر عکس</button>
							<input value="{{$anargol_content->image}}" type="text" hidden name="img_6_link" id="img_6_link">
						</a>
				</div>
						@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_7')
				<div class="mix col-lg-6 col-md-6 rened">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_7_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_7_picture"></div>
						<button type="button" name="img_7_change" id="img_7_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_7_link" id="img_7_link">
					</a>
				</div>
						@endif
					@endforeach
					@foreach($anargol as $anargol_content)
						@if($anargol_content->position=='img_8')
				<div class="mix col-lg-6 col-md-6 brand">
					<a  class="portfolio-item set-bg" data-setbg="{{$anargol_content->image}}">
						<textarea name="img_8_upper_text" style="width: 50%;height: 300px;margin-left: 30px;">{{$anargol_content->upper_text}}</textarea>
						<div id="img_8_picture"></div>
						<button type="button" name="img_8_change" id="img_8_change" class="btn btn-primary">تغییر عکس</button>
						<input value="{{$anargol_content->image}}" type="text" hidden name="img_8_link" id="img_8_link">
					</a>
				</div>
						@endif
					@endforeach
					
			</div>
				<div class="row">

					<div class="col-sm-5"></div>
					<div class="col-sm-2">        <input type="submit" class="btn btn-success" value="ثبت تغییرات" style="width:100%;letter-spacing: 0;margin: 30px auto;text-align:center;height: 50px;font-size: 18px">
					</div>
					<div class="col-sm-5"></div>
				</div>
			</form>
		</div>


	</section>
	<!-- portfolio section end -->


	<!-- footer section start -->
	<footer class="footer-section text-center">
		<div class="container">
			<div class="social-links">
				<a href=""><span class="fa fa-pinterest"></span></a>
				<a href=""><span class="fa fa-linkedin"></span></a>
				<a href="https://instagram.com/anargolholding"><span class="fa fa-instagram"></span></a>
				<a href=""><span class="fa fa-facebook"></span></a>
				<a href=""><span class="fa fa-twitter"></span></a>
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
	<script src="https://statics.arastowel.com/anargol/js/main.js"></script>

	<script type="text/javascript" src="https://statics.arastowel.com/js/jquery.popupWindow.js"></script>
	<script type="text/javascript">
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
	$('#img_1_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_2_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_3_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_4_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_5_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_6_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_7_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
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
	$('#img_8_picture').html('<img src="'+file+'" alt="Portfolio Item" style="width: 200px"/>');
	$('#img_8_link').val(file);
	}
	});
	</script>
</body>
</html>