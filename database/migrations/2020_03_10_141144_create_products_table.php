<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short_desc');
            $table->string('code')->default(0);
            $table->string('color')->default('None');
            $table->string('sleeve')->default('None');
            $table->string('brand')->default('None');
            $table->string('stock')->default(0);
            $table->text('desc');
            $table->integer('diffrent_size')->default(0);
            $table->float('price');
            $table->float('purchasing_price');
            $table->integer('viewer')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('enabled')->default(1);
            $table->integer('status')->default(1);
            $table->integer('edit')->default(0);
            $table->integer('delete')->default(0);
            $table->integer('rated')->default(1);
            $table->unsignedBigInteger('cat_id');
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
