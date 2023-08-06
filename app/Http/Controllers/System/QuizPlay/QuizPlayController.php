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
        2 => '50',
        3 => '100',
        4 => '200'
    ];
    protected $_counter = 1;

    public function live($quiz_id){
        $quiz = Quiz::where('id', $quiz_id)->first();
        if($quiz->finished) return redirect()->route('system.quiz');

        $user = User::where('id', $quiz->user_id)->first();

        $question = $quiz->currentQuestion();
        /* All users from current session */
        $users = Quiz::where('user_id', '!=', null)->get();


        return view($this->_path.'live', [
            'quiz' => $quiz,
            'user' => $user,
            'question' => $question['question'],
            'additional' => $question['additional'],
            'joker' => $question['joker'],
            'users' => $users,
            'counter' => $this->_counter,
            'quiz_no' => $users->count(),
            'total_quizzes' => Quiz::get()->count()
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
                'question' => $firstQuestion,
                'sub_code' => '50000'
            ]);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilikom inicijalizacije kviza. Molimo kontaktirajte administratora!'));
        }
    }
    /* Answer the question */
    protected function replacementQuestion($quiz, $set){
        /* Update set; Raise flag for joker quesiton */
        $set->update(['joker' => 1]);

        /* Update quiz field with number of question where joker is used; Set replacement question */
        $quiz->update(['joker' => $set->question_no, 'replacement' => 1]);

        /* Get new sample from set */
        $replacementSet = QuizSet::where('quiz_id', $quiz->id)->where('question_no', $set->question_no)->where('replacement', 1)->first();
        $replacementSet->update(['opened' => 1]);

        return $this->liveResponse('0000', __('Joker iskorišten! Otvaramo zamjensko pitanje '), [
            'question' => Question::where('id', $replacementSet->question_id)->with('answerARel')
                ->with('answerBRel')
                ->with('answerCRel')
                ->with('answerDRel')
                ->first(),
            'sub_code' => '50004',
            'total_money' => $quiz->total_money
        ]);
    }
    /*
     *  All actions from live feed
     */
    public function answerTheQuestion(Request $request){
        try{
            $quiz = Quiz::where('id', $request->quiz_id)->first();
            $question = Question::where('id', $request->question_id)->first();
            /* Get SET sample */
            $set = QuizSet::where('quiz_id', $request->quiz_id)->where('question_id', $question->id)->first();
            $beforeLastQuestion = ($set->question_no == 6) ? true : false;

            /* If quiz is finished, cancel all further actions */
            if($quiz->finished){
                if($quiz->joker) return $this->liveResponse('0000', __('Kviz je već završen!'), [
                    'sub_code' => '50008'
                ]);
            }

            /* Default response message */
            $responseMsg = __("Uspješno unesen tačan odgovor. Otvaramo novo pitanje!");

            if(isset($request->joker)){
                /* Check first is joker used */
                if($quiz->joker) return $this->liveResponse('0000', __('Joker je već iskorišten!'), [
                    'sub_code' => '50006'
                ]);

                /* Use joker */
                if($set->question_no == 3 or $set->question_no == 6 or $set->question_no == 7){
                    if($set->level_opened){
                        /* Cannot use  */
                        return $this->liveResponse('0000', __('Nije moguće iskoristiti Joker na ovom pitanju!'), [
                            'sub_code' => '50005'
                        ]);
                    }else{
                        return $this->replacementQuestion($quiz, $set);
                    }
                }else{
                    /* Regular thing to do; Change the question */
                    return $this->replacementQuestion($quiz, $set);
                }
            }
            else{
                if($request->additional){
                    $set->update(['level_answered' => 1, 'level_correct' => ($request->correct == 'Yes') ? 1 : 0]);

                    if($request->correct == 'Yes'){
                        /* Set total money earned from quiz */
                        if($set->question_no == 3) $quiz->update(['threshold' => 2, 'total_money' => $this->_money[2]]);
                        else if($set->question_no == 6) $quiz->update(['threshold' => 3, 'total_money' => $this->_money[3]]);
                        else if($set->question_no == 7) $quiz->update(['threshold' => 4, 'total_money' => $this->_money[4]]);

                        /* Increase number of correct answers; Update current question field */
                        $quiz->update(['correct_answers' => ($quiz->correct_answers + 1), 'current_question' => ($set->question_no + 1), 'replacement' => 0]);

                        if($set->question_no == 7){
                            $set->update(['answered' => 1, 'correct' => 1]);

                            /* Mark quiz as finished */
                            $quiz->update(['finished' => 1]);

                            /* Success message */
                            return $this->liveResponse('0000', __('Svih 7 pitanja tačno odgovoreno! Kviz uspješno završen!'), [
                                'sub_code' => '50007',
                                'total_money' => $quiz->total_money,
                                // 'uri' => route('system.quiz')
                            ]);
                        }else{
                            if($beforeLastQuestion) {
                                QuizSet::where('quiz_id', $quiz->id)->where('question_no', 7)->update(['level_opened' => 1]);
                            }

                            return $this->liveResponse('0000', $responseMsg, [
                                'question' => $quiz->openAndGetNextQuestion(),
                                'current_question' => $quiz->current_question,
                                'total_money' => $quiz->total_money,
                                'sub_code' => $beforeLastQuestion ? '50003' : '50002'
                            ]);
                        }
                    }else{
                        if($set->question_no == 7) {
                            /* Update last question info */
                            $set->update(['answered' => 1, 'correct' => 0]);
                            /* Set total money to 0 BAM */
                            $quiz->update(['threshold' => 4, 'total_money' => $this->_money[1]]);
                        }

                        /* Mark quiz as finished */
                        $quiz->update(['finished' => 1]);

                        return $this->liveResponse('0000', __("Uspješno unesen netačan odgovor. Kviz završen!"), [
                            'sub_code' => '50009',
                            // 'uri' => route('system.quiz')
                        ]);
                    }
                }else{
                    /* Determine is it correct or not */
                    $correct  = ($question->correct_answer == $request->letter) ? true : false;

                    /* Update answered and correct fields */
                    $set->update(['answered' => 1, 'correct' => $correct]);

                    if($correct){
                        /* Increase number of correct answers; Update current question field */
                        if($set->question_no != 3 and $set->question_no != 6) $quiz->update(['correct_answers' => ($quiz->correct_answers + 1), 'current_question' => ($set->question_no + 1), 'replacement' => 0]);

                        if($set->level_question and !$set->level_opened){
                            /* Mark level opened as true */
                            $set->update(['level_opened' => 1]);

                            return $this->liveResponse('0000', $responseMsg, [
                                'question' => $question,
                                'sub_code' => '50003',
                                'current_question' => $quiz->current_question
                            ]);
                        }else{
                            return $this->liveResponse('0000', $responseMsg, [
                                'question' => $quiz->openAndGetNextQuestion(),
                                'sub_code' => '50002',
                                'current_question' => $quiz->current_question
                            ]);
                        }
                    }else{
                        /* Mark quiz as finished */
                        $quiz->update(['finished' => 1]);

                        return $this->liveResponse('0000', __("Uspješno unesen netačan odgovor. Kviz završen!"), [
                            'sub_code' => '50001',
                            'chosen_letter' => $request->letter
                            // 'uri' => route('system.quiz')
                        ]);
                    }
                }
            }
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilikom odgovora na pitanje. Molimo kontaktirajte administratora!'));
        }
    }

    /*
     *  Set Quiz state as finnish & inactive; This can be in case of:
     *
     *      - user quits
     *      - phone connection lost
     *      - Wrong answer
     * */
    public function finnishQuiz(Request $request){
        try{
            Quiz::where('id', $request->id)->update(['finished' => 1, 'active' => 0]);

            return $this->liveResponse('0000', __('Kviz završen!'), [
                'sub_code' => '50001',
                // 'uri' => route('system.quiz')
            ]);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilikom inicijalizacije kviza. Molimo kontaktirajte administratora!'));
        }
    }

    /*
     *  Propose the answer: This one is sent to TV ether to mark proposed answer before final response
     */
    public function proposeTheAnswer(Request $request){
        try{
            return $this->liveResponse('0000', __('Poslan prijedlog odgovora'), [
                'sub_code' => '50030',
                'letter' => $request->letter
            ]);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilkom predlaganja odgovora. Molimo kontaktirajte administratora'));
        }
    }
}
