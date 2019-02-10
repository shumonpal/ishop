	<div class="new-products">
		<div class="container">
			<h3>New Products</h3>
			<div class="agileinfo_new_products_grids">

			@foreach($products->take(4) as $product)
				<div class="col-md-3 agileinfo_new_products_grid">
					<div class="agile_ecommerce_tab_left agileinfo_new_products_grid1">
						<div class="hs-wrapper hs-wrapper1">
							<img src="{{ productsImageUrl($product->id) }}" alt=" " class="img-responsive" /> 
							<div class="w3_hs_bottom w3_hs_bottom_sub">
								<ul>
									<li>
										<a class="show-modal" href="{{ url('/showPdtModal', [ 'pdtId' =>	 $product->id]) }}" data-toggle="modal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
									</li>
								</ul>
							</div>
						</div>
						<h5><a href="{{ url('product-details', $product->id
				) }}">Laptops</a></h5>
						<div class="simpleCart_shelfItem">
							<p><span>${{ $product->up_price }}</span> <i class="item_price">${{ $product->price }}</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart">
								<input type="hidden" name="add" value="1"> 
								<input type="hidden" name="w3ls_item" value="{{ $product->pdt_name }}"> 
								<input type="hidden" name="amount" value="{{ $product->price }}">   
								<button type="submit" class="w3ls-cart">Add to cart</button>
							</form>
						</div>
					</div>
				</div>
			@endforeach

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>