<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizCategory extends Model{
    protected $table = 'quiz__categories';
    protected $guarded = ['id'];
}
