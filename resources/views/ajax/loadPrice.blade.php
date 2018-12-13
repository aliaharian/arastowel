<span class="m-text17" style="display: inline-block">
	@if($product->qty!=0 && $product->published==1)
@php $hasoff=0 @endphp
	@if($product->off->count()>0)

		@foreach($sizes as $size)
			@if($size->size_id==$selectedSize && $size->product_id==$product->id)
				@php $oldprice=$size->price @endphp
			@endif
		@endforeach

		@foreach($product->off as $off)
			@if(strtotime($off->start)<time() && strtotime($off->end)>time())
				@php $percent=100-$off->percent; $newprice=$oldprice*$percent/100;  @endphp
					<span class="newprice"> {{number_format(($newprice))}} تومان</span>

					<span class="line-through"> {{number_format($oldprice)}} تومان</span>
				@php $hasoff=1 @endphp
			@endif
		@endforeach
	@endif

	@if($hasoff==0)
            @foreach($sizes as $size)
            @if($size->size_id==$selectedSize && $size->product_id==$product->id)
        <span style="display: inherit;">تومان</span>
        <span> {{number_format($size->price)}}</span>
            @endif
            @endforeach
	@endif
		@endif

				</span>



