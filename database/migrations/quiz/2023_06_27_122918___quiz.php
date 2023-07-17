<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Quiz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->unsignedBigInteger('id');

            $table->date('date');
            $table->integer('user_id')->nullable();                 // Created for user
            $table->boolean('online')->default(true);         // Online or offline usage

            $table->integer('correct_answers')->default(0);   // Correct answers
            /* Number of question where joker is used; 0 => Joker is not used! */
            $table->integer('joker')->default(0);
            $table->integer('threshold')->default(1);

            /*
             *  - 1, 2, 3 + (4) => 50 BAM
             *  - 4, 5, 6 + (7) => 100 BAM
             *  - 7 => 200 BAM or nothing
             */
            $table->string('total_money')->default(0);    // Money as reward

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
        Schema::dropIfExists('quiz');
    }
}
