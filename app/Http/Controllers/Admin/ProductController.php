<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Frontend\ProductsSubCategory;
use App\Repositories\Products\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;


class ProductController extends Controller
{

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;


    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepo = $productRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.lists');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {   
        $data = $this->productRepo->createProduct($request);
        return redirect()->back()->with('success', 'Product Succesfully Added To Database!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectItem(Request $request)
    {
        if ($request->item) {
            $sub_cats = ProductsSubCategory::where('products_categories_id', $request->item)->get();
            return view('admin.product.select', compact('sub_cats', $sub_cats));
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepo->productById($id);
        return view('admin.modal.body.products.info', compact('product', $product));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $productById = $this->productRepo->productById($id);
        $sub_cats = ProductsSubCategory::where('products_categories_id', $productById->categories_id)->get();
        return view('admin.product.update', ['productById' => $productById, 'sub_cats' => $sub_cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $this->productRepo->productUpdate($request, $id);
        return redirect(route('products.index'))->with('success', 'Product Successfully Updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->productRepo->deleteProduct($id);
    }
}
