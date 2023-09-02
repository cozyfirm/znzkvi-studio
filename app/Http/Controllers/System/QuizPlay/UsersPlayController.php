<?php

namespace App\Http\Controllers\System\QuizPlay;

use App\Http\Controllers\Controller;
use App\Models\Core\Countries;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersPlayController extends Controller{
    protected $_path = 'system.quiz-play.users.';
    protected $_message = "";

    protected function totalMoney(){
        try{
            return Quiz::sum('total_money');
        }catch (\Exception $e){ return 0; }
    }
    protected function questionsOpened(){
        try{
            return QuizSet::where('opened', 1)->count();
        }catch (\Exception $e){ return 0; }
    }

    public function getTotalSets(){
        try{
            return Quiz::count();
        }catch (\Exception $e){ return 0; }
    }
    public function getUsedSets(){
        try{
            $used = Quiz::whereNotNull('user_id')->count();
            $string = "Do sada su otvorena ";

            if($used == 0) $string = "Do sada nije otvoren niti jedan set!";
            else if($used == 1) $string = "Do sada je otvoren samo jedan set pitanja!";
            else if($used == 2 or $used == 3 or $used == 4) $string .=  ($used . " seta pitanja");
            else {
                $string  = "Do sada je otvoreno ";
                $string .= ($used . " setova pitanja");
            }
        }catch (\Exception $e){ return "Greška prilikom čitanja setova"; }

        return $string;
    }
    public function getData($action, $username = null){
        return view($this->_path.'create', [
            'countries' => Countries::pluck('name', 'id')->prepend(__('Odaberite državu'), ''),
            'codes' => Countries::where('phone_code', '!=', null)->pluck('phone_code', 'phone_code'),
            $action => true,
            'user' => isset($username) ? User::where('username', $username)->first() : NULL,
            'totalSets' => $this->getTotalSets(),
            'totalUsedSets' => $this->getUsedSets(),
            'numOfTotalUsedSets' => Quiz::whereNotNull('user_id')->count(),
            'totalMoney' => $this->totalMoney(),
            'questionsOpened' => $this->questionsOpened()
        ]);
    }

    /*
     *  Create new user for Quiz
     */
    public function create(){
        /* First, let's check if there is currently any active quiz */
        $activeQuiz = Quiz::where('active', 1)->where('finished', 0)->first();
        if($activeQuiz) return redirect()-> route('system.quiz-play.live', ['quiz_id' => $activeQuiz->id ]);

        /* Send message to TV screen: Lines are open! */
        $this->publishMessage($this->_tv_topic, '0000', [ 'sub_code' => '50103', 'forceShow' => true ]);
        /* ToDo: Send message to presenter screen */

        return $this->getData('create');
    }
    public function save(Request $request){
        try{
            try{
                if(! $this->getTotalSets()) return $this->jsonResponse('1208', __('Trenutno nema dostupan ni jedan set za igranje !'));

                $user = User::where('email', $request->email)->first();
                if($user) return $this->jsonResponse('1202', __('Odabrani email se već koristi'));

                $user = User::where('username', $request->username)->first();
                if($user) return $this->jsonResponse('1203', __('Željeno korisniko ime je već zauzeto'));

                $request['password'] = Hash::make($this->generateRandomString(10));
                $request->request->add(['api_token' => hash('sha256', $request->email. '+'. time())]);
                $request['email_verified_at'] = Carbon::now();

                /* Create new user */
                $user = User::create($request->except('_token'));
                /* Set all quizzes as inactive */
                Quiz::where('id', '>', 0)->update(['active' => 0]);
                /* Select first available quiz */
                $quiz = Quiz::where('user_id', '=', NULL)->first();
                /* Update quiz with user */
                $quiz->update(['user_id' => $user->id, 'active' => 1]);

                /* Send message to TV screen to show announce first category */

                /* Setup message */
                $this->_message = [
                    'current_question' => 1,
                    'category' => 1,
                    'question' => $quiz->currentQuestion(),
                    'sub_code' => '50014'
                ];

                /* Send WS message; Show first category on screen */
                $this->publishMessage($this->_tv_topic, '0000', $this->_message);
                /* ToDo: Send message to presenter screen */


                /* Return redirect to quiz */
                return $this->jsonSuccess(__('Uspješno kreiran korisnički profil'), route('system.quiz-play.live', ['quiz_id' => $quiz->id ]));
            }catch (\Exception $e){
                dd($e);
                return $this->jsonResponse('1201', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
            }
        }catch (\Exception $e){}
    }
}
