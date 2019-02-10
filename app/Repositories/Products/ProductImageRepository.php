<?php 

namespace App\Repositories\Products;

use App\Frontend\Product;
use App\Frontend\ProductsImage;
use DB;
use App\Repositories\Base\BaseRepository;


/**
* ProductImageRepository
*/
class ProductImageRepository extends BaseRepository
{
	
    /**
     * ProductImageRepository constructor.
     * @param Product $product
     */
    public function __construct(ProductsImage $image)
    {
        parent::__construct($image);
        $this->model = $image;
    }



    /**
     * Update specified resource.
     *
     * @param  string  $file
     * @param  int  $id
     */

    public function updateProductImage($file, $id)
    {
        $old_image = $this->model->findOrFail($id);
        //unlink to old image if exists
        $old_path = public_path() .'/'. $old_image->image_url;
        if (file_exists($old_path)) {
            unlink($old_path);
        }


        //update to productsimages table

        $image = $this->saveFile($file, '/images/products');
        
        $old_image->image_url = $image;
        $old_image->save();         

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
     * Update specified resource.
     *
     * @param  string  $file
     * @param  int  $id
     */

    public function deleteProductImage( $id)
    {
        $old_image = $this->model->findOrFail($id);
       
        $old_image->status = 0;
        $old_image->save();         

        return;
       
    }
    

}