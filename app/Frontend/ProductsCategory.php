<?php

namespace App\frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsCategory extends Model
{
    public function products()
    {
    	return $this->hasMany('App\Frontend\Product', 'categories_id');
    }

    public function subcategories()
    {
    	return $this->hasMany('App\Frontend\ProductsSubCategory', 'products_categories_id');
    }
}
