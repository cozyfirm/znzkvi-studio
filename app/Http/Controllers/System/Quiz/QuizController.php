<?php

namespace App\Http\Controllers\System\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Questions\Question;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller{
    protected $_path = 'system.quiz.';

    public function index(){
        return view($this->_path.'index', [

        ]);
    }
    public function create(){
        return view($this->_path.'create', [
            'create' => true,
        ]);
    }
    public function save(Request $request){
        try{
            $counter = 1;
            // ToDo -- Throw an exception
            try{
                $setQuestions = QuizHelpController::getSetQuestions($request);
            }catch (\Exception $e){
                return $this->jsonResponse('20150', __('Greška prilikom odabira pitanja. Mogući razlog je nedostatak pitanja za kreiranje seta!'));
            }

            try{
                $quiz = Quiz::create([
                    'date' => Carbon::parse($request->date)->format('Y-m-d'),
                    'online' => $request->online
                ]);
            }catch (\Exception $e){ return $this->jsonResponse('20201', __('Greška prilikom kreiranja kviza. Molimo da nas kontaktirate!')); }

            foreach ($setQuestions as $key => $question){
                $levelQuestion = ($counter == 3 or $counter == 6) ? true : false;

                try{
                    if($key === $counter){
                        $set = QuizSet::create([
                            'quiz_id' => $quiz->id,
                            'question_id' => $question->id,
                            'question_no' => $counter,
                            'level_question' => $levelQuestion
                        ]);
                    }else if(strval($key) === strval($counter."r")){
                        $set = QuizSet::create([
                            'quiz_id' => $quiz->id,
                            'question_id' => $question->id,
                            'question_no' => $counter,
                            'level_question' => $levelQuestion,
                            'replacement' => true
                        ]);

                        $counter++;
                    }
                }catch (\Exception $e){ return $this->jsonResponse('20202', __('Greška prilikom kreiranja pitanja. Molimo da nas kontaktirate!')); }

                try{
                    Question::where('id', $question->id)->update(['in_queue' => true]);
                }catch (\Exception $e){
                    return $this->jsonResponse('20203', __('Greška prilikom ažuriranja pitanja. Molimo da nas kontaktirate!'));
                }
            }

            return $this->jsonSuccess(__('Set uspješno kreiran'), route('system.quiz.preview', ['id' => $quiz->id ]));

        }catch (\Exception $e){ return $this->jsonResponse('20200', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!')); }
    }
    public function preview($id){
        return view($this->_path.'create', [
            'preview' => true,
            'quiz' => Quiz::where('id', $id)->first()
        ]);
    }
}
