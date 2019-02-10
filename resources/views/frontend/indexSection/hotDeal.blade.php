<?php 
	$discountProduct = $products->whereNotIn('is_discount', null)->first();
	$hotProduct = $products->where('is_hot', 1)->first();
 ?>
	<!-- banner-bottom1 -->
	@if($discountProduct)
	<div class="banner-bottom1">
		<div class="agileinfo_banner_bottom1_grids">
			<div class="col-md-7 agileinfo_banner_bottom1_grid_left" style="/*background: url('{{productsImageUrl($discountProduct->id)}}') no-repeat 0px 0px;*/">
				<h3>{{ $discountProduct->pdt_name }}<span>{{ $discountProduct->is_discount }}% <i>Discount</i></span></h3>
				<a href="{{ url('product-details', $discountProduct->id ) }}">Shop Now</a>
			</div>
			<div class="col-md-5 agileinfo_banner_bottom1_grid_right" style="">
				<h4>hot deal</h4>
				<div class="timer_wrap">
					<div id="counter"> </div>
				</div>
				<script src="{{ asset('public/') }}/js/jquery.countdown.js"></script>
				<script src="{{ asset('public/') }}/js/script.js"></script>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
  @endif
	<!-- //banner-bottom1 --> 