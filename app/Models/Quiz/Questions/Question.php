<?php

namespace App\Models\Quiz\Questions;

use App\Models\Settings\Keyword;
use Illuminate\Database\Eloquent\Model;

class Question extends Model{
    protected $table = 'quiz__questions';
    protected $guarded = [];

    /*
     *  Relationships with model
     */
    public function categoryRel(){
        return $this->hasOne(Keyword::class, 'value', 'category')->where('type', 'question_category');
    }
    public function answerARel(){ return $this->hasOne(Answers::class, 'question_id', 'id')->where('order', "A"); }
    public function answerBRel(){ return $this->hasOne(Answers::class, 'question_id', 'id')->where('order', "B"); }
    public function answerCRel(){ return $this->hasOne(Answers::class, 'question_id', 'id')->where('order', "C"); }
    public function answerDRel(){ return $this->hasOne(Answers::class, 'question_id', 'id')->where('order', "D"); }

    public function correctAnswer(){
        return $this->hasOne(Answers::class, 'question_id', 'id')->where('order', $this->correct_answer);
    }

}
