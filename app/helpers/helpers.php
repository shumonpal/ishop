<?php 

	

	if ( ! function_exists( 'productsImageUrl' )) {
		
		function productsImageUrl($id)
		{
			$url =  App\Frontend\ProductsImage::where('products_id', $id)->first();
			if (empty($url)) {
				return asset('/public/images/11.jpg');
			}
			return asset($url->image_url);

		}
	}

	if ( ! function_exists( 'productsImageUrls' )) {
		
		function productsImageUrls($id)
		{
			$products =  App\Frontend\ProductsImage::where('products_id', $id)->get();
			if (empty($products)) {
				return asset('/public/images/11.jpg');
			}
			return $products;			

		}
	}

	if ( ! function_exists( 'productsEmptyImageUrl' )) {
		
		function productsEmptyImageUrl()
		{
			return '/public/images/11.jpg';

		}
	}

	if ( ! function_exists( 'productsColor' )) {
		
		function productsColor($id)
		{
			$colors =  App\Frontend\ProductsColor::where('products_id', $id)->get();
			if ($colors->count() > 0) {
				return $colors;
			}
			

		}
	}


	if ( ! function_exists( 'messege' )) {
		
		function messege($className, $messege)
		{
			echo '<div class="alert alert-'.$className.'">'.$messege.'</div>';

		}
	}

