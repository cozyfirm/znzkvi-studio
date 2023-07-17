<?php

namespace App\Http\Controllers\System\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz\Questions\Question;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpMqtt\Client\Facades\MQTT;

class QuizController extends Controller{
    protected $_path = 'system.quiz.';

    public function index(){
        return view($this->_path.'index', [

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
                Quiz::truncate();
                Question::truncate();

                /*
                 *  Insert fresh data into database
                 */
                foreach ($jsonData->data as $quiz){
                    dd($quiz->set_rel);
                }

                return back()->with('success', __('Sinhronizacija šifarnika uspješno završena!'));
            }else{
                /* ToDo -- Log error into local database */
                return back()->with('error', __('Problem u komunikaciji sa centralnim sistemom. Molimo pokušajte ponovo!'));
            }

        }catch (\Exception $e){
            return back()->with('error', __('Desila se greška prilikom sinhronizacije. Error code : ') . $e->getCode());
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
            MQTT::publish('quiz/znzkvi/live-stream', json_encode($request->all(), JSON_UNESCAPED_UNICODE ));

            return $this->jsonSuccess(__('Pitanje uspješno poslano!'));
        }catch (\Exception $e){ dd($e); return $this->jsonResponse('20300', __('Greška prilikom slanja poruke putem MQTT_a!')); }
    }
}
