<?php

namespace App\Http\Controllers\System\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Quiz\Questions\Answers;
use App\Models\Quiz\Questions\Question;
use App\Models\Settings\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionsController extends Controller{
    protected $_path = 'system.quiz.questions.';
    protected $_answers = [
        "A" => ["question" => "", "correct" => false],
        "B" => ["question" => "", "correct" => false],
        "C" => ["question" => "", "correct" => false],
        "D" => ["question" => "", "correct" => false]
    ];

    /*
     *  This function is used to shuffle associative array; Returns data in shuffled order; Size of array is not important
     */
    protected function shuffleAssocArr($my_array){
        $keys = array_keys($my_array);
        $new  = [];
        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $my_array[$key];
        }

        return $new;
    }
    /*
     *  Validate answers; Return shuffled answers in alphabetical order
     */
    protected function processAnswers(Request $request){
        try{
            /* Validate form first */
            if(!isset($request->correct_answer)) return $this->jsonResponse('20100', __('Niste unijeli niti jedan tačan odgovor'));
            if(!isset($request->incorrect_one) || !isset($request->incorrect_two) || !isset($request->incorrect_three)) return $this->jsonResponse('20101', __('Molimo da unesete preostala tri netačna odgovora'));

            /* Temp array with answers */
            $tempArr = [
                "correct_answer"  => $request->correct_answer,
                "incorrect_one"   => $request->incorrect_one,
                "incorrect_two"   => $request->incorrect_two,
                "incorrect_three" => $request->incorrect_three,
            ];

            /* Counter for $_answers */
            $counter = 1;
            $shuffled = $this->shuffleAssocArr($tempArr);
            foreach ($shuffled as $key => $val){
                $correct = ($key == "correct_answer") ? true : false;
                if($counter == 1){ $this->_answers["A"]["question"] = $val; $this->_answers["A"]["correct"] = $correct; }
                else if($counter == 2){ $this->_answers["B"]["question"] = $val; $this->_answers["B"]["correct"] = $correct; }
                else if($counter == 3){ $this->_answers["C"]["question"] = $val; $this->_answers["C"]["correct"] = $correct; }
                else if($counter == 4){ $this->_answers["D"]["question"] = $val; $this->_answers["D"]["correct"] = $correct; }

                $counter ++;
            }

            return $this->jsonResponse('0000', __('OK'), $this->_answers);
        }catch (\Exception $e){ return $this->jsonResponse('20102', __('Desila se greška!')); }
    }
    /*
     *  Get letter of correct answer
     */
    protected function getCorrectAnswer($answers){
        foreach ($answers as $key => $val){
            if($val->correct) return $key;
        }
        return "A";
    }
    public function index(){
        $questions = Question::where('id', '>', 0)->orderBy('category');
        $questions = Filters::filter($questions);
        $filters = [
            'question' => __('Pitanje'),
            'categoryRel.name' => __('Kategorija'),
            'weight' => __('Težina pitanja'),
            'correct_answer' => 'Tačan odgovor',
            'answerARel.answer' => __('A'),
            'answerBRel.answer' => __('B'),
            'answerCRel.answer' => __('C'),
            'answerDRel.answer' => __('D'),
            'additional_questions' => __('Direktno pitanje')
        ];

        return view($this->_path.'index', [
            'questions' => $questions,
            'filters' => $filters
        ]);
    }
    public function previewQuestion($id){
        return view($this->_path.'create', [
            'preview' => true,
            'question' => Question::where('id', $id)->first(),
            'categories' => Keyword::getItByVal('question_category'),
            'weights' => Keyword::getItByVal('question_weight')
        ]);
    }
    public function edit($id){
        return view($this->_path.'edit', [
            'question' => Question::where('id', $id)->first(),
            'categories' => Keyword::getItByVal('question_category'),
            'weights' => Keyword::getItByVal('question_weight')
        ]);
    }
    public function update(Request $request){
        try{
            if(!isset($request->answer_a) || !isset($request->answer_b) || !isset($request->answer_c) || !isset($request->answer_d)) return $this->jsonResponse('20105', __('Molimo da unesete sve ponuđene odgovore!'));

            Question::where('id', $request->id)->update([
                'question' => $request->question,
                'category' => $request->category,
                'weight' => $request->weight,
                'additional_questions' => $request->additional_questions,
                'additional_q_answer' => $request->additional_q_answer
            ]);

            Answers::where('question_id', $request->id)->where('order', "A")->update(['answer' => $request->answer_a]);
            Answers::where('question_id', $request->id)->where('order', "B")->update(['answer' => $request->answer_b]);
            Answers::where('question_id', $request->id)->where('order', "C")->update(['answer' => $request->answer_c]);
            Answers::where('question_id', $request->id)->where('order', "D")->update(['answer' => $request->answer_d]);

            return $this->jsonSuccess(__('Pitanje uspješno ažurirano'), route('system.quiz.questions.preview-question', ['id' => $request->id ]));
        }catch (\Exception $e){ return $this->jsonResponse('20104', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!')); }
    }
}
