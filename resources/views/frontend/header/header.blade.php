	<!-- header -->
	<div class="header" id="home1">
		<div class="container">
		@if(!Auth::guard('customer_guard')->check())
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#customer"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
		@endif
			<div class="w3l_logo">
				<h1><a href="{{ url('/') }}">{{__('home.header.store')}}<span>{{__('home.header.dia')}}</span></a></h1>
			</div>
			<div class="search">
				<input class="search_box" type="checkbox" id="search_box">
				<label class="icon-search" for="search_box"><span class="fa fa-search" aria-hidden="true"></span></label>
				<div class="search_form">
					<form action="#" method="post">
						<input type="text" name="Search" placeholder="Search...">
						<input type="submit" value="Send">
					</form>
				</div>
			</div>

			<div class="cart box_1 wishlistMini">
				@include('frontend.wishlist.wishlistMini')
			</div>


			<div class="cart box_1 cartMini">
				@include('frontend.carts.cartMini')
			</div>

			
		</div>
	</div>
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{__('home.menu.pdt')}} <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">

								<?php $data = $categories->take(4); ?>
								@foreach($data as $category)
									<div class="col-sm-2">
										<ul class="multi-column-dropdown">
											<a href="{{ route('product-by', ['categories_id' => $category->id]) }}">
												<h6>{{ $category->name }}</h6>			
											</a>

											@foreach($category->subcategories as $subcategory)
											<li><a href="{{ route('product-by', ['products_sub_categories_id' => $subcategory->id]) }}">{{ title_case($subcategory->name) }}</a></li>
											@endforeach

										</ul>
									</div>
								@endforeach

									<div class="col-sm-4">
										<div class="w3ls_products_pos">
											<h4>30%<i>Off/-</i></h4>
											<img src="{{ asset('public/') }}/images/1.jpg" alt=" " class="img-responsive" />
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<!-- <?php 
							$data1 = $data->last();
							$data2 = $categories->last();
							$data3 = App\Frontend\ProductsCategory::whereIn('id', [($data1->id)+1, $data2->id])->get();
						 ?>
						@if($data3->count() > 0)
						@foreach($data3 as $category1)
						<li class="w3pages dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $category1->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								@foreach($category1->subcategories as $subcategory)
								<li><a href="{{ route('product-by', ['products_sub_categories_id' => $subcategory->id]) }}">{{ title_case($subcategory->name) }}</a></li>
								@endforeach     
							</ul>
						</li>
						@endforeach
						@endif
 -->
						@if($productBrands->count() > 0)		
						<li class="w3pages dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{__('home.menu.brand')}} <span class="caret"></span></a>
							<ul class="dropdown-menu">
							@foreach($productBrands as $brand)
								<li><a href="{{ route('product-by', ['brand_id' => $brand->id]) }}">{{ title_case($brand->name) }}</a></li>     
							@endforeach
							</ul>
						</li>  
						@endif

						<li><a href="mail.html">{{__('home.menu.cntc')}}</a></li>

						<li class="w3pages dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('home.header.lang') }}<span class="caret"></span></a>
							<ul class="dropdown-menu">
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
		                        <li>
		                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
		                                {{ $properties['native'] }}
		                            </a>
		                        </li>
		                    @endforeach    
							</ul>
						</li>

					@if(Auth::guard('customer_guard')->check())
						<li class="w3pages dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{title_case(Auth::guard('customer_guard')->user()->firstname)}} <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">{{ title_case('Account') }}</a></li> 
								<li><a href="{{route('cart')}}">Carts ({{Cart::instance('cart')->content()->count()}})</a></li> 
								<li><a href="{{route('wishlist')}}">Wishlists ({{Cart::instance('wishlist')->content()->count() }})</a></li>
								<li><a href="{{route('orders')}}">Orders ({{Cart::instance('wishlist')->content()->count() }})</a></li> 
								<li>
									<a href="#"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
									{!! Form::open(['url' => 'customer-logout', 'id' => 'logout-form']) !!}
									{!! Form::close() !!}
								</li>  
							</ul>
						</li> 
					@endif
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->