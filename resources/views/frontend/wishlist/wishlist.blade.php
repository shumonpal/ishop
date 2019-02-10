@extends('frontend.layout')

@section('css')
<link href="{{ asset('public/') }}/vandor/noui/nouislider.min.css" rel="stylesheet" type="text/css" media="all" />
@endsection

@section('content')
<!-- banner -->
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="{{url('/')}}"><span class="fa fa-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Shoppimg cart</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 



<div class="banner-bottom" id="content">
    <div class="container">

        <div class="col-md-9" id="basket">

            <div class="box">

				@if($wCounter = Cart::instance('wishlist')->count() > 0)
                <form method="post" class="cart-details">
                    <h1>Wishlist</h1>
                    <p class="text-muted">You currently have {{$wCounter > 0}} item(s) in your wishlist.</p>

                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit price</th>
                                    <th>Color</th>
                                    <th>Discount</th>
                                    <th colspan="2">Total</th>

                                </tr>
                            </thead>
                            <tbody>

                            @foreach(Cart::instance('wishlist')->content()->take(4) as $wishlist)
                                <tr class="cart-div">
                                    <td>
                                        <a href="{{ url('product-details', $wishlist->id) }}">
                                            <img src="{{ productsImageUrl($wishlist->id) }}" alt="{{ $wishlist->name }}">
                                        </a>
                                    </td>
                                    <td><a href="{{ url('product-details', $wishlist->id) }}">{{ $wishlist->name }}</a>
                                    </td>
                                    <td>
                                        <input type="number" value="{{ $wishlist->qty }}" class="form-control product-qty" data-url="{{route('wishlist')}}" data-id="{{ $wishlist->rowId }}">
                                    </td>
                                    <td class="price">${{ $wishlist->price }}</td>
                                    <td>{{ $wishlist->options->color ? $wishlist->options->color : 'No select' }}</td>
                                    <td>$0.00</td>
                                    <td class="pdt-total">${{ $wishlist->price * $wishlist->qty }}</td>
                                    <td width="108">
                                        	<a class="cart-delete btn btn-danger btn-xs" href="{{route('cart-delete', $wishlist->rowId)}}" data-token="{{csrf_token()}}"><i class="fa fa-trash-o"></i></a>
                                            <a class="cart-delete wishlist btn btn-primary btn-xs" href="{{route('wishlist-delete', $wishlist->rowId)}}" data-token="{{csrf_token()}}"><i class="fa fa-shopping-cart"></i></a>
                                    	
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6">Total</th>
                                    <th colspan="2" class="sub-total">${{ Cart::instance('wishlist')->subtotal() }}</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <!-- /.table-responsive -->

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="{{url('/')}}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                        </div>
                        <div class="pull-right">
                            <a href="{{route('cart')}}" class="btn btn-primary">Go to cart <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>

                @endif
                <div class="alert alert-warning text-center {{ $wCounter > 0 ? 'hidden':'' }}" style="margin-bottom: 0;height: 300px;">
                    <h1 style="margin-top: 95px;">OOPS!</h1>
                    <p class="text-muted">Your shopping cart is empty. Please go to<a class="btn" href="{{url('/')}}">shop to buy</a> </p>
                </div>
            </div>
            <!-- /.box -->


            <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height">
                        <h3>You may also like these products</h3>
                    </div>
                </div>
                @foreach($products->random(3) as $product)
                <div class="col-md-3 col-sm-6 agile_ecommerce_tab_left">
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
					<h5>
						<a href="{{ url('product-details', $product->id
				) }}">{{ $product->pdt_name }}</a>
					</h5>
					<div class="simpleCart_shelfItem">
						<p><span>${{ $product->price }}</span> <i class="item_price">${{ $product->up_price }}</i></p>

						{!! Form::open(['route' => 'cart', 'method' => 'post']) !!}
							{!! Form::hidden('products_id', $product->id) !!} 
							<button type="submit" class="w3ls-cart add-to-cart"><i class="fa fa-cart-arrow-down fa-lg" aria-hidden="true"></i></button>
							<button type="submit" class="w3ls-cart btn-wishlist add-to-cart"><i class="fa fa-heart" aria-hidden="true"></i></button>
						{!! Form::close() !!} 
					</div>
                    <!-- /.product -->
                </div>
                @endforeach
                

            </div>


        </div>
        <!-- /.col-md-9 -->

        <div class="col-md-3">

            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Order summary</h3>
                </div>
                <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order subtotal</td>
                                <th class="sub-total">${{ Cart::instance('cart')->subtotal() }}</th>
                            </tr>
                            <tr>
                                <td>Shipping and handling</td>
                                <th class="handeling">$10.00</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th class="tax">${{ Cart::instance('cart')->tax() }}</th>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <th class="grand-total">${{ Cart::instance('cart')->total()}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- /.col-md-3 -->

    </div>
    <!-- /.container -->
</div>
<!-- /#content -->

 <!-- modal-video -->
	@include('frontend.modal.productModal')
	
	<!-- //modal-video -->
@endsection