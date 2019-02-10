	
	@extends('frontend.layout')
	@section('title', $pdtById->pdt_name)
	@section('content')
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>{{$pdtById->pdt_name}}</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>{{$pdtById->pdt_name}}</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">

				
					 @foreach(productsImageUrls($pdtById->id) as $url)
						<li data-thumb="{{asset($url->image_url)}}">
							<div class="thumb-image"> <img src="{{asset($url->image_url)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
					@endforeach
						
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="{{ asset('public/') }}/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="{{ asset('public/') }}/css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="{{ asset('public/') }}/js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3>{{$pdtById->pdt_name}}</h3>
				<input id="rating" name="rating" type="number" class="rating"  >
				
				<script type="text/javascript">
					$(document).ready(function(){
						$('#rating').rating({
							size:'xs',
							displayOnly: true,
						});

						$('#rating').rating('update', 3);
					});
				</script>
				<div class="description">
					<h5><i>Description</i></h5>
					<p>{{$pdtById->descp}}</p>
				</div>

				{!! Form::open(['route' => 'cart', 'method' => 'post']) !!}
					{!! Form::hidden('products_id', $pdtById->id) !!}
				<div class="color-quality">
					<div class="color-quality-left">
						@if($colors = productsColor($pdtById->id))
						<h5>Color</h5>
						<div class="color-quality">
							<ul>
							
								@foreach($colors as $color)
									<li class="m-r-10">
								<label class="color-filter" for="color-filter" style="background-color: {{ $color->color }};"></label>
								<input class="checkbox-color-filter products-filter" type="radio" name="color" value="{{$color->color}}">
								
							</li>
								@endforeach
							</ul>
						</div>
						@endif
					</div>
					<div class="color-quality-right">
						<h5>Quantity :</h5>
						 <div class="quantity"> 
							<div class="quantity-select">                           
								<div class="entry value-minus1">&nbsp;</div>
								<div class="entry" style="display: inline;"><input class="value1" type="" name="qty" value="1" readonly></div>
								<!-- <input class="value2" type="" name="qty" value="1"> -->
								<div class="entry value-plus1 active">&nbsp;</div>
							</div>
						</div>
						<!--quantity-->
								<script>
								$('.value-plus1').on('click', function(){
									var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.val(), 10)+1;
									divUpd.val(newVal);
								});

								$('.value-minus1').on('click', function(){
									var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.val(), 10)-1;
									if(newVal>=1) divUpd.val(newVal);
								});
								</script>
							<!--quantity-->

					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="simpleCart_shelfItem">
					<p><span>${{$pdtById->up_price}}</span> <i class="item_price">${{$pdtById->price}}</i></p>
					<button type="submit" class="w3ls-cart add-to-cart">Add to cart</button>
				</div> 
				{!! Form::close() !!} 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 
	
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item {{ session('success') ? 'resp-tab-active1' : '' }}" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
						<li class="resp-tab-item {{ session('success') ? 'resp-tab-active' : '' }}" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					</ul>		
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0" style="display: {{ session('success') ? 'none' : '' }};">
						<h3>{{$pdtById->pdt_name}}</h3>
						<p>{{$pdtById->short_descp}}</p>
						<p>{{$pdtById->descp}}</p>
					</div>	

					<!-- product review -->
					@include('frontend.product-details.review')
					<!-- /product review --> 		

				</div>	
			</div>
			<script src="{{ asset('public/') }}/js/easyResponsiveTabs.js" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>

	<!-- Related Products -->
	

	@include('frontend.product-details.related')


	<!-- //Related Products -->

	 
	<!-- //single -->
	

	@endsection