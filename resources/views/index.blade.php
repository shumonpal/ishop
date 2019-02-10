
@extends('frontend.layout')

@section('content')
	
	
	<!-- banner -->
	<div class="banner">
		<div class="container">
			<h3>Electronic Store, <span>Special Offers</span></h3>
		</div>
	</div>
	<!-- //banner --> 

	<!-- mainProducts -->
	@include('frontend.indexSection.mainProducts')
	<!-- mainProducts -->


	<!-- hot Deals -->
	@include('frontend.indexSection.hotDeal')
	<!-- hot Deals -->

	<!-- special-deals -->
	@include('frontend.indexSection.specialDeal')
	<!-- //special-deals -->

	<!-- new-products -->
	@include('frontend.indexSection.newProduct')
	<!-- //new-products -->

	<!-- top-brands -->
	@include('frontend.indexSection.topBrand')
	<!-- //top-brands --> 

@endsection