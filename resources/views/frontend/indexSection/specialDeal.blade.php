<?php 
	$special = $products->where('is_special', 1)->whereNotIn('is_discount', null)->first();
 ?>
@if($special)
	<div class="special-deals">
		<div class="container">
			<h2>Special Deals</h2>
			<div class="w3agile_special_deals_grids">
				<div class="col-md-7 w3agile_special_deals_grid_left">
					<div class="w3agile_special_deals_grid_left_grid">
						<img src="{{ asset('public/') }}/images/21.jpg" alt=" " class="img-responsive" />
						<div class="w3agile_special_deals_grid_left_grid_pos1">
							<h5>{{ $special->is_discount }}%<span>Off/-</span></h5>
						</div>
						<div class="w3agile_special_deals_grid_left_grid_pos">
							<h4>We Offer <span>Best Products</span></h4>
						</div>
					</div>
					<div class="wmuSlider example1">
						<div class="wmuSliderWrapper">
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="{{ asset('public/') }}/images/t1.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Laura</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="{{ asset('public/') }}/images/t2.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Michael</h4>
									</div>
								</div>
							</article>
							<article style="position: absolute; width: 100%; opacity: 0;"> 
								<div class="banner-wrap">
									<div class="w3agile_special_deals_grid_left_grid1">
										<img src="{{ asset('public/') }}/images/t3.png" alt=" " class="img-responsive" />
										<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
											velit esse quam nihil molestiae consequatur, vel illum qui dolorem 
											eum fugiat quo voluptas nulla pariatur</p>
										<h4>Rosy</h4>
									</div>
								</div>
							</article>
						</div>
					</div>
						<script src="{{ asset('public/') }}/js/jquery.wmuSlider.js"></script> 
						<script>
							$('.example1').wmuSlider();         
						</script> 
				</div>
				<div class="col-md-5 w3agile_special_deals_grid_right">
					<img src="{{ asset('public/') }}/images/20.jpg" alt=" " class="img-responsive" />
					<div class="w3agile_special_deals_grid_right_pos">
						<h4>Women's <span>Special</span></h4>
						<h5>save up <span>to</span> 30%</h5>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@endif