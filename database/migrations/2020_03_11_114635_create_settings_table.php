<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->default('GrafixEG');
            $table->string('adress')->default(' 119 El Karnak Tower , Masr Helwan Road , Maadi , Cairo , Egypt');
            $table->string('phone1')->default(' (+2) 252 845 40');
            $table->string('phone2')->default('  (+2) 0100 753 1970');
            $table->string('phone3')->default(' (+2) 0100 078 6948');
            $table->string('facebook');
            $table->tinyInteger('facebook_status')->default(1);
            $table->string('twitter');
            $table->tinyInteger('twitter_status')->default(1);
            $table->string('instagram');
            $table->tinyInteger('instagram_status')->default(1);
            $table->string('linkedin');
            $table->tinyInteger('linkedin_status')->default(1);
            $table->string('email')->nullable;
            $table->longtext('description')->nullable;
            $table->longtext('keywords')->nullable;
            $table->boolean('status')->default(false);
            $table->longtext('message_maintenance')->nullable;
            $table->string('latitude',100)->default(30.059670);
            $table->string('longitude',100)->default(31.192270);
            $table->string('head_office');
            $table->string('logo');
            $table->string('date');
            $table->integer('edit')->default(0);

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
        Schema::dropIfExists('settings');
    }
}
