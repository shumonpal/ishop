<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Product;
use Cart;
class WishlistController extends Controller
{
	public function totalPrice()
	{
		$total = array();
			$total['subtotal'] = Cart::instance('wishlist')->subtotal();
			$total['total'] = Cart::instance('wishlist')->total();
			$total['tax'] = Cart::instance('wishlist')->tax();

			return $total;
	}

	public function index(Request $request)
	{
		if ($request->qty) {
			Cart::instance('wishlist')->update($request->rowId, $request->qty);

			return $this->totalPrice();

		}
		return view('frontend.wishlist.wishlist');
	}



    public function getWishlist(Request $request)
    {
    	$product = Product::findOrFail($request->products_id);
    	if (!$request->color) {

    		Cart::instance('wishlist')->add($product->id, $product->pdt_name, 1, $product->price, ['color' => 'no-select']);

    	}
    	return view('frontend.wishlist.wishlistMini');
    }

    public function deleteCart($id)
    {
    	Cart::instance('wishlist')->remove($id);
    	return $this->totalPrice();
    }

    public function addCart($id)
    {
    	$list = Cart::instance('wishlist')->get($id);
    	Cart::instance('cart')->add($list->id, $list->name, $list->qty, $list->price, ['color' => 'no-select']);
    	Cart::instance('wishlist')->remove($id);
    	return $this->totalPrice();
    }
}
