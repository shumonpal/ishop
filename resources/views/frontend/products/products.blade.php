@extends('frontend.layout')

@section('css')
<link href="{{ asset('public/') }}/vandor/noui/nouislider.min.css" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
<!-- banner -->
<div class="banner banner1">
	<div class="container">
		<h2>Great Offers on <span>Mobiles</span> Flat <i>35% Discount</i></h2> 
	</div>
</div> 
<!-- breadcrumbs -->
<div class="breadcrumb_dress">
	<div class="container">
		<ul>
			<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
			<li>Products</li>
		</ul>
	</div>
</div>
<!-- //breadcrumbs --> 
<!-- mobiles -->
<div class="mobiles">
	<div class="container">
		<div class="w3ls_mobiles_grids">
			<div class="col-md-4 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Categories
					</h4>

					<ul class="p-b-54">
					@foreach($categories as $category)
						<li class="p-t-4">
							<a href="{{ route('product-by', ['categories_id' => $category->id]) }}" class="s-text13 
							{{Request::query('categories_id') == $category->id ? 'active' : ''}}">
								{{ title_case($category->name) }}
							</a>
						</li>
					@endforeach
						
					</ul>

					<!--  -->
					<h4 class="m-text14 p-b-32">
						Filters
					</h4>

					<div class="filter-price p-t-22 p-b-50 bo3">
						<div class="m-text14 p-b-17">
							Price
						</div>

						<div class="wra-filter-bar">
							<div id="filter-bar" data-url="{{ Request::fullUrl() }}" data-href="{{ route('product-filter') }}"></div>
						</div>

						<div class="flex-sb-m flex-w p-t-16">
							<div class="w-size11">
							</div>

							<div class="s-text3 p-t-10 p-b-10">
								Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
							</div>
						</div>
					</div>

	<script type="text/javascript" src="{{ asset('public/vandor/noui/nouislider.min.js') }}"></script>				
	<script type="text/javascript">
	/*[ No ui ]
    ===========================================================*/

    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [ {{$products->min('price')}}, {{$products->max('price')}} ],
        connect: true,
        range: {
            'min': {{$products->min('price')}},
            'max': {{$products->max('price')}}
        }
    });

    var skipValues = [
    document.getElementById('value-lower'),
    document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function( values, handle ) {
        skipValues[handle].innerHTML = Math.round(values[handle]) ;
    });
</script>
					<div class="filter-color p-t-22 p-b-50 bo3">
						<div class="m-text15 p-b-10">
							Color
						</div>

						<ul class="flex-w">
						<?php 
							$colors = App\Frontend\ProductsColor::all();
							$unq_colors = $colors->unique('color');
							//$pdt = App\Frontend\ProductsColor::where('color', '#4b1acd')->get();
						 ?>
						@if($unq_colors->count() > 0)
							<li class="m-r-10">
								<label class="color-filter" for="color-filter" style="background-color: white;" ></label>
								<input class="checkbox-color-filter products-filter active-color" id="color-filter" type="radio" name="color-filter" value="all" checked="true">
								
							</li>
						@foreach($unq_colors as $color)
							<li class="m-r-10">
								<label class="color-filter" for="color-filter" style="background-color: {{ $color->color }};"></label>
								<input class="checkbox-color-filter products-filter" id="color-filter" type="radio" name="color-filter" value="{{$color->color}}">
								
							</li>
						@endforeach
						@endif	
							
						</ul>
					</div>

					<h4 class="m-text14 p-b-7 p-t-22 bo3">
						Brands
					</h4>

					<ul class="p-b-54">
					@foreach($productBrands as $brand)
						<li class="p-t-4">
							<a href="{{ route('product-by', ['brand_id' => $brand->id]) }}" class="s-text13 {{Request::query('brand_id') == $brand->id ? 'active' : ''}}">
								{{ title_case($brand->name) }}
							</a>
						</li>
					@endforeach
						
					</ul>

					<div class="search-product pos-relative bo4 of-hidden">
						<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

						<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
							<i class="fs-12 fa fa-search" aria-hidden="true"></i>
						</button>
					</div>


				</div>
			</div>
			<div class="col-md-8 w3ls_mobiles_grid_right">
				

				<div class="w3ls_mobiles_grid_right_grid2">
					<div class="w3ls_mobiles_grid_right_grid2_left">
						<h3>Showing Results: 0-1</h3>
					</div>
					<div class="w3ls_mobiles_grid_right_grid2_right">
						<select name="select_item" class="select_item" style="padding:13px 20px">
							<option value="id-asc" selected="selected">Default sorting</option>
							<option value="updated_at-desc">Sort by popularity</option>
							<option value="updated_at-desc">Sort by average rating</option>
							<option value="updated_at-desc">Sort by newness</option>
							<option value="price-asc">Sort by price: low to high</option>
							<option value="price-desc">Sort by price: high to low</option>
						</select>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div id="products-body" class="w3ls_mobiles_grid_right_grid3">


					@include('frontend.products.productBy')
						
					<div class="clearfix"> </div>
				</div>
				
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>  
 <!-- modal-video -->
	@include('frontend.modal.productModal')
	
	<!-- //modal-video -->
@endsection