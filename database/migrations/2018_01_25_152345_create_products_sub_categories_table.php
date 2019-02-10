<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('products_categories_id')->unsigned()->nullable()->default(0)->index('products_categories');
            $table->text('descp', 65555);
            
            $table->timestamps();

            $table->foreign('products_categories_id')->references('id')->on('products_categories')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_sub_categories');
    }
}
