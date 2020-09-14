<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Emps', function (Blueprint $table) {
            $table->increments('id');
           $table->string('fname');
            $table->string('lname');
            $table->string('fathername')->unique();
            $table->string('dob');
            $table->string('phone')->unique();
            $table->string('mobile')->unique();
            $table->string('email');
            $table->string('position');
            $table->string('degree');
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
        Schema::dropIfExists('Emps');
    }
}
