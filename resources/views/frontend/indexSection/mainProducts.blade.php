<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="col-md-5 wthree_banner_bottom_left">
				<div class="video-img">
					<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
						<span class="glyphicon glyphicon-expand" aria-hidden="true"></span>
					</a>
				</div> 
					<!-- pop-up-box -->     
					<script src="{{ asset('public/') }}/js/jquery.magnific-popup.js" type="text/javascript"></script>
					<!--//pop-up-box -->
					<div id="small-dialog" class="mfp-hide">
						<iframe src="{{ asset('public/') }}/https://www.youtube.com/embed/ZQa6GUVnbNM"></iframe>
					</div>
					<script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
							type: 'inline',
							fixedContentPos: false,
							fixedBgPos: true,
							overflowY: 'auto',
							closeBtnInside: true,
							preloader: false,
							midClick: true,
							removalDelay: 300,
							mainClass: 'my-mfp-zoom-in'
						});
																						
						});
					</script>
			</div>
			<div class="col-md-7 wthree_banner_bottom_right">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
					<?php $i = 1; ?>

					@foreach($categories as $category)
						<li role="presentation" class="{{ $i == 1 ? 'active' : '' }}"><a href="#{{ $category->name }}" id="{{ $category->name }}-tab" role="tab" data-toggle="tab" aria-controls="{{ $category->name }}">{{ $category->name }}</a></li>

						<?php $i++; ?>
					@endforeach

						
					</ul>

					<div id="myTabContent" class="tab-content">

					<?php $j = 1; ?>
					@foreach($categories as $category)		

						<div role="tabpanel" class="tab-pane fade {{ $j == 1 ? 'active' : '' }} in" id="{{ $category->name }}" aria-labelledby="{{ $category->name }}-tab">
							<div class="agile_ecommerce_tabs">

							@foreach($category->products->take(6) as $product)

							<div class="col-md-4">
							@include('frontend.products.product')
							</div>

							@endforeach
							
								<div class="clearfix"> </div>
							</div>
						</div>
						<?php $j++; ?>
					@endforeach

					</div>
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //banner-bottom --> 
	<!-- modal-video -->
	@include('frontend.modal.productModal')
	
	<!-- //modal-video -->