<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users__history', function (Blueprint $table) {
            $table->id();
            /**
             *  Added in Season 2
             */
            $table->string('first_name', 100);
            $table->string('last_name', 100);

            $table->string('username');
            $table->string('email')->unique();

            /* Other details */
            $table->string('prefix', 10);
            $table->string('phone', 50);

            $table->string('address', 150)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('city', 100)->nullable();
            $table->integer('country');

            $table->rememberToken();
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
        Schema::dropIfExists('users__history');
    }
}
