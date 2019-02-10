<?php

namespace App\Frontend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function getOrderstatusAttribute($value)
    {
    	if ($value == 0) {
    		return'Panding';
    	} elseif($value == 1) {
    		return'Shifted';
    	}elseif($value == 2) {
    		return'Confirm';
    	}
    	
    }

    public function productName($id)
    {
    	$product = Product::where('id', $id)->first();
    	return $product->pdt_name;
    }
}