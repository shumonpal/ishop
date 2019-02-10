<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;


class CheckoutController extends Controller
{
	

	public function checkout1()
	{
		return view('frontend.checkouts.checkout1');
	}


	public function checkout2(Request $request)
	{
		if ($request->method() == 'POST') {
			$value = session(['delivery' => $request->delivery]);

			return redirect(route('checkout3'));
		}
		return view('frontend.checkouts.checkout2');
	}
	

	public function checkout3(Request $request)
	{
		if ($request->method() == 'POST') {
			$value = session(['payment' => $request->payment]);

			return redirect(route('checkout4'));
		}

		return view('frontend.checkouts.checkout3');
	}


	public function checkout4(Request $request)
	{

		return view('frontend.checkouts.checkout4');
	}



	/*public function orders(Request $request)
	{
		//exit(session('payment'));
		if (session('payment') == 'cash') {
			
			$orders = array();

            foreach(Cart::instance('cart')->content() as $carts){
            	$orders[] = [
	            		'customer_id' => Auth::guard('customer_guard')->user()->id,
	            		'product_id' => $carts->id,
	            		'qty' => $carts->qty,
	            		'color' => $carts->color,
	            		'paymethod' => session('payment'),
	            		'created_at' => Carbon::now(),
	            		'updated_at' => Carbon::now(),
            			];
            }
            DB::table('orders')->insert($orders);
            Cart::instance('cart')->destroy();
            $request->session()->forget(['delivery', 'payment']);
			return redirect(route('orders'))->with('order-complate', 'Your order is complated! Thank you for shopping with us!');

		}
		elseif (session('payment') == 'paypal') {
			return view('frontend.checkouts.checkout4');
		}

		return view('frontend.checkouts.checkout4');
	}*/
	


}
