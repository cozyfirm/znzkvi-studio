<?php

namespace App\Http\Controllers\System\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Questions\Question;
use Illuminate\Http\Request;

class QuizHelpController extends Controller{
    public static function getSetQuestions(Request $request){
        try{
            $questionsArr = [];

            /* First, lets get first question from category 1. */
            $questionOne   = Question::where('category', 1)
                ->where('weight', 1)
                ->where('additional_questions', NULL)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();
            $questionOneR  = Question::where('category', 1)
                ->where('weight', 1)
                ->where('additional_questions', NULL)
                ->where('id', '!=', $questionOne->id)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            $questionThree  = Question::where('category', '!=', $questionOne->category)
                ->where('weight', '>=', 1)->where('weight', '<=', 4)
                ->where('additional_questions', '!=', NULL)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();
            $questionThreeR = Question::where('category', $questionThree->category)
                // ->where('weight', $questionThree->weight)
                ->where('weight', '>=', 1)->where('weight', '<=', 4)
                ->where('additional_questions', '!=', NULL)
                ->where('id', '!=', $questionThree->id)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            $questionTwo  = Question::where('category', '!=', $questionOne->category)->where('category', '!=', $questionThree->category)
                ->where('weight', '>=', 1)->where('weight', '<=', 4)
                ->where('additional_questions', NULL)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();
            $questionTwoR = Question::where('category', $questionTwo->category)
                // ->where('weight', $questionTwo->weight)
                ->where('weight', '>=', 1)->where('weight', '<=', 4)
                ->where('additional_questions', NULL)
                ->where('id', '!=', $questionTwo->id)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            /* ------------------------------------------------------------------------------------------------------ */

            $questionSix  = Question::where('category', '!=', $questionOne->category)->where('category', '!=', $questionTwo->category)->where('category', '!=', $questionThree->category)
                ->where('weight', '>=', 4)->where('weight', '<=', 6)
                ->where('additional_questions', '!=', NULL)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();
            $questionSixR = Question::where('category', $questionSix->category)
                // ->where('weight', $questionSix->weight)
                ->where('weight', '>=', 4)->where('weight', '<=', 6)
                ->where('additional_questions', '!=', NULL)
                ->where('id', '!=', $questionSix->id)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            $questionFour  = Question::where('category', '!=', $questionOne->category)->where('category', '!=', $questionTwo->category)->where('category', '!=', $questionThree->category)->where('category', '!=', $questionSix->category)
                ->where('weight', '>=', 4)->where('weight', '<=', 6)
                ->where('additional_questions', NULL)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();
            $questionFourR = Question::where('category', $questionFour->category)
                // ->where('weight', $questionFour->weight)
                ->where('weight', '>=', 4)->where('weight', '<=', 6)
                ->where('additional_questions', NULL)
                ->where('id', '!=', $questionFour->id)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            $questionFive  = Question::where('category', '!=', $questionOne->category)->where('category', '!=', $questionTwo->category)->where('category', '!=', $questionThree->category)->where('category', '!=', $questionFour->category)->where('category', '!=', $questionSix->category)
                ->where('weight', '>=', 4)->where('weight', '<=', 6)
                ->where('additional_questions', NULL)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();
            $questionFiveR = Question::where('category', $questionFive->category)
                // ->where('weight', $questionFour->weight)
                ->where('weight', '>=', 4)->where('weight', '<=', 6)
                ->where('additional_questions', NULL)
                ->where('id', '!=', $questionFive->id)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            $questionSeven = Question::where('category', 7)
                ->where('in_queue', 0)->where('locked', 1)->inRandomOrder()->first();

            /* Push data into array */
            $questionsArr['1'] = $questionOne;   $questionsArr['1r'] = $questionOneR;
            $questionsArr['2'] = $questionTwo;   $questionsArr['2r'] = $questionTwoR;
            $questionsArr['3'] = $questionThree; $questionsArr['3r'] = $questionThreeR;
            $questionsArr['4'] = $questionFour;  $questionsArr['4r'] = $questionFourR;
            $questionsArr['5'] = $questionFive;  $questionsArr['5r'] = $questionFiveR;
            $questionsArr['6'] = $questionSix;   $questionsArr['6r'] = $questionSixR;
            $questionsArr['7'] = $questionSeven;

            return $questionsArr;
        }catch (\Exception $e){
            throw $e;
        }
    }
}
