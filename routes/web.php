<?php

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	//Customer Auth
	

	Route::get('/', 'Frontend\HomeController@index');

	Route::get('showPdtModal/{id}', 'Frontend\HomeController@showPdtModal');
	Route::get('product-details/{id}', 'Frontend\HomeController@productDetails');
	Route::get('product-by', 'Frontend\HomeController@productBy')->name('product-by');
	Route::get('product-filter', 'Frontend\HomeController@productFilter')->name('product-filter');
	Route::post('product-review', 'Frontend\HomeController@productReview')->name('review');

	// cart
	Route::get('cart', 'Frontend\CartController@index')->name('cart');
	Route::post('cart', 'Frontend\CartController@getCart')->name('cart');
	Route::post('cart-delete/{id}', 'Frontend\CartController@deleteCart')->name('cart-delete');

	//wishlist
	Route::get('wishlist', 'Frontend\WishlistController@index')->name('wishlist');
	Route::post('wishlist', 'Frontend\WishlistController@getWishlist')->name('wishlist');
	Route::post('wishlist-delete/{id}', 'Frontend\WishlistController@addCart')->name('wishlist-delete');

	// checkout
	Route::group(['middleware' => 'customer'], function(){
		Route::group(['middleware' => 'emptyCart'], function(){
			Route::get('checkout-step-1', 'Frontend\CheckoutController@checkout1')->name('checkout1');
			Route::match(['get', 'post'], 'checkout-step-2', 'Frontend\CheckoutController@checkout2')->name('checkout2');
			Route::match(['get', 'post'], 'checkout-step-3', 'Frontend\CheckoutController@checkout3')->name('checkout3');
			Route::get('checkout-step-4', 'Frontend\CheckoutController@checkout4')->name('checkout4');
		});

		Route::match(['get', 'post'], 'orders', 'Frontend\OrderController@index')->name('orders');
		
	});


	/*
	|--------------------------------------------------------------------------
	| Backend routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for Admin. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/
	Route::group(['prefix' => 'admin'], function(){
		//Auth::routes();
		Route::group(['middleware' => 'admin'], function(){
			Route::get('/', 'Admin\HomeController@index');
			Route::get('pro-version/{param}', 'Admin\HomeController@proVersion')->name('pro-version');
			Route::resource('products', 'Admin\ProductController');
			Route::post('select', 'Admin\ProductController@selectItem')->name('select');
			Route::resource('product-images', 'Admin\ProductImagesController', ['except' => ['index', 'create']]);
			
		});
	});


	

});

// Routes without transilate
//frontend
Route::post('customer-register', 'AuthCustomer\ResisterController@register');
Route::match(['put', 'patch'], 'customer-register/{id}', 'AuthCustomer\ResisterController@update');

Route::post('customer-logout', 'AuthCustomer\LoginController@logout');
Route::post('customer-login', 'AuthCustomer\LoginController@login');

//backend
Route::group(['prefix' => 'admin'], function(){
		Route::get('/login', 'Admin\Auth\LoginController@showLoginForm')
		;
		Route::post('/login', 'Admin\Auth\LoginController@login')->name('admin-login');
		Route::post('/logout', 'Admin\Auth\LoginController@logout')->name('admin-logout');
		Route::get('/register', 'Admin\Auth\RegisterController@showRegiForm');
		Route::post('/register', 'Admin\Auth\RegisterController@register')->name('admin-register');

});
