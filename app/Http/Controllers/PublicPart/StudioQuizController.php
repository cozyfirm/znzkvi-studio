<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Quiz;
use App\Models\Sponsors\SponsorsData;
use Illuminate\Http\Request;

class StudioQuizController extends Controller{
    protected $_path = 'public-part.quiz.';

    /*
     *  Quiz - Studio version
     */
    public function studioQuiz(){
        return view($this->_path.'studio-quiz', [
            'sponsorOpenLines' => SponsorsData::where('category', 'open-lines')->get(),
            'sponsorCategories' => SponsorsData::where('category', 'category')->get(),
        ]);
    }

    /*
     *  Presenter view / version
     */

    public function presenterVersion(){
        $currentQuiz = Quiz::where('active', 1)->first();
        $totalQuizzes = Quiz::count();
        $currentQuizNo = Quiz::where('user_id', '!=', null)->count();

        return view('public-part.presenter.preview', [
            'currentQuiz' => $currentQuiz,
            'totalQuizzes' => $totalQuizzes,
            'currentQuizNo' => $currentQuizNo,
            'totalScore' => Quiz::where('user_id', '!=', null)->with('userRel.countryRel')->orderBy('total_money', 'DESC')->get()
        ]);
    }
}
