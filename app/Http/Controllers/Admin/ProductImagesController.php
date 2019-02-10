<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\Product;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductImageUpdateRequest;
use App\Repositories\Products\ProductImageRepository;

class ProductImagesController extends Controller
{

    /**
     * @var ProductRepositoryInterface
     */
    private $imageRepo;


    public function __construct(ProductImageRepository $productImageRepository)
    {
        $this->imageRepo = $productImageRepository;
    }

    /**
     * Store a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductImageRequest $request)
    {
        $this->imageRepo->saveProductImages($request->images, $request->pdt_id);
        
        return redirect()->back()->with('success', 'Product Succesfully Added To Database!!!');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.modal.body.products.image');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productById = Product::findOrFail($id);
        return view('admin.product.updateImage', ['productById' => $productById]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductImageUpdateRequest $request, $id)
    {  
        $this->imageRepo->updateProductImage($request->file('image'), $id);
        
        return redirect()->back()->with('success', 'Product Succesfully Added To Database!!!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->imageRepo->deleteProductImage($id);
    }
}
