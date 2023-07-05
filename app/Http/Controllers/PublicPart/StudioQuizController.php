<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudioQuizController extends Controller{
    protected $_path = 'public-part.quiz.';

    /*
     *  Quiz - Studio version
     */
    public function studioQuiz(){
        return view($this->_path.'studio-quiz');
    }
}
