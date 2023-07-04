<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuizSets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz__sets', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')
                ->references('id')
                ->on('quiz')
                ->onDelete('cascade');
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')
                ->references('id')
                ->on('quiz__questions')
                ->onDelete('cascade');

            /* Question number: 1, 2, 3, 4, 5, 6, 7 */
            $table->integer('question_no')->default(1);
            /* Is question opened and is it answered */
            $table->boolean('opened')->default(false);
            $table->boolean('answered')->default(false);
            /* Is answer correct or not */
            $table->boolean('correct')->default(false);
            /* Is it level question => Is it 4th or 7th question */
            $table->boolean('level_question')->default(false);
            /* Is level question opened and answered or just first part of question */
            $table->boolean('level_opened')->default(false);
            $table->boolean('level_answered')->default(false);
            /* Is level question correctly answered or not */
            $table->boolean('level_correct')->default(false);
            /* Is joker used on this question */
            $table->boolean('joker')->default(false);
            /* Is it replacement question */
            $table->boolean('replacement')->default(false);

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
        Schema::dropIfExists('quiz__sets');
    }
}
