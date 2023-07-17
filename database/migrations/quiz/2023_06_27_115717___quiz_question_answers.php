<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizQuestionAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz__question_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('id');

            $table->unsignedBigInteger('question_id');

            $table->string('order', '5')->default("A");
            $table->string('answer');
            $table->tinyInteger('correct')->default(0);      // 0 -> Not correct, 1 => Correct

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
        Schema::dropIfExists('quiz__question_answers');
    }
}
