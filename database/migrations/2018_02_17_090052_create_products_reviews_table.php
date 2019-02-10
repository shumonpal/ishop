<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('products_id')->unsigned()->index('products');
            $table->integer('ratings');
            $table->string('name')->nullable();
            $table->string('email', 80)->unique();
            $table->text('reviews');
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('products_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_reviews');
    }
}
