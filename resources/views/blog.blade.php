<!DOCTYPE html>
<html lang="fa">
<head>
	<title>بلاگ - فروشگاه اینترنتی حوله ارس</title>
	@include('includes.headLinks')

</head>
<body class="animsition loading">

@include('includes.header')


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://statics.arastowel.com/images/blogHeader.jpg);">
		<h3 class="l-text2 t-center" style="color: #0f8e26;direction: rtl;font-size: 35px">
ما به محیط زیست اهمیت می دهیم!		</h3>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60" style="direction: rtl">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">


					<div class="p-l-50 p-l-0-lg">
						<!-- item blog -->
						@foreach($posts as $post)
						@if($post->published==1)
						<div class="item-blog p-b-80">
							<a title="{{$post->title}}" href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="{{$post->image}}" alt="{{$post->title}}" title="{{$post->title}}">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
{{$post->persian_date}}

								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a title="{{$post->title}}" href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}" class="m-text24">
{{$post->title}}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										توسط {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

								<p class="p-b-12">
									{!! substr($post->content, 0, 300) !!}...
								</p>

								<a title="{{$post->title}}" href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}" class="s-text20">
									ادامه مطلب
									<i class="fa fa-long-arrow-left m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>

							@endif
						@endforeach


						<!-- item blog -->

					</div>



					<div class="pagination flex-m flex-w p-t-26">
						{{$posts->links()}}

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
															<span style="text-decoration: line-through;font-size: 15px"> {{number_format($oldprice)}} تومان</span>
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
										@endif									</span>
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


	<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
