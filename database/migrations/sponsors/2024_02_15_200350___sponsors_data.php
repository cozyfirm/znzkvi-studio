<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SponsorsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors_data', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('elem_name')->nullable();
            $table->string('category')->default('category');
            $table->text('data');
            $table->string('sound')->nullable();

            $table->string('status')->default('Hidden');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors_data');
    }
}
