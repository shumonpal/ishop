<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use App\Frontend\Product;

/**
* ProductComposer
*/
class ProductComposer {
	

	public function compose(View $view)
	{
		$products = Product::latest()->take(50)->get();
		$view->with('products', $products);
		
	}
	
}