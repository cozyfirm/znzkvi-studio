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
    public function activeRel(){
        return $this->hasOne(Keyword::class, 'value', 'active')->where('type', 'da_ne');
    }
    public function startedRel(){
        return $this->hasOne(Keyword::class, 'value', 'started')->where('type', 'da_ne');
    }
    public function finishedRel(){
        return $this->hasOne(Keyword::class, 'value', 'finished')->where('type', 'da_ne');
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

            $question = Question::where('id', $set->question_id)
                ->with('answerARel')
                ->with('answerBRel')
                ->with('answerCRel')
                ->with('answerDRel')
                ->first();

            return [
                'question' => $question,
                'category' => isset($question) ? $question->category : NULL,
                'additional' => $set->level_opened,
                'joker' => $this->joker
            ];
        }catch (\Exception $e){ return false; }
    }
    public function getQuestion($questionNo = 1, $replacement = 0){
        try{
            $set = QuizSet::where('quiz_id', $this->id)->where('question_no', $questionNo)->where('replacement', $replacement)->first();
            return Question::where('id', $set->question_id)->first();
        }catch (\Exception $e){ return false; }
    }
}
