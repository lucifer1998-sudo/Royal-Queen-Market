<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDeliveryOptionSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_delivery_option_settings', function (Blueprint $table) {
            $table -> bigIncrements('id');
            $table -> string('name');
            $table->integer('price');
            $table ->integer('duration');
            $table->integer('min_quantity');
            $table->integer('max_quantity');
            $table->integer('user_id');
            $table -> foreign('user_id') -> references('id')->on('users');
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
        Schema::table('user_delivery_option_settings', function (Blueprint $table) {
            $table ->dropIfExists();
        });
    }
}
