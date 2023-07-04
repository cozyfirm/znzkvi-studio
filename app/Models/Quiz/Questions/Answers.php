<?php

namespace App\Models\Quiz\Questions;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model{
    protected $table = 'quiz__question_answers';
    protected $guarded = ['id'];
}
