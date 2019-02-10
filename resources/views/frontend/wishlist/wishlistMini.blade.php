
<div class="dropdown">
  <button class="btn btn-lg btn-default dropdown-toggle border-corner" type="button" data-toggle="dropdown" style="color:#f38c87"><i class="	glyphicon glyphicon-heart" aria-hidden="true"></i><span class="wishlist-counter">({{$cartCounter = Cart::instance('wishlist')->content()->count()}})</span></button>

  @if($cartCounter > 0)
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
    @foreach(Cart::instance('wishlist')->content()->take(4) as $carts)
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
		<a class="btn text-right" href="{{route('wishlist')}}">Details</a>			
	</li> 
  </ul>
  @else
  	<div class="dropdown-menu alert alert-info">Your wishlist is empty!</div>				  
  @endif
</div>