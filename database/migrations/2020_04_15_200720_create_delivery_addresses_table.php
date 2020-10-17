<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ship_first_name');
            $table->string('ship_last_name');
            $table->string('ship_email');
            $table->string('ship_country');
            $table->string('ship_address');
            $table->string('ship_city');
            $table->string('ship_zip');
            $table->string('ship_state');
            $table->string('ship_phone1');
            $table->integer('user_id');
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
        Schema::dropIfExists('delivery_addresses');
    }
}
