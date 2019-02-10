
<div class="dropdown">
  <button class="btn btn-lg btn-primary btn-color dropdown-toggle border-corner" type="button" data-toggle="dropdown"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span class="cart-counter">({{$wishlistCounter = Cart::instance('cart')->content()->count()}})</span></button>

  @if($wishlistCounter > 0)
  <ul class="dropdown-menu dropdown-menu-right width-300">
  		<li class="sbmincart-item sbmincart-item-changed">   
			<ul>
				<li class="color-black">
					Product Name
				</li>
				<li class="color-black">
					Quantity
				</li>
				<li class="color-black">
					Total
				</li>
			</ul>
			
		</li> 
    @foreach(Cart::instance('cart')->content()->take(4) as $carts)
		<li class="sbmincart-item">   
			<ul>
				<li>
					<a href="">{{ $carts->name }}</a>
				</li>
				<li>
					{{ $carts->qty }}
				</li>
				<li>
					${{ $carts->price * $carts->qty }}
				</li>
			</ul>
			
		</li> 
	@endforeach
	<li class="sbmincart-item">   
		<ul>
			<li class="color-black">
				<a href="{{route('cart')}}">Go to Cart</a>
			</li>
			<li class="color-black" style="float: none">
				Subtotal:${{Cart::instance('cart')->subtotal()}} 
			</li>
		</ul>
		
	</li> 
  </ul>

  @else
  	<div class="dropdown-menu alert alert-info">Your shopping cart is empty!</div>				  
  @endif
</div>