	<div class="top-brands">
		<div class="container">
			<h3>Top Brands</h3>
			<div class="sliderfig">
				<ul id="flexiselDemo1">	

					@if($productBrands->count() > 0)
						@foreach($productBrands as $brand)
						<li>
							<a href="{{ url('product-by-category', ['brand-id' => $brand->id]) }}"><img src="{{ asset($brand->logo) }}" alt=" " class="img-responsive" /></a>
						</li>     
						@endforeach
					@endif					
					
				</ul>
			</div>
			<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
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