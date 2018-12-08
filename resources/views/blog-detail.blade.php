<!DOCTYPE html>
<html lang="fa">
<head>
	<title>{{$post->title}} - فروشگاه اینترنتی حوله ارس</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	@include('includes.headLinks')

	{{--seo content--}}

	<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" /><meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
	<meta property="og:locale" content="fa_IR" />
	<meta property="og:title" content="{{$post->title}}" />
	<meta property="og:url" content="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}" />
	<meta property="og:image" content="{{$post->image}}" />
	<meta property="og:image:secure_url" content="{{$post->image}}" />
	<meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
	<meta property="og:image" content="{{$post->image}}">
	<meta property="og:image:width" content="720">
	<meta property="og:image:height" content="539">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:alt" content="{{$post->title}}" />

	<link rel="image_src" href="{{$post->image}}" />
	<meta property="og:type" content="article" />
	<meta property="article:published_time" content="{{$post->created_at}}" />
	<meta property="article:modified_time" content="{{$post->updated_at}}" />
	<meta property="og:updated_time" content="{{$post->updated_at}}" />

	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ArasTowel" />
	<meta name="twitter:title" content="{{$post->title}}" />
	<meta name="twitter:image" content="{{$post->image}}" />

	<meta http-equiv="content-language" content="fa" />
	<meta name="apple-mobile-web-app-capable" content="yes"/>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<meta name="DC.Identifier" content="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}"/>
	<meta name="DC.Type" content="image"/>
	<meta name="DC.Title" content="{{$post->title}}"/>
	<meta name="DC.Language" content="fa"/>

	<meta name="robots" content="index, follow"/>

	{{--seo content--}}


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="animsition">
@include('includes.header')
@if($post->published!=1)
<h1 class="text-center alert alert-danger">
	این مطلب وجود ندارد یا هنوز منتشر نشده
</h1>
	@else

	<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="background-color: #f2f2f2;padding-top: 5px;padding-bottom: 5px;margin: 0 38px 0 50px;">
	<a href="{{route('index')}}" class="s-text16">
		صفحه اصلی
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a href="{{route('blog')}}" class="s-text16">
		بلاگ
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<span class="s-text17">
			{{$post->title}}
		</span>
</div>

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25" style="direction: rtl">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="{{$post->image}}" alt="{{$post->title}}">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									{{$post->title}}
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										توسط {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										{{$post->persian_date}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

									{!! $post->content !!}

							</div>

							<div class="flex-m flex-w p-t-20">
								<span class="s-text20 p-r-20">

								</span>

								<div class="wrap-tags flex-w">
									@foreach($post->Tags as $tag)
										<a title="{{$tag->tag_name}}" href="{{route('blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_name)])}}" class="tag-item">
										{{$tag->tag_name}}
									</a>
									@endforeach
								</div>
							</div>
						</div>


					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">
						<!-- Search -->
						<form action="{{route('blog.msearch')}}">
							<div class="pos-relative bo11 of-hidden">
								<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search" placeholder="جستجو">

								<button type="submit" class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
									<i class="fs-13 fa fa-search" aria-hidden="true"></i>
								</button>
							</div>
						</form>
						<!-- Featured Products -->
						<h4 class="m-text23 p-t-65 p-b-34">
							محصولات پیشنهادی
						</h4>

						<ul class="bgwhite">
							@foreach($products as $product)
								@if($product->featured==1 && $product->published==1)
									<li class="flex-w p-b-20">
										<a title="{{$product->name}}" href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}" class="dis-block wrap-pic-w w-size22 m-l-20 trans-0-4 hov4">
											<img src="{{$product->image}}" alt="{{$product->name}}">
										</a>

										<div class="w-size23 p-t-5">
											<a title="{{$product->name}}" href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}" class="s-text20">
												{{$product->name}}									</a>

											<span class="dis-block s-text17 p-t-6" style="font-size: 15px">
                                             @if($product->qty!=0)
													@if($product->variable!=2)
														@if($product->off->count()>0)
															@php $oldprice=$product->price @endphp
															@foreach($product->off as $off)
																@if(strtotime($off->start)<time() && strtotime($off->end)>time())
																	@php $percent=100-$off->percent; $newprice=$oldprice*$percent/100;  @endphp
																	<span style="color: purple;font-size: 15px"> {{number_format(($newprice))}}تومان </span>
																	<span style="text-decoration: line-through;font-size: 15px"> {{number_format($oldprice)}} تومان </span>
																	@php $hasoff=1 @endphp
																@else
																	{{number_format($product->price)}} تومان

																@endif
															@endforeach
														@else
															{{number_format($product->price)}} تومان
														@endif
													@else

														@php $price=0 @endphp

														@foreach($sizes as $size)
															@if($size->product_id==$product->id)
																@php $price=$size->price @endphp
															@endif

														@endforeach

														@if($product->off->count()>0)
															@php $oldprice=$price @endphp
															@foreach($product->off as $off)
																@if(strtotime($off->start)<time() && strtotime($off->end)>time())
																	@php $percent=100-$off->percent; $newprice=$oldprice*$percent/100;  @endphp
																	<span style="color: purple;font-size: 15px"> {{number_format(($newprice))}}تومان </span>
																	<span style="text-decoration: line-through;font-size: 15px"> {{number_format($oldprice)}} تومان</span>
																	@php $hasoff=1 @endphp
																@else
																	{{number_format($price)}} تومان
																@endif
															@endforeach
														@else
															{{number_format($price)}} تومان
														@endif



													@endif
												@else
													ناموجود
												@endif

                                            </span>
										</div>
									</li>
								@endif
							@endforeach
						</ul>

						<!-- Tags -->
						<h4 class="m-text23 p-t-50 p-b-25">
							تگ ها
						</h4>

						<div class="wrap-tags flex-w">
							@foreach($tags as $tag)
								<a title="{{$tag->tag_name}}" href="{{route('blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_name)])}}" class="tag-item">
									{{$tag->tag_name}}
								</a>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@endif
	<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
