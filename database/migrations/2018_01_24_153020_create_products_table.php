<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pdt_name', 200);
            $table->integer('brand_id')->unsigned()->nullable()->default(0)->index('products_brands');
            $table->integer('categories_id')->unsigned()->nullable()->default(0)->index('products_categories');
            $table->integer('products_sub_categories_id')->unsigned()->nullable()->default(0)->index('products_sub_categories');
            $table->float('price', 8, 2);
            $table->float('up_price', 8, 2);
            $table->text('short_descp', 65535);
            $table->text('descp', 65535);
            $table->string('composition')->nullable();
            $table->tinyInteger('is_hot');
            $table->tinyInteger('is_special');
            $table->float('is_discount')->nullable();
            $table->tinyInteger('is_featured');
            $table->integer('in_stock');
            $table->string('banner_image', 200)->nullable();
            $table->float('warranty_period', 10, 0)->nullable();
            $table->timestamps();


            /*$table->foreign('brand_id')->references('id')->on('products_brands')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('categories_id')->references('id')->on('products_categories')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('products_sub_categories_id')->references('id')->on('products_sub_categories')->onUpdate('CASCADE')->onDelete('RESTRICT');
*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
