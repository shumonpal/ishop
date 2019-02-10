<?php

namespace App\Frontend;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = ['pdt_name', 'brand_id', 'categories_id', 'products_sub_categories_id', 'price', 'up_price', 'short_descp', 'descp', 'is_hot', 'is_special', 'is_discount', 'is_featured', 'in_stock', 'banner_image', 'warranty_period'];
	
    public function categories()
    {
    	return $this->belongsTo('App\Frontend\ProductsCategory');
    }

    public function subCategories()
    {
        return $this->belongsTo('App\Frontend\ProductsSubCategory', 'products_sub_categories_id', 'id');
    }

    public function brands()
    {
    	return $this->belongsTo('App\Frontend\ProductsBrand', 'brand_id', 'id');
    }


    public function images()
    {
    	return $this->hasMany('App\Frontend\ProductsImage', 'products_id');
    }

    public function colors()
    {
        return $this->hasMany('App\Frontend\ProductsColor', 'products_id');
    }
    

    public function reviews()
    {
        return $this->hasMany('App\Frontend\ProductsReview', 'products_id');
    }


    public function sizable()
    {
        return $this->hasMany('App\Frontend\ProductsSizable', 'product_id');
    }


    public function getDiscountAttribute($id)
    {
        $product = $this->where('id', $id)->whereNotIn('is_discount', null)->first();
        return $product;
    }

    public function getIsHotAttribute()
    {
        return $this->attributes['is_hot'] == 1 ? 'Yes' : 'No';
    }

    public function getIsSpecialAttribute()
    {
        return $this->attributes['is_special'] == 1 ? 'Yes' : 'No';
    }

    public function getIsFeaturedAttribute()
    {
        return $this->attributes['is_featured'] == 1 ? 'Yes' : 'No';
    }
    

    public function getIsDiscountAttribute()
    {
        return $this->attributes['is_discount'] == null ? 'No' : $this->attributes['is_discount'];
    }

    
}
