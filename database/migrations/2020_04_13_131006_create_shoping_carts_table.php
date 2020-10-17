<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_desc');
            $table->string('image');
            $table->string('size');
            $table->string('code')->default(0);
            $table->string('color')->default(0);
            $table->string('quantity')->default(0);
            $table->string('session_id')->default(0);
            $table->string('email');
            $table->float('price');
            $table->integer('enabled')->default(1);
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id')->default(0);
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
        Schema::dropIfExists('shoping_carts');
    }
}
