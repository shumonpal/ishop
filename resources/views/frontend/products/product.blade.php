

 <div class="agile_ecommerce_tab_left" style="padding-bottom: 20px;">
	<div class="hs-wrapper">
	
		<img src="{{ productsImageUrl($product->id) }}" alt=" " class="img-responsive" />
		<div class="w3_hs_bottom">
			<ul>
				<li>
					<a class="show-modal" href="{{ url('/showPdtModal', [ 'pdtId' => $product->id]) }}" data-toggle="modal">
					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
					</a>
					
				</li>
			</ul>
		</div>
	</div> 
	<h5><a href="{{ url('product-details', $product->id
				) }}">{{ $product->pdt_name }}</a></h5>
	<div class="simpleCart_shelfItem">
		<p><span>${{ $product->price }}</span> <i class="item_price">${{ $product->up_price }}</i></p>

		{!! Form::open(['route' => 'cart', 'method' => 'post', 'class' => 'left']) !!}
			{!! Form::hidden('products_id', $product->id) !!} 
			<button type="submit" class="w3ls-cart add-to-cart"><i class="fa fa-cart-arrow-down fa-lg" aria-hidden="true"></i></button>
		{!! Form::close() !!} 
		{!! Form::open(['route' => 'wishlist', 'method' => 'post', 'class' => 'right']) !!}
			{!! Form::hidden('products_id', $product->id) !!} 
			<button type="submit" class="w3ls-cart btn-wishlist add-to-cart"><i class="fa fa-heart" aria-hidden="true"></i></button>
		{!! Form::close() !!} 
	</div>
</div>

