<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>{{config('app.name')}} | @yield('title', 'Home') </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<!-- {!! Html::style('css/bootstrap.css') !!}
{!! Html::style('css/style.css') !!}
{!! Html::style('css/custom.css') !!}
{!! Html::style('css/fasthover.css') !!}
{!! Html::style('css/popuo-box.css') !!}
{!! Html::style('css/popuo-box.css') !!}
{!! Html::style('vandor/star/css/star-rating.css') !!}
{!! Html::style('vandor/toastr/toastr.css') !!}
{!! Html::style('css/font-awesome.css') !!} -->
<link href="{{ asset('public/') }}/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/css/custom.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/vandor/star/css/star-rating.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/vandor/toastr/toastr.css" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('public/') }}/css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />

<!-- //Custom Theme files -->
@yield('css')
<!-- //font-awesome icons -->
<!-- js -->


<script src="{{ asset('public/') }}/js/jquery.min.js"></script>
<link href="{{ asset('public/') }}/css/jquery.countdown.css" rel="stylesheet" type="text/css" media="all" /><!-- countdown --> 
<!-- //js -->  
<!-- web fonts --> 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script type="text/javascript">
	window.Laravel = <?php echo json_encode([
		'csrfToken' => csrf_token(),
		]); ?>
</script>

<!-- for bootstrap working -->
<script src="{{ asset('public/') }}/js/bootstrap-3.1.1.min.js"></script>
<!-- {!! Html::script('js/bootstrap-3.1.1.min.js') !!} -->
<!-- //for bootstrap working -->
<!-- //web fonts -->  
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling --> 
</head> 
<body>

	
	@include('frontend.header.header')
	@include('frontend.header.headerModel')

	@yield('content')

		<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="col-md-6 w3agile_newsletter_left">
				<h3>Newsletter</h3>
				<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
			</div>
			<div class="col-md-6 w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" placeholder="Email" required="">
					<input type="submit" value="" />
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //newsletter -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="w3_footer_grids">
				<div class="col-md-3 w3_footer_grid">
					<h3>Contact</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
					<ul class="address">
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Information</h3>
					<ul class="info"> 
						<li><a href="about.html">About Us</a></li>
						<li><a href="mail.html">Contact Us</a></li>
						<li><a href="codes.html">Short Codes</a></li>
						<li><a href="faq.html">FAQ's</a></li>
						<li><a href="products.html">Special Products</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Category</h3>
					<ul class="info"> 
						<li><a href="products.html">Mobiles</a></li>
						<li><a href="products1.html">Laptops</a></li>
						<li><a href="products.html">Purifiers</a></li>
						<li><a href="products1.html">Wearables</a></li>
						<li><a href="products2.html">Kitchen</a></li>
					</ul>
				</div>
				<div class="col-md-3 w3_footer_grid">
					<h3>Profile</h3>
					<ul class="info"> 
						<li><a href="index.html">Home</a></li>
						<li><a href="products.html">Today's Deals</a></li>
					</ul>
					<h4>Follow Us</h4>
					<div class="agileits_social_button">
						<ul>
							<li><a href="#" class="facebook"> </a></li>
							<li><a href="#" class="twitter"> </a></li>
							<li><a href="#" class="google"> </a></li>
							<li><a href="#" class="pinterest"> </a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-copy">
			<div class="footer-copy1">
				<div class="footer-copy-pos">
					<a href="#home1" class="scroll"><img src="{{ asset('public/') }}/images/arrow.png" alt=" " class="img-responsive" /></a>
				</div>
			</div>
			<div class="container">
				<p>&copy; 2017 Electronic Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
	<!-- //footer --> 
	<!-- cart-js -->
	<!-- <script src="{{ asset('public/') }}/js/minicart.js"></script> -->
	<!-- {!! Html::script('js/custom.js') !!} 
	{!! Html::script('vandor/star/js/star-rating.js') !!} 
	{!! Html::script('vandor/toastr/toastr.min.js') !!}  -->
	<script src="{{ asset('public/') }}/js/custom.js"></script>
	<script src="{{ asset('public/') }}/vandor/star/js/star-rating.js"></script>
	<script src="{{ asset('public/') }}/vandor/star/theme/theme.js"></script>
	<script src="{{ asset('public/') }}/vandor/toastr/toastr.min.js"></script>
	<script>
    </script>  
	<!-- //cart-js -->   
</body>
</html>