<div class="header-wrapicon2" onclick="toggleopen()">

	<i class="fa fa-shopping-cart fa-2x opencart"></i>
	<span class="header-icons-noti">{{$pre_order->count()}}</span>

	<!-- Header cart noti -->
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
					<button class="c-navi-list__basket-item-remove" id="{{$order->id}}" onclick="deleteorder(this.id);">X</button>

					<div class="c-navi-list__basket-item-content">
						<div class="c-navi-list__basket-item-image">
							<img alt="{{\App\Product::find($order->product_id)->name}}" src="{{$order->image}}">
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
				<a href="{{route('shipping')}}" class="c-navi-list__basket-submit" style="left:10px">ثبت سفارش و ارسال</a>
				<a href="{{route('cart')}}" class="c-navi-list__basket-submit" style="right:10px">مشاهده سبد خرید</a>

			@else
				<a href="{{route('index')}}" class="c-navi-list__basket-submit" style="left:10px">صفحه اصلی</a>
				<a href="{{route('shop')}}" class="c-navi-list__basket-submit" style="right:10px">فروشگاه</a>
			@endif
	</div>



</div>



<script>
	function toggleopen() {
		$('.header-cart').toggleClass('show-header-dropdown');
    }
    jQuery(document).ready(function () {
		window.location.replace('/cart');
    });

</script>




