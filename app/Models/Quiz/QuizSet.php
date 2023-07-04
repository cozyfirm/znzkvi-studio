<?php

namespace App\Models\Quiz;

use App\Models\Quiz\Questions\Question;
use Illuminate\Database\Eloquent\Model;

class QuizSet extends Model{
    protected $table = 'quiz__sets';
    protected $guarded = ['id'];

    public function questionRel(){
        return $this->hasOne(Question::class, 'id', 'question_id');
    }
}
