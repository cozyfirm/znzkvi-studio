<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz__questions', function (Blueprint $table) {
            $table->unsignedBigInteger('id');

            $table->string('question');
            $table->integer('category');
            $table->string('category_image')->default(1);
            $table->integer('weight')->default(0); // Basically how hard the question is
            $table->string('correct_answer', '5')->default("A");
            /* Some questions (for offline mode) can have additional question (third and sixth question) */
            $table->string('additional_questions')->nullable();
            $table->string('additional_q_answer')->nullable();

            /*
             *  Hidden questions for online usage; When this question is used in offline mode, after that it becomes
             *  available for online mode (available for everyone)
             */
            $table->boolean('locked')->default(true);

            /* This is flag used when creating quizzes. If question is used, then it cannot be added to new set */
            $table->boolean('in_queue')->default(false);

            $table->integer('created_by');
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
        Schema::dropIfExists('quiz__questions');
    }
}
