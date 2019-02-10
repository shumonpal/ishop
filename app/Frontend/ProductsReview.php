<?php

namespace App\Frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsReview extends Model
{
    protected $fillable = ['products_id', 'ratings', 'name', 'email', 'reviews', 'image'];

    public function products()
    {
    	return $this->belonsTo('App\Frontend\Product');
    }
}
