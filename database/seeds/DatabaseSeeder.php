<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Frontend\Product;
use App\Frontend\ProductsCategory;
use App\Frontend\ProductsSubCategory;
use App\Frontend\ProductsBrand;
use App\Frontend\ProductsImage;
use App\Frontend\ProductsColor;
use App\Frontend\ProductsReview;
use App\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Model::unguard();
        // $this->call(UsersTableSeeder::class);
        factory(Product::class, 100)->create();
        factory(ProductsCategory::class, 5)->create();
        factory(ProductsImage::class, 200)->create();
        factory(ProductsColor::class, 200)->create();
        factory(ProductsBrand::class, 5)->create();
        factory(ProductsSubCategory::class, 25)->create();
        factory(ProductsReview::class, 300)->create();
        factory(Customer::class, 5)->create();
    }
}
