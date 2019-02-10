<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pdt_name' => 'required|max:255',
            'brand_id' => 'required',
            'categories_id' => 'required',
            'categories_id' => 'required',
            'products_sub_categories_id' => 'required',
            'price' => 'required|max:255',
            'up_price' => 'max:255',
            'short_descp' => 'required|max:1000',
            'descp' => 'required|max:3500',
            'in_stock' => 'integer|max:255',
            'warrenty_period' => 'integer|max:255',
            'banner_image' => 'mimes:jpeg,gif,png',
            'image.*' => 'mimes:jpeg,gif,png',
            'color' => 'max:255',
        ];
    }
}
