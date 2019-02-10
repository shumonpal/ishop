<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Product;
use Cart;
class CartController extends Controller
{
	public function totalPrice()
	{
		$total = array();
			$total['subtotal'] = Cart::instance('cart')->subtotal();
			$total['total'] = Cart::instance('cart')->total();
			$total['tax'] = Cart::instance('cart')->tax();

			return $total;
	}

	public function index(Request $request)
	{
		if ($request->qty) {
			$cart = Cart::instance('cart')->update($request->rowId, $request->qty);

			return $this->totalPrice();

		}
		return view('frontend.carts.cart');
	}
	

    public function getCart(Request $request)
    {
    	$product = Product::findOrFail($request->products_id);    	

    	if (!$request->color) {

    		Cart::instance('cart')->add($product->id, $product->pdt_name, 1, $product->price);

    	}else{
    		Cart::instance('cart')->add($product->id, $product->pdt_name, $request->qty, $product->price, ['color' => $request->color]);
    	}
    	return view('frontend.carts.cartMini');
    }

    public function deleteCart($id)
    {
    	Cart::instance('cart')->remove($id);
    	return $this->totalPrice();
    }


}
