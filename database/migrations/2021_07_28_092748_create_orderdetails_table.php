<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id')->nullable(false);
            $table->unsignedInteger('car_id')->nullable(false);
            $table->integer('quantityOrdered')->nullable(false);
            $table->double('priceEach')->nullable(false);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderdetails');
    }
}
