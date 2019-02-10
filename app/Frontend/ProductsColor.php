<?php

namespace App\frontend;

use Illuminate\Database\Eloquent\Model;

class ProductsColor extends Model
{
     public function products()
    {
        return $this->belongsTo('App\Frontend\Product', 'id');
    }
}
