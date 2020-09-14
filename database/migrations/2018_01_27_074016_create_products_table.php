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
            $table->string('barcode');
            $table->string('name',100);
            $table->string('commercial_name',100);
            $table->integer('category_id');
            $table->string('exp_date');
            $table->string('purchase_price');
            $table->string('sales_price');
            $table->string('manufaturer',100);
            $table->integer('amount')->default(0);
            $table->integer('unit_id');
            $table->string('image');
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
        Schema::dropIfExists('products');
    }
}
