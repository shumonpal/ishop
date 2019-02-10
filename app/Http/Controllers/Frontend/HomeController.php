<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Product;
use App\Frontend\ProductsCategory;
use App\Frontend\ProductsSubCategory;
use App\Frontend\ProductsBrand;
use App\Frontend\ProductsColor;
use App\Frontend\ProductsReview;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\File;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('index');
    }



    public function showPdtModal($id)
    {
        
        $pdtById = Product::findOrFail($id);
        return view('frontend.modal.productModalBody', ['pdtById' => $pdtById ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails($id)
    {
        $pdtById = Product::findOrFail($id);
        $pdtBySubCats = Product::where('products_sub_categories_id', $pdtById->categories_id)->latest()->take(8)->get();

        if ($pdtBySubCats->count() > 3) {
            $pdtByCats = $pdtBySubCats;
        }else{
            $pdtByCats = Product::where('categories_id', $pdtById->categories_id)->latest()->take(8)->get();
        }
        return view('frontend.product-details.details', ['pdtById' => $pdtById, 'pdtByCats' => $pdtByCats ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function productBy(Request $request)
    {   
        $queryStr =  str_after($request->fullUrl(), '?');
        $data = explode('=', $queryStr );

        $productBy = Product::where($data[0], $data[1])->latest()->get();
        
        return view('frontend.products.products', ['productBy' => $productBy]);
    }




    public function productFilter(Request $request)
    {   
        
        $queryStr =  str_after($request->url, '?');
        $data = explode( '=', $queryStr );
        $sort = explode( '-', $request->sort );

        if ($request->color == 'all') {
           
            $productBy = Product::where($data[0], $data[1])->whereBetween('price', [$request->min, $request->max])->orderBy($sort[0], $sort[1])->get();

        }else{
           $pdtByColor = ProductsColor::where('color', $request->color)->get();
           $unique_pdtId = $pdtByColor->unique('products_id');
           $pdtId = $unique_pdtId->pluck('products_id'); 

           $productBy = Product::whereIn('id', $pdtId)->where($data[0], $data[1])->whereBetween('price', [$request->min, $request->max])->orderBy($sort[0], $sort[1])->get();

        }

        
        return view('frontend.products.productBy', ['productBy' => $productBy]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function productReview(Request $request)
    {

        
        $this->validate($request, [
            'products_id' => 'required|integer',
            'ratings' => 'required|integer',
            'name' => 'required|max:100',
            'email' => 'required|email|max:80',
            'reviews' => 'nullable|min:10|max:1000',
            'image' => 'nullable|mimes:jpeg,bmp,png,gif',
            ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            
            $file = $request->file('image');
            $path = $file->storeAs('/images/avater',  $request->name .'-'. date('Y-m-d') .'.'. $file->extension());
            $data['image'] = 'public/'.$path;
        }

        ProductsReview::create($data);

        return redirect()->back()->with('success', 'Your review added successfull. Thank you for your review.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
