<?php

namespace App\Http\Controllers\System\QuizPlay;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Questions\Question;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use App\Models\Settings\Config;
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
    protected $_message = "";

    public function getTodayScore(){
        return Quiz::where('user_id', '!=', null)->with('userRel.countryRel')->orderBy('total_money', 'DESC')->get();
    }
    public function getHeaderInfo($quiz_id){
        $quiz = Quiz::where('id', $quiz_id)->first();

        return [
            'user' => User::where('id', $quiz->user_id)->with('countryRel')->first(),
            'currentQuiz' => Quiz::where('user_id', '!=', null)->count()
        ];
    }

    public function checkLiveFeed(){

    }

    public function live($quiz_id){
        $quiz = Quiz::where('id', $quiz_id)->first();
        if($quiz->finished) return redirect()->route('system.quiz');

        $user = User::where('id', $quiz->user_id)->first();

        $question = $quiz->currentQuestion();
        /* All users from current session */
        $users = Quiz::where('user_id', '!=', null)->get();

        /* To reveal first category */
        $firstTime = ($quiz->active and $quiz->started == 0);

        return view($this->_path.'live', [
            'quiz' => $quiz,
            'user' => $user,
            'question' => $question['question'],
            'additional' => $question['additional'],
            'joker' => $question['joker'],
            'users' => $users,
            'counter' => $this->_counter,
            'quiz_no' => $users->count(),
            'total_quizzes' => Quiz::get()->count(),
            'firstTime' => $firstTime
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

            /* Get second question */
            $secondSet = QuizSet::where('quiz_id', $request->id)->where('question_no', ($quiz->current_question + 1))->first();

            /* Setup message */
            $this->_message = [
                'current_question' => $quiz->current_question,
                'current_category' => $firstQuestion->category,
                'question' => $firstQuestion,
                'next_question' => Question::where('id', $secondSet->question_id)->first(),
                'sub_code' => '50000'
            ];

            /* Send WS message; Show first category on screen */
            $this->publishMessage($this->_tv_topic, '0000', $this->_message);

            /* Send message to presenter screen */
            $this->_message['headers'] = $this->getHeaderInfo($quiz->id);
            $this->_message['score'] = $this->getTodayScore();
            $this->publishMessage($this->_presenter_topic, '0000', $this->_message);

            return $this->liveResponse('0000', __('Kviz uspješno započeo!'), $this->_message);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilikom inicijalizacije kviza. Molimo kontaktirajte administratora!'));
        }
    }
    /* Answer the question */
    protected function replacementQuestion($quiz, $set){
        try{
            /* Update set; Raise flag for joker quesiton */
            $set->update(['joker' => 1]);

            /* Update quiz field with number of question where joker is used; Set replacement question */
            $quiz->update(['joker' => $set->question_no, 'replacement' => 1]);

            /* Get new sample from set */
            $replacementSet = QuizSet::where('quiz_id', $quiz->id)->where('question_no', $set->question_no)->where('replacement', 1)->first();
            $replacementSet->update(['opened' => 1]);

            $currentQuestion = Question::where('id', $replacementSet->question_id)->with('answerARel')
                ->with('answerBRel')
                ->with('answerCRel')
                ->with('answerDRel')
                ->first();

            $this->_message = [
                'current_question' => $quiz->current_question,
                'current_category' => $currentQuestion->category,
                'question' => $currentQuestion,
                'sub_code' => '50004',
                'total_money' => $quiz->total_money
            ];

            /* Send WS message; Show first category on screen */
            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
            /* ToDo: Send message to presenter screen */

            return $this->liveResponse('0000', __('Joker iskorišten! Otvaramo zamjensko pitanje '), $this->_message);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilikom korištenja jokera. Molimo kontaktirajte administratora!'));
        }
    }
    /*
     *  All actions from live feed
     */
    public function answerTheQuestion(Request $request){
        try{
            $quiz = Quiz::where('id', $request->quiz_id)->first();
            /* Question on which is answering to */
            $question = Question::where('id', $request->question_id)->first();
            /* Get SET sample */
            $set = QuizSet::where('quiz_id', $request->quiz_id)->where('question_id', $question->id)->first();

            /* Is it sixth question */
            $beforeLastQuestion = ($set->question_no == 6) ? true : false;

            /* If quiz is finished, cancel all further actions */
            if($quiz->finished) return $this->liveResponse('0000', __('Kviz je već završen!'), [
                'sub_code' => '50008'
            ]);

            /* Default response message */
            $responseMsg = __("Otvaramo novo pitanje!");

            if(isset($request->joker)){
                /* Check first is joker used */
                if($quiz->joker) return $this->liveResponse('0000', __('Joker je već iskorišten!'), [ 'sub_code' => '50006' ]);

                if($quiz->current_question == 1) return $this->liveResponse('0000', __('Nije moguće iskoristiti Joker na ovom pitanju!'), [ 'sub_code' => '50005' ]);

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

                            /* Setup message */
                            $this->_message = [
                                'sub_code' => '50007',
                                'total_money' => $quiz->total_money,
                                'next_question_type' => "additional",
                                'answered_question_no' => 7
                            ];

                            /* Send WS message; Show first category on screen */
                            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                            /* ToDo: Send message to presenter screen */

                            /* Send WS message to global channel to hide Live Feed*/
                            $this->publishMessage($this->_global_channel, '0000', [ 'sub_code' => '51012', "status" => "hide"]);

                            return $this->liveResponse('0000', __('Svih 7 pitanja tačno odgovoreno! Kviz uspješno završen!'), $this->_message);
                        }else{
                            if($beforeLastQuestion) {
                                QuizSet::where('quiz_id', $quiz->id)->where('question_no', 7)->update(['level_opened' => 1]);
                            }

                            $currentQuestion = $quiz->openAndGetNextQuestion();

                            /* Setup message */
                            $this->_message = [
                                'question' => $currentQuestion,
                                'current_question' => $quiz->current_question,
                                'current_category' => $currentQuestion->category,
                                'total_money' => $quiz->total_money,
                                'sub_code' => $beforeLastQuestion ? '50003' : '50002',
                                'next_question_type' => "additional",
                                'answered_question_no' => ($quiz->current_question - 1) . "+"
                            ];

                            /* Send WS message; Show first category on screen */
                            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                            /* ToDo: Send message to presenter screen */

                            return $this->liveResponse('0000', $responseMsg, $this->_message);
                        }
                    }
                    else{
                        if($set->question_no == 7) {
                            /* Update last question info */
                            $set->update(['answered' => 1, 'correct' => 0]);
                            /* Set total money to 0 BAM */
                            $quiz->update(['threshold' => 4, 'total_money' => $this->_money[1]]);
                        }

                        /* Mark quiz as finished */
                        $quiz->update(['finished' => 1]);

                        /* Setup message */
                        $this->_message = [
                            'sub_code' => '50009',
                            'total_money' => $quiz->total_money
                        ];

                        /* Send WS message; Show first category on screen */
                        $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                        /* ToDo: Send message to presenter screen */

                        /* Send WS message to global channel to hide Live Feed*/
                        $this->publishMessage($this->_global_channel, '0000', [ 'sub_code' => '51012', "status" => "hide"]);

                        return $this->liveResponse('0000', __("Kviz završen!"), $this->_message);
                    }
                }
                else{
                    /* Answer to normal question */
                    /* Determine is it correct or not */
                    $correct  = ($question->correct_answer == $request->letter) ? true : false;

                    /* Update answered and correct fields */
                    $set->update(['answered' => 1, 'correct' => $correct]);

                    if($correct){
                        /* Increase number of correct answers; Update current question field */
                        if($set->question_no != 3 and $set->question_no != 6) $quiz->update(['correct_answers' => ($quiz->correct_answers + 1), 'current_question' => ($set->question_no + 1), 'replacement' => 0]);

                        if($set->level_question and !$set->level_opened){
                            /* This could be 3rd or 6th question */
                            /* Mark level opened as true */
                            $set->update(['level_opened' => 1]);

                            /* Setup message */
                            $this->_message = [
                                'question' => $question,
                                'sub_code' => '50003',
                                'current_question' => $quiz->current_question,
                                'current_category' => $question->category,
                                'next_question_type' => "normal",
                                'answered_question_no' => $quiz->current_question
                            ];

                            /* Send WS message; Show first category on screen */
                            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                            /* ToDo: Send message to presenter screen */


                            return $this->liveResponse('0000', $responseMsg, $this->_message);
                        }else{
                            /* This could be 1st, 2nd, 4th, 5th question */
                            /* Setup message */
                            $currentQuestion = $quiz->openAndGetNextQuestion();

                            $this->_message = [
                                'question' => $currentQuestion,
                                'sub_code' => '50002',
                                'current_question' => $quiz->current_question,
                                'current_category' => $currentQuestion->category,
                                'next_question_type' => "normal",
                                'answered_question_no' => ($quiz->current_question - 1)
                            ];

                            /* Send WS message; Show first category on screen */
                            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                            /* ToDo: Send message to presenter screen */

                            return $this->liveResponse('0000', $responseMsg, $this->_message);
                        }
                    }
                    else{
                        /* Mark quiz as finished */
                        $quiz->update(['finished' => 1]);

                        $this->_message = [
                            'sub_code' => '50001',
                            'chosen_letter' => $request->letter,
                            'total_money' => $quiz->total_money
                        ];

                        /* Send WS message; Show first category on screen */
                        $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                        /* ToDo: Send message to presenter screen */

                        /* Send WS message to global channel to hide Live Feed*/
                        $this->publishMessage($this->_global_channel, '0000', [ 'sub_code' => '51012', "status" => "hide"]);

                        return $this->liveResponse('0000', __("Kviz završen!"), $this->_message);
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
            $quiz = Quiz::where('id', $request->id)->first();
            /* Case when operator is trying to finish quiz on 7th quesiton */
            if($quiz->current_question == 7){
                /* Find set sample */
                $set = QuizSet::where('quiz_id', $quiz->id)->where('question_no', 7)->first();

                /* Check if sample is answered */
                if($set->answered == 0){
                    /* Update last question info */
                    $set->update(['answered' => 1, 'correct' => 0]);
                    /* Set total money to 0 BAM */
                    $quiz->update(['threshold' => 4, 'total_money' => $this->_money[1]]);
                }
            }

            /* Update no matter of question number */
            $quiz->update(['finished' => 1, 'active' => 0]);

            $this->_message = [
                'sub_code' => '50015',
                'total_money' => $quiz->total_money
            ];

            /* Send WS message; Show first category on screen */
            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
            /* ToDo: Send message to presenter screen */

            /* Send WS message to global channel to hide Live Feed*/
            $this->publishMessage($this->_global_channel, '0000', [ 'sub_code' => '51012', "status" => "hide"]);

            return $this->liveResponse('0000', __('Kviz završen!'), $this->_message);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilikom inicijalizacije kviza. Molimo kontaktirajte administratora!'));
        }
    }

    /*
     *  Reveal question to TV screen & operator screen (operator on-click trigger)
     */
    public function revealQuestion (Request $request){
        try{
            $quiz = Quiz::where('id', $request->id)->first();

            /* Get second question */
            $secondSet = ($quiz->current_question <= 7) ? QuizSet::where('quiz_id', $request->id)->where('question_no', ($quiz->current_question + 1))->first() : NULL;

            /* Get the current question */
            $currentQuestion = $quiz->currentQuestion();

            /* Setup message */
            $this->_message = [
                'current_question' => $quiz->current_question,
                'current_category' => $currentQuestion['category'],
                'question' => $currentQuestion,
                'next_question' => ($secondSet) ? Question::where('id', $secondSet->question_id)->first() : NULL,
                'sub_code' => '50010'
            ];

            /* Send WS message; Show first category on screen */
            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
            /* Send message to presenter screen */
            $this->_message['headers'] = $this->getHeaderInfo($quiz->id);
            $this->_message['score'] = $this->getTodayScore();
            $this->publishMessage($this->_presenter_topic, '0000', $this->_message);

            return $this->liveResponse('0000', __('Pitanje prikazano na TV screen-u!'), $this->_message);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilkom predlaganja odgovora. Molimo kontaktirajte administratora'));
        }
    }

    /*
     *  Reveal mid screen such as question category or level question screen
     */
    public function revealScreen(Request $request){
        try{
            $quiz = Quiz::where('id', $request->id)->first();

            /* Get the current question */
            $currentQuestion = $quiz->currentQuestion();

            $this->_message = [
                'current_question' => $quiz->current_question,
                'current_category' => $currentQuestion['category'],
                'question' => $currentQuestion,
                'sub_code' => '50011'
            ];

            /* Send WS message; Show first category on screen */
            $this->publishMessage($this->_tv_topic, '0000', $this->_message);
            /* Send message to presenter screen */
            $this->_message['headers'] = $this->getHeaderInfo($quiz->id);
            $this->_message['score'] = $this->getTodayScore();
            $this->publishMessage($this->_presenter_topic, '0000', $this->_message);

            return $this->liveResponse('0000', __('Mid screen prikazan na TV-u!'), $this->_message);
        }catch (\Exception $e){
            return $this->jsonResponse('50050', __('Došlo je do greške prilkom predlaganja odgovora. Molimo kontaktirajte administratora'));
        }
    }

    /*
     *  Open lines function:
     *      -
     */
    public function openLine(Request $request){
        try{
            if($request->source == "tv"){
                if($request->action == "init"){
                    /* On load screen on TV */
                    Config::where('key', 'open_lines')->update(['value' => 1]);
                    $this->_message = [ 'sub_code' => '51010', "key" => "open_lines", "value" => 1];

                    /* Publish message to all screens (Admin portal) */
                    $this->publishMessage($this->_global_channel, '0000', $this->_message);

                    /* Publish message to presenter screen */
                    $this->_message['sub_code'] = '55010';
                    $this->publishMessage($this->_presenter_topic, '0000', $this->_message);

                    /* Return success response and show Line Open GUI in TV screen */
                    $this->_message['sub_code'] = '51010';
                    return $this->liveResponse('0000', __('Status uspješno ažuriran!'), $this->_message);
                }
            }else{
                /* Comand sent by user */
                $lineOpen = Config::where('key', 'open_lines')->first();
                if($lineOpen->value == 1){
                    /* If Open Line GUI is revealed, update status, hide it in TV screen and mark button as red in Admin panel */
                    Config::where('key', 'open_lines')->update(['value' => 0]);

                    /* Send message to TV Screen to hide GUI */
                    $this->publishMessage($this->_tv_topic, '0000', ['sub_code' => '50103', "status" => "closed"]);

                    /* Send message to Admin panel */
                    $this->publishMessage($this->_global_channel, '0000',  [ 'sub_code' => '51011', "key" => "open_lines", "value" => 0]);

                    /* Publish message to presenter screen */
                    $this->publishMessage($this->_presenter_topic, '0000', [ 'sub_code' => '55010', "key" => "open_lines", "value" => 0]);
                }else{
                    Config::where('key', 'open_lines')->update(['value' => 1]);

                    /* Send message to TV Screen to hide GUI */
                    $this->publishMessage($this->_tv_topic, '0000', ['sub_code' => '50103', "status" => "open"]);

                    /* Send message to Admin panel */
                    $this->publishMessage($this->_global_channel, '0000',  [ 'sub_code' => '51010', "key" => "open_lines", "value" => 1]);

                    /* Publish message to presenter screen */
                    $this->publishMessage($this->_presenter_topic, '0000', [ 'sub_code' => '55010', "key" => "open_lines", "value" => 1]);
                }
            }

        }catch (\Exception $e){
            dd($e);
            return $this->jsonResponse('51050', __('Došlo je do greške prilkom predlaganja odgovora. Molimo kontaktirajte administratora'));
        }
    }
    /*
     *  Note: This message is deprecated and won't be used anymore! Leave it as legacy ...
     *
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
