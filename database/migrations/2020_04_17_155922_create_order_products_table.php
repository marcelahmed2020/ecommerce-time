<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->string('title');
            $table->string('short_desc');
            $table->string('code')->default(0);
            $table->string('quntity')->default(0);
            $table->string('size')->default(0);
            $table->text('desc');
            $table->float('price');
            $table->integer('enabled')->default(1);
            $table->integer('status')->default(1);
            $table->integer('edit')->default(0);
            $table->integer('delete')->default(0);
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
        Schema::dropIfExists('order_products');
    }
}
