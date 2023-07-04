<?php

namespace App\Models\Quiz;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model{
    protected $table = 'quiz';
    protected $guarded = ['id'];

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
}
