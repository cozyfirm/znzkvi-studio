<?php

namespace App\Http\Controllers\System\QuizPlay;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Questions\Question;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use App\User;
use Illuminate\Http\Request;

class QuizPlayController extends Controller{
    protected $_path = 'system.quiz-play.play.';
    protected $_money = [
        1 => '0',
        2 => '20',
        3 => '50',
        4 => '100'
    ];

    public function live($quiz_id){
        $quiz = Quiz::where('id', $quiz_id)->first();
        $user = User::where('id', $quiz->user_id)->first();

        $question = $quiz->nextQuestion();

        return view($this->_path.'live', [
            'quiz' => $quiz,
            'user' => $user,
            'question' => $question['question'],
            'additional' => $question['additional']
        ]);
    }

    /* Set Quiz state as Started */
    public function startQuiz(Request $request){
        try{
            $quiz = Quiz::where('id', $request->id)->first();
            /* Update columnd started */
            $quiz->update(['started' => 1]);
            /* Mark first Question as "opened" */
            $firstQuestion = $quiz->openAndGetNextQuestion();

            return $this->liveResponse('0000', __('Kviz uspješno započeo!'), [
                'question' => $firstQuestion
            ]);
        }catch (\Exception $e){
            return $this->jsonResponse('50000', __('Došlo je do greške prilikom inicijalizacije kviza. Molimo kontaktirajte administratora!'));
        }
    }
    /* Answer the question */
    public function answerTheQuestion(Request $request){
        try{
            $quiz = Quiz::where('id', $request->quiz_id)->first();
            $question = Question::where('id', $request->question_id)->first();
            /* Get SET sample */
            $set = QuizSet::where('quiz_id', $request->quiz_id)->where('question_id', $question->id)->first();
            $beforeLastQuestion = ($set->question_no == 6) ? true : false;

            /* Default response message */
            $responseMsg = __("Uspješno unesen tačan odgovor. Otvaramo novo pitanje!");

            if($request->additional){
                $set->update(['level_answered' => 1, 'level_correct' => ($request->correct == 'Yes') ? 1 : 0]);
                if($set->question_no == 3) $quiz->update(['threshold' => 2, 'total_money' => $this->_money[2]]);
                else if($set->question_no == 6) $quiz->update(['threshold' => 3, 'total_money' => $this->_money[3]]);
                else if($set->question_no == 7) $quiz->update(['threshold' => 4, 'total_money' => $this->_money[4]]);

                if($request->correct == 'Yes'){
                    /* Increase number of correct answers */
                    $quiz->update(['correct_answers' => ($quiz->correct_answers + 1)]);

                    if($set->question_no == 7){
                        $set->update(['answered' => 1, 'correct' => 1]);
                    }else{
                        if($beforeLastQuestion) {
                            QuizSet::where('quiz_id', $quiz->id)->where('question_no', 7)->update(['level_opened' => 1]);
                        }

                        return $this->liveResponse('0000', $responseMsg, [
                            'question' => $quiz->openAndGetNextQuestion(),
                            'sub_code' => $beforeLastQuestion ? '6002' : '6000'
                        ]);
                    }
                }else{
                    if($set->question_no == 7) {
                        /* Update last question info */
                        $set->update(['answered' => 1, 'correct' => 0]);
                        /* Set total money to 0 BAM */
                        $quiz->update(['threshold' => 4, 'total_money' => $this->_money[1]]);
                    }

                    $responseMsg = __("Uspješno unesen netačan odgovor. Kviz završen!");
                    return $this->liveResponse('0000', $responseMsg, [
                        'sub_code' => '6001'
                    ]);
                }
            }else{
                /* Determine is it correct or not */
                $correct  = ($question->correct_answer == $request->letter) ? true : false;

                /* Update answered and correct fields */
                $set->update(['answered' => 1, 'correct' => $correct]);

                if($correct){
                    /* Increase number of correct answers */
                    $quiz->update(['correct_answers' => ($quiz->correct_answers + 1)]);

                    if($set->level_question and !$set->level_opened){
                        /* Mark level opened as true */
                        $set->update(['level_opened' => 1]);

                        return $this->liveResponse('0000', $responseMsg, [
                            'question' => $question,
                            'sub_code' => '6002'
                        ]);
                    }else{
                        return $this->liveResponse('0000', $responseMsg, [
                            'question' => $quiz->openAndGetNextQuestion(),
                            'sub_code' => '6000'
                        ]);
                    }
                }else{
                    $responseMsg = __("Uspješno unesen netačan odgovor. Kviz završen!");
                    return $this->liveResponse('0000', $responseMsg, [
                        'sub_code' => '6001'
                    ]);
                }
            }

            dd($set);

            dd($correct, $question);
            dd($request->all());
        }catch (\Exception $e){
            dd($e);
            return $this->jsonResponse('50000', __('Došlo je do greške prilikom odgovora na pitanje. Molimo kontaktirajte administratora!'));
        }
    }
}
