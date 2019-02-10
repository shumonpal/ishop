<?php 

namespace App\Repositories\Products;

use App\Frontend\Product;
use App\Frontend\ProductsImage;
use DB;
use App\Repositories\Base\BaseRepository;


/**
* ProductRepository
*/
class ProductRepository extends BaseRepository
{
	
    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->model = $product;
    }


     /**
     * List all the products
     *
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return Collection
     */
    
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']) 
    {
        return $this->all($columns, $order, $sort);
    }

    public function productById($id)
    {
        return $this->findOneOrFail($id);
    }


    public function createProduct($request)
    {


        $banner = $this->saveFile($request->file('banner_image'), '/images/products/banners');

        $data = $request->all();
        $data['banner_image'] = $banner;

        //data save to products table
        $product = $this->model->create($data);

        //data save to products_images table
        $this->saveProductImages($request->image, $product->id);
        
        //data save to products_colors table
        $this->saveProductColor($request->color, $product->id);

        //data save to products_colors table
        $this->saveProductSize($request->size, $product->id);
        
        return;

    }

    /**
     * Save specified resource.
     *
     * @param  array  $images
     * @param  int  $id
     */

    public function saveProductImages(array $images, $id)
    {
        $productImage = array();

        //save to productsimages table
        foreach ($images as $image) {
            $image = $this->saveFile($image, '/images/products');

            $productImage[] = [
                'products_id' => $id,
                'image_url' => $image,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

        }
        DB::table('products_images')->insert($productImage);

        
    }


    /**
     * Save specified resource.
     *
     * @param  array  $colors
     * @param  int  $id
     */
    public function saveProductColor(array $colors, $id){
        $productcolors = array();

        //save to productsimages table
        foreach ($colors as $color) {

            $productcolors[] = [
                'products_id' => $id,
                'color' => $color,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

        }
        DB::table('products_colors')->insert($productcolors);
    }

    /**
     * Save specified resource.
     *
     * @param  array  $colors
     * @param  int  $id
     */
    public function saveProductSize(array $sizes, $id){
        $productsizes = array();

        //save to productsimages table
        foreach ($sizes as $size) {

            $productsizes[] = [
                'product_id' => $id,
                'size_id' => $size,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ];

        }
        DB::table('products_sizables')->insert($productsizes);
    }



    /**
     * Update specified resource.
     *
     * @param  array  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function productUpdate($request, $id)
    {
        $data = $request->all();
        $product = $this->model->find($id);

        //Update Banner image if exists
        if ($request->hasFile('banner_image')) {
            $file_name = $request->file('banner_image');
            $new_path = '/images/products/banners/';

            if ($product->banner_image !== null) {               
                $old_path = public_path() .'/'. $product->banner_image;
                if (file_exists($old_path)) {
                    unlink($old_path);
                }
            }
            $path = $this->saveFile($file_name, $new_path);
            $data['banner_image'] = $path;

        }

         
        $data = $product->update($data);
        
        return;
    }


    /**
     * Delete specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deleteProduct($id)
    {
        return $product = $this->model->destroy($id);
    }

}

 ?>