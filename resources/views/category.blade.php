<!DOCTYPE html>
<html lang="fa">
<head>
	<title>{{$categoryArray->header}}</title>
	@include('includes.headLinks')

</head>
<body class="animsition loading">

@include('includes.header')


<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url({{$categoryArray->image}});">
		<h2 class="l-text2 t-center" style="color: #6f6f6f">
			{{$categoryArray->name}}
		</h2>
	</section>


	<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row" style="direction: rtl;">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						دسته بندی ها
					</h4>

					<ul class="p-b-54">
						<li class="p-t-4">
							<a title="همه محصولات" href="{{route('shop')}}" class="catText ">
								همه
							</a>
						</li>

						<li class="p-t-4">
							<a title="حوله تن پوش" href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}" class="catText">
								حوله تن پوش
							</a>
						</li>

						<li class="p-t-4">
							<a title="حوله کودک" href="{{route('shop.category', ['category' => 'kids-towel'])}}" class="catText">
								تن پوش کودک
							</a>
						</li>

						<li class="p-t-4">
							<a title="حوله های ابعادی" href="{{route('shop.category', ['category' => 'hands-towel'])}}" class="catText">
								حوله های ابعادی
							</a>
						</li>

						<li class="p-t-4">
							<a title="حوله تبلیغاتی" href="{{route('promotional-towels')}}" class="catText">
								حوله تبلیغاتی
							</a>
						</li>

						<li class="p-t-4">
							<a title="حوله های هدیه" href="{{route('gift-pack')}}" class="catText">
								حوله هدیه
							</a>
						</li>
					</ul>



				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-10">
				<!--  -->


				<!-- Product -->
				<div class="row">
					@foreach($products as $product)
						@if($product->published==1)
						@php($correct=0)
						@foreach($product->categories as $category)
							@if($category->id==$categoryArray->id)
								@php($correct=1)
								@endif
							@endforeach
					@if($correct==1)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="{{$product->image}}" alt="{{$product->name}}">

									<div class="block2-overlay trans-0-4">
										@if(\Illuminate\Support\Facades\Auth::check())

											<a title="{{$product->name}}" class="block2-btn-addwishlist hov-pointer trans-0-4" id="{{$product->id}}">
												<i class="icon-wishlist fa fa-heart-o @if(\App\favorite::where('product_id',$product->id)->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->count()!=0)  dis-none  @endif " style="color: purple" aria-hidden="true"></i>
												<i class="icon-wishlist fa fa-heart @if(\App\favorite::where('product_id',$product->id)->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->count()==0)  dis-none  @endif " style="color: purple"  aria-hidden="true"></i>
											</a>
										@endif

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a title="خرید {{$product->name}}" href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												خرید محصول
											</a>
										</div>
									</div>
								</div>

								<div class="block2-txt p-t-20">
									<a title="{{$product->name}}" href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}" class="block2-name dis-block s-text3 p-b-5 home-product-name">
										{{$product->name}}
									</a>

									<span class="block2-price m-text6 p-r-5 home-product-price">
								@if($product->qty!=0)
										@if($product->variable!=2)
                                                @if($product->off->count()>0)
                                                    @php($oldprice=$product->price)
                                                    @foreach($product->off as $off)
                                                        @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                                                            @php($percent=100-$off->percent) @php($newprice=$oldprice*$percent/100)
                                                            <span style="color: purple;" class="home-product-price"> {{number_format(($newprice))}}تومان </span>
                                                            <span style="text-decoration: line-through" class="home-product-price"> {{number_format($oldprice)}}</span>
                                                            @php($hasoff=1)
                                                        @else
                                                            {{number_format($product->price)}} تومان

                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{number_format($product->price)}} تومان
                                                @endif

										@endif
										@if($product->variable==2)
                                                @php($price=0)

                                                @foreach($sizes as $size)
                                                    @if($size->product_id==$product->id)
                                                        @php($price=$size->price)
                                                    @endif

                                                @endforeach

                                                @if($product->off->count()>0)
                                                    @php($oldprice=$price)
                                                    @foreach($product->off as $off)
                                                        @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                                                            @php($percent=100-$off->percent) @php($newprice=$oldprice*$percent/100)
                                                            <span style="color: purple;" class="home-product-price"> {{number_format(($newprice))}}تومان </span>
                                                            <span style="text-decoration: line-through;" class="home-product-price"> {{number_format($oldprice)}}</span>
                                                            @php($hasoff=1)
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
							</div>
						</div>
						@endif
						@endif
					@endforeach


				</div>
				<!-- Pagination -->
				<div class="pagination flex-m flex-w p-t-26">
					{{$products->links()}}

				</div>
			</div>
		</div>
	</div>
</section>
<section class="shipping bgwhite" >
	<div class="flex-w p-l-15 p-r-15 " style="background-color:#c788bc;text-align: center;direction: rtl;padding: 50px 0;">
		<div class="container">
			{!!$categoryArray->description!!}
		</div>
	</div>
</section>

<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
