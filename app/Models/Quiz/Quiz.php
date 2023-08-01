<?php

namespace App\Models\Quiz;

use App\Models\Quiz\Questions\Question;
use App\Models\Settings\Keyword;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model{
    protected $table = 'quiz';
    protected $guarded = [];

    public function date(){
        return Carbon::parse($this->date)->format('d.m.Y');
    }
    public function totalOpened(){
        return QuizSet::where('quiz_id', $this->id)->where('opened', 1)->count();
    }

    /*
     *  Quiz relationship models
     */
    public function userRel(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function setRel(){
        return $this->hasMany(QuizSet::class, 'quiz_id', 'id');
    }
    public function onlineRel(){
        return $this->hasOne(Keyword::class, 'value', 'online')->where('type', 'online');
    }
    public function jokerRel(){
        return $this->hasOne(Keyword::class, 'value', 'joker')->where('type', 'da_ne');
    }
    public function openAndGetNextQuestion(){
        try{
            $set = QuizSet::where('quiz_id', $this->id)->where('opened', 0)->where('answered', 0)->where('replacement', 0)->orderBy('question_no')->first();
            $set->update(['opened' => 1]);

            return Question::where('id', $set->question_id)
                ->with('answerARel')
                ->with('answerBRel')
                ->with('answerCRel')
                ->with('answerDRel')
                ->first();
        }catch (\Exception $e){ return false; }
    }
    public function currentQuestion(){
        try{
            $set = QuizSet::where('quiz_id', $this->id)
                ->where('question_no', $this->current_question)
                ->where('replacement', $this->replacement)
                ->first();

            return [
                'question' => Question::where('id', $set->question_id)->first(),
                'additional' => $set->level_opened,
                'joker' => $this->joker
            ];


            /* Is it 3, 6 or 7 question */
            $levelQuestion = false;
            /* Is joker used */
            $joker = false;

            /* Possible next set */
            $set = QuizSet::where('quiz_id', $this->id)
                ->where('answered', 0)
                ->where('joker', 0)
                ->where('replacement', 0)->orderBy('question_no')->first();


            if($this->joker){
                $replacementSet = QuizSet::where('quiz_id', $this->id)->where('question_no', $this->joker)->where('replacement', 1)->first();


                $question = Question::where('id', $replacementSet->question_id)->first();

                // $levelQuestion = $replacementSet->level_question;
                $joker = true;


            }else{
                if($set->question_no == 4 or $set->question_no == 7){
                    $newSet = QuizSet::where('quiz_id', $this->id)
                        ->where('question_no', ($set->question_no - 1))->first();

                    if(!$newSet->level_answered){
                        $question = Question::where('id', $newSet->question_id)->first();
                        $levelQuestion = true;
                    }else{
                        $question = Question::where('id', $set->question_id)->first();
                        if($set->question_no == 7) $levelQuestion = true;
                    }
                }else{
                    $question = Question::where('id', $set->question_id)->first();
                }
            }


        }catch (\Exception $e){ return false; }
    }
    public function getQuestion($questionNo = 1, $replacement = 0){
        try{
            $set = QuizSet::where('quiz_id', $this->id)->where('question_no', $questionNo)->where('replacement', $replacement)->first();
            return Question::where('id', $set->question_id)->first();
        }catch (\Exception $e){ return false; }
    }
}
