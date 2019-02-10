<?php

namespace App\Frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsImage extends Model
{


    public function products()
    {
    	return $this->belongsTo('App\Frontend\Product');
    }
}
