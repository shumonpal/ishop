<?php

namespace App\frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsSubCategory extends Model
{
    public function categories()
    {
    	return $this->belongsTo('App\Frontend\ProductsCategory');
    }

    public function products()
    {
    	return $this->hasMany('App\Frontend\Product', 'products_sub_categories_id');
    }
}
