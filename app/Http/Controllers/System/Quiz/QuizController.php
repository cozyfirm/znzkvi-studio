<?php

namespace App\Http\Controllers\System\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Quiz\Questions\Answers;
use App\Models\Quiz\Questions\Question;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use App\Models\Settings\Keyword;
use App\Models\Sponsors\SponsorsData;
use App\Models\Users\HistoryScore;
use App\Models\Users\UsersHistory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;

class QuizController extends Controller{
    protected $_path = 'system.quiz.';
    protected $_totalInserted = 0;

    public function index(){
        $quizzes = Quiz::orderBy('id');
        $quizzes = Filters::filter($quizzes);
        $filters = [
            'date' => __('Datum'),
            'userRel.name' => __('Korisničko ime'),
            'activeRel.name' => __('Aktivan'),
            'correct_answers' => __('Tačnih odgovora'),
            'threshold' => __('Prag'),
            'total_money' => __('Osvojeno novca'),
            'startedRel.name' => __('Započeo'),
            'finishedRel.name' => __('Završio'),
        ];

        return view($this->_path.'index', [
            'quizzes' => $quizzes,
            'filters' => $filters
        ]);
    }
    public function preview($id){
        return view($this->_path.'create', [
            'preview' => true,
            'quiz' => Quiz::where('id', $id)->first()
        ]);
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Sync all quizzes by date
     */
    public function syncQuizzess(){
        return view($this->_path.'sync');
    }
    protected function truncateTables(){
        try{
            Quiz::truncate();
            QuizSet::truncate();
            Question::truncate();
            Answers::truncate();
        }catch (\Exception $e){}
    }
    public function syncQuizzesFromCenter(Request $request){
        try{
            $data = $this::fetchData('POST', 'api/sync/quizzes', ['date' => $request->date]);
            $jsonData = json_decode($data->getBody()->getContents());

            if($jsonData->code == '0000'){
                /*
                 *  First step is to clean data table; Truncate all data from quiz and questions tables
                 *
                 *  1. Quiz truncate deletes all from quiz and from quiz__sets
                 *  2. Question truncate deletes all from quiz__questions and quiz__question_answers
                 */
                $this->truncateTables();

                /*
                 *  Insert fresh data into database
                 */
                foreach ($jsonData->data as $quiz){
                    $quizObject = Quiz::create([
                        'id' => $quiz->id,
                        'date' => $quiz->date,
                        'online' => $quiz->online,
                        'correct_answers' => $quiz->correct_answers,
                        'joker' => $quiz->joker,
                        'threshold' => $quiz->threshold,
                        'total_money' => $quiz->total_money
                    ]);

                    foreach ($quiz->set_rel as $set){
                        $setObject = QuizSet::create([
                            'id' => $set->id,
                            'quiz_id' => $set->quiz_id,
                            'question_id' => $set->question_id,
                            'question_no' => $set->question_no,
                            'opened' => $set->opened,
                            'answered' => $set->answered,
                            'correct' => $set->correct,
                            'level_question' => $set->level_question,
                            'level_opened' => $set->level_opened,
                            'level_answered' => $set->level_answered,
                            'level_correct' => $set->level_correct,
                            'joker' => $set->joker,
                            'replacement' => $set->replacement
                        ]);

                        $question = Question::create([
                            'id' => $set->question_rel->id,
                            'question' => $set->question_rel->question,
                            'category' => $set->question_rel->category,
                            'category_image' => $set->question_rel->category,
                            'weight' => $set->question_rel->weight,
                            'correct_answer' => $set->question_rel->correct_answer,
                            'additional_questions' => $set->question_rel->additional_questions,
                            'additional_q_answer' => $set->question_rel->additional_q_answer,
                            'locked' => $set->question_rel->locked,
                            'in_queue' => $set->question_rel->in_queue,
                            'created_by' => $set->question_rel->created_by
                        ]);

                        foreach ($set->question_rel->answers_rel as $answer){
                            $answerObject = Answers::create([
                                'id' => $answer->id,
                                'question_id' => $answer->question_id,
                                'order' => $answer->order,
                                'answer' => $answer->answer,
                                'correct' => $answer->correct
                            ]);
                        }
                    }

                    $this->_totalInserted ++;
                }

                return $this->jsonResponse('0000', __('Sinhronizacija uspješno izvršena. Ukupno sinhronizovano ') . $this->_totalInserted . __(' setova.'));
            }else{
                /* ToDo -- Log error into local database */
                return $this->jsonResponse('20351', __('Problem u komunikaciji sa centralnim sistemom. Molimo pokušajte ponovo!'));
            }

        }catch (\Exception $e){
            return $this->jsonResponse('20350', __('Desila se greška prilikom sinhronizacije. Error code : ') . $e->getCode());
        }
    }
    protected function deleteSample($id){
        try{
            $quiz = Quiz::where('id', $id)->first();
            $sets = QuizSet::where('quiz_id', $id)->get();

            foreach ($sets as $set){
                $set->questionRel->answerARel->delete();
                $set->questionRel->answerBRel->delete();
                $set->questionRel->answerCRel->delete();
                $set->questionRel->answerDRel->delete();

                $set->questionRel->delete();
                $set->delete();
            }

            $quiz->delete();

            return true;
        }catch (\Exception $e){ return false; }
    }

    public function updateHistorySets(){
        $quizzes = Quiz::with('setRel')->with('userRel')->get();

        foreach ($quizzes as $quiz){
            if(isset($quiz->userRel)){
                $history = UsersHistory::where('first_name', 'LIKE', '%' . $quiz->userRel->first_name . "%")
                    ->where('last_name', 'LIKE', '%' . $quiz->userRel->last_name . "%")->first();

                /* Check does that sample exists */
                $score = HistoryScore::where('history_id', '=', $history->id)->where('date', $quiz->date)->first();
                if(!$score){
                    HistoryScore::create([
                        'history_id' => $history->id,
                        'date' => $quiz->date,
                        'correct_answers' => $quiz->correct_answers,
                        'joker' => $quiz->joker,
                        'threshold' => $quiz->threshold,
                        'total_money' => $quiz->total_money
                    ]);
                }
            }
        }
    }

    /**
     * Push data to center; After episode is done, sync with central system
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function syncQuizzesToCenter(){
        try{
            $quizzes = Quiz::with('setRel')->with('userRel')->get()->toArray();

            /**
             *  Update later for history
             */
            $this->updateHistorySets();

            /**
             *  Create HTTP Request to central system and sync data
             */
            $sendData = $this::fetchData('POST', 'api/sync/update-quizzes/sync-from-local-app', ['quizzes' => $quizzes]);
            $jsonData = json_decode($sendData->getBody()->getContents());

            foreach ($jsonData->data->successQuizzes as $qID){
                $this->deleteSample($qID);
            }

            if($jsonData->code != '0000'){
                return redirect()->route('system.quiz')->with('api-success', [
                    'message' => __('Došlo je do greške prilikom sinhronizacije, neki od setova nisu sinhronizovani !'),
                    'data' => $jsonData->data
                ]);
            }else{
                /* Delete all users from local database */
                // User::where('role', '!=', 4)->delete();
                /**
                 *  Do not delete previous users on system !!
                 */

                return redirect()->route('system.quiz')->with('api-success', [
                    'message' => __('Svi setovi pitanja su uspješno sinhronizovani prema centralnom sistemu!'),
                    'data' => $jsonData->data
                ]);
            }
        }catch (\Exception $e){dd($e);}
    }

    public function delete($id){
        try{
            $this->deleteSample($id);

            return redirect()->route('system.quiz')->with('success', __('Kviz uspješno izbrisan !'));
        }catch (\Exception $e){
            return redirect()->route('system.quiz')->with('error', __('Desila se greška prilikom brisanja kviza, molimo kontaktirajte administratora!'));
        }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Demo version of quiz
     */

    public function demo(){
//        $mqtt = MQTT::connection();
//        $mqtt->subscribe('home/lights', function (string $topic, string $message) {
//            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
//        }, 1);
//        $mqtt->loop(true);

//        MQTT::publish('home/lights', 'Hello World! ee');

        return view($this->_path.'demo/demo-question');
    }

    public function sendDemoMsg(Request $request){
        try{
            /* Note: json_encode utf-8, pass second param: JSON_UNESCAPED_UNICODE */


            return $this->jsonSuccess(__('Pitanje uspješno poslano!'));
        }catch (\Exception $e){ dd($e); return $this->jsonResponse('20300', __('Greška prilikom slanja poruke putem MQTT_a!')); }
    }

    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Edit question category image
     */
    public function editCategoryImage ($quiz_id, $id){
        $sponsorsData = SponsorsData::where('category', 'category')->get()->pluck('title', 'elem_name');
        $question = Question::where('id', $id)->first();
        $currentCategory = Keyword::where('type', 'question_category')->where('value', $question->category)->first();
        $sponsorsData[$currentCategory->value] = $currentCategory->name;

        return view($this->_path . 'edit-category-image', [
            'quiz' => Quiz::where('id', $quiz_id)->first(),
            'question' => $question,
            'images' => $sponsorsData
        ]);
    }
    public function updateCategoryImage (Request $request){
        Question::where('id', $request->id)->update([
            'category_image' => $request->image
        ]);

        return redirect()->route('system.quiz.preview', ['id' => $request->quiz_id ]);
    }
}
