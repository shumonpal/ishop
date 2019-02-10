<?php

namespace App\frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsBrand extends Model
{
    

    public function products()
    {
    	return $this->hasMany('App\Frontend\Product', 'brand_id');
    }
}
