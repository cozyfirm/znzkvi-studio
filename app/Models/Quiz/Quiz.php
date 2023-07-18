<?php

namespace App\Models\Quiz;

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
}
