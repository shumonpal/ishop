<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('brand_id', 'FK_products_brands')->references('id')->on('products_brands')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('categories_id', 'FK_products_categories')->references('id')->on('products_categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
