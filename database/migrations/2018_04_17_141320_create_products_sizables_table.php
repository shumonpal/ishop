<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsSizablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_sizables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index('products');
            $table->integer('size_id')->unsigned()->index('products_sizes');
            $table->timestamps();


            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('size_id')->references('id')->on('products_sizes')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_sizables');
    }
}
