<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('api_token', 64)->unique();
            $table->integer('role')->default(0);
            $table->integer('banned')->default(0);

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
        Schema::dropIfExists('users');
    }
}
