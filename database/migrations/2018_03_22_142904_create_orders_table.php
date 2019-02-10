<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->index('customers');
            $table->integer('product_id')->unsigned()->index('products');
            $table->integer('order_id');
            $table->integer('qty');
            $table->string('size')->nullable();
            $table->string('color')->nullable(); 
            $table->float('paymethod')->nullable();
            $table->string('total');
            $table->integer('status')->nullable()->default(0);  
            $table->timestamps();


            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
