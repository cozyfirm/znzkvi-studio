<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Keywords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('__keywords', function (Blueprint $table) {
            $table->integer('id');

            $table->string('display', 200);
            $table->string('type', 100);
            $table->string('name', 200);
            $table->text('description')->nullable();
            $table->string('value', 50)->nullable();

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
        Schema::dropIfExists('__keywords');
    }
}
