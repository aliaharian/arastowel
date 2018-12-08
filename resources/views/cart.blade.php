<!DOCTYPE html>
<html lang="fa">
<head>
	<title>سبد خرید - فروشگاه اینترنتی حوله ارس</title>


	@include('includes.headLinks')
</head>
<body class="animsition">

@include('includes.header')
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://statics.arastowel.com/images/shopping-cart.jpg);">
		<h2 class="l-text2 t-center">
			سبد خرید
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-10 " style="direction: rtl;text-align: right;">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"  style="width: 50px;"></th>
							<th class="column-1"></th>
							<th class="column-2">نام محصول</th>
							<th class="column-3">قیمت محصول</th>
							<th class="column-3">قیمت پس از تخفیف</th>
							<th class="column-4 p-l-70">تعداد</th>
							<th class="column-5">قیمت نهایی</th>
						</tr>
						@foreach($pre_order as $order)
						<tr class="table-row">
							<th class="column-1" style="width: 50px;"><a title="حذف محصول" href="#" style="display: block;line-height: 20px" class="header-cart-item-delete" id="{{$order->id}}" onclick="deleteorder(this.id); location.reload();">
									X
								</a></th>
							<td class="column-1">
								<div class="cart-img-product">
									<img src="{{$order->image}}" alt="{{\App\Product::find($order->product_id)->name}}">
								</div>
							</td>
							<td class="column-2">
								<a title="{{\App\Product::find($order->product_id)->name}}" style="font-family: roya;" href="{{route('shop.product',['product_id' => $order->product_id , 'product_name'=>str_replace(' ','-',\App\Product::find($order->product_id)->name)])}}"> {{\App\Product::find($order->product_id)->name}}
								@if($order->color_id!=0&&$order->size_id==0)

									<br>
									رنگ
									{{\App\Color::find($order->color_id)->name}}
								@elseif($order->color_id!=0&&$order->size_id!=0)
									<br>
									رنگ

									{{\App\Color::find($order->color_id)->name}}
									<br>
									سایز
									{{\App\size::find($order->size_id)->name}}
								@endif
								</a>
							</td>
							<td class="column-3">{{number_format($order->price)}}تومان</td>
							<td class="column-3">{{number_format($order->off_price)}}تومان</td>
							<td class="column-4">{{$order->qty}}</td>
							<td class="column-5">{{number_format($order->off_price*$order->qty)}}تومان</td>
						</tr>
						@endforeach
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="کد تخفیف">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							اعمال تخفیف
						</button>
					</div>
				</div>
                @php $total_price=0;$off_total_price=0; @endphp
                @foreach($pre_order as $order)
                    @php
                        $off_total_price+=($order->off_price*$order->qty);
                        $total_price+=($order->price*$order->qty);
                    @endphp
                @endforeach
                <span>مبلغ کل خرید:</span>
                <span style="font-size: 17px;color: purple;font-family: roya">
		{{number_format($off_total_price)}}تومان
			</span>
				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a title="ادامه ثبت سفارش" href="{{route('shipping')}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						پایان خرید و تکمیل اطلاعات
					</a>
				</div>
			</div>

		</div>
		<div class="size10 trans-0-4 m-t-10 m-b-10" style="margin: 45px auto">
			<!-- Button -->
			<a style="background-color: #ff9600;" title="فروشگاه" href="{{route('shop')}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
				بازگشت به فروشگاه
			</a>
		</div>
	</section>


<div id="getting-started"></div>

<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

<script>
    $('body').on('hidden.bs.modal', '.modal', function () {
        $('video').trigger('pause');
    });
</script>
</body>
</html>
