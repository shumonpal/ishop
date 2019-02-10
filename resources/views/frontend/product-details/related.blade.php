<div class="w3l_related_products">
	<div class="container">
		<h3>Related Products</h3>
		<ul id="flexiselDemo2">	
			@foreach($pdtByCats as $product)		
				<li>
					<div class="w3l_related_products_grid">
						<div class="agile_ecommerce_tab_left mobiles_grid">

							<div class="hs-wrapper hs-wrapper3">
							<img src="{{ productsImageUrl($product->id) }}" alt=" " class="img-responsive" />
							
							<div class="w3_hs_bottom">
								<div class="flex_ecommerce">
									<a class="show-modal" href="{{ url('/showPdtModal', [ 'pdtId' =>	 $product->id]) }}" data-toggle="modal">
									<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
									</a>
								</div>
							</div>
						</div>
						<h5><a href="{{ url('product-details',  $product->id ) }}">{{ $product->pdt_name }}</a></h5>
						<div class="simpleCart_shelfItem">
							<p><span>${{ $product->price }}</span> <i class="item_price">${{ $product->up_price }}</i></p>
							<form action="#" method="post">
								<input type="hidden" name="cmd" value="_cart" />
								<input type="hidden" name="add" value="1" /> 
								<input type="hidden" name="w3ls_item" value="{{ $product->pdt_name }}" /> 
								<input type="hidden" name="amount" value="{{ $product->price }}" />   
								<button type="submit" class="w3ls-cart add-to-cart">Add to cart</button>
							</form>  
						</div>
							
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		
			<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo2").flexisel({
						visibleItems:4,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 1
							}, 
							landscape: { 
								changePoint:640,
								visibleItems:2
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				});
			</script>
			<script type="text/javascript" src="{{ asset('public/') }}/js/jquery.flexisel.js"></script>
	</div>
</div>

	@include('frontend.modal.productModal')