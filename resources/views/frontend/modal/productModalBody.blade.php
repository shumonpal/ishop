
	<div class="col-md-5 modal_body_left">
		<img src="{{ productsImageUrl($pdtById->id) }}" alt=" " class="img-responsive" />
	</div>
	<div class="col-md-7 modal_body_right">
	{!! Form::open(['route' => 'cart', 'method' => 'post']) !!}
		<h4>{{ $pdtById->pdt_name }}</h4>
		<p>{{ $pdtById->descp}} </p>
		<div class="modal_body_right_cart simpleCart_shelfItem">
			<p><span>${{ $pdtById->price}}</span> <i class="item_price">${{ $pdtById->up_price}}</i></p>

			
				{!! Form::hidden('products_id', $pdtById->id) !!} 
				<button type="submit" class="w3ls-cart add-to-cart">Ad to cart</button>
				<a href="{{ url('product-details', $pdtById->id
				) }}" class="w3ls-cart">More details</a>
			
		</div>

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

		{!! Form::close() !!} 
	</div>
	<div class="clearfix"> </div>