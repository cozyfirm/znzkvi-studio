<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersHistoryScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users__history_score', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->date('date');

            $table->integer('correct_answers')->default(0);   // Correct answers
            /* Number of question where joker is used; 0 => Joker is not used! */
            $table->integer('joker')->default(0);
            $table->integer('threshold')->default(1);

            $table->string('total_money')->default(0);    // Money as reward

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
        Schema::dropIfExists('users__history_score');
    }
}
