<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_email');
            $table->bigInteger('user_id');
            $table->string('country');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('state');
            $table->string('arrived');
            $table->string('phone1');
            $table->string('shiping_charges')->default(0);
            $table->string('coupon_code')->default(0);
            $table->string('coupon_amount')->default(0);
            $table->string('order_status')->default(0);
            $table->string('payment_method')->default(0);
            $table->bigInteger('grand_total');
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
        Schema::dropIfExists('orders');
    }
}
