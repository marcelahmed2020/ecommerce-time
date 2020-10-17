<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('zip');
            $table->string('birth');
            $table->string('company')->default('none');
            $table->string('title');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->string('phone1');
            $table->string('phone2')->default(0);
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('users_infos');
    }
}
