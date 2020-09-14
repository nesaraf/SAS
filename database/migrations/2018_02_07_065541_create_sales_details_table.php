<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sales_id');
            $table->integer('product_id');
            $table->integer('quantity');
            $table->double('unit_price', 15, 2);
            $table->double('total_price', 15, 2);
            $table->double('discount', 15, 2)->default(0);
            $table->double('net_price', 15, 2);
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_details');
    }
}
