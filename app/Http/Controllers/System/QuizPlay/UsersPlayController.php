<?php

namespace App\Http\Controllers\System\QuizPlay;

use App\Http\Controllers\Controller;
use App\Http\Traits\LogTrait;
use App\Models\Core\Countries;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizSet;
use App\Models\Settings\Config;
use App\Models\Users\HistoryScore;
use App\Models\Users\UsersHistory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsersPlayController extends Controller{
    use LogTrait;
    protected $_limit_days = 30;

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

            if($used == 0) $string = "Do sada nije otvoren niti jedan set";
            else if($used == 1) $string = "Do sada je otvoren samo jedan set pitanja";
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
            'countries' => Countries::pluck('name_ba', 'id')->prepend(__('Odaberite državu'), ''),
            'codes' => Countries::where('phone_code', '!=', null)->orderBy('phone_code')->get()->pluck('phone_code', 'phone_code'),
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
        // $activeQuiz = Quiz::where('active', 1)->where('finished', 0)->first();
        // if($activeQuiz) return redirect()-> route('system.quiz-play.live', ['quiz_id' => $activeQuiz->id ]);

        /* Send message to TV screen: Lines are open! */
        // $this->publishMessage($this->_tv_topic, '0000', [ 'sub_code' => '50103', 'forceShow' => true ]);

        return $this->getData('create');
    }

    /**
     * Create copy of User object for next episodes and quick search for common players!!
     *
     * @param Request $request
     * @return int
     */
    public function usersHistory(Request $request): int{
        try{
            /* If there is user with exact email, return ID */
            $history = UsersHistory::where('email', '=', $request->email)->first();
            if($history) return $history->id;

            /* Create new user and return ID */
            $history = UsersHistory::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'prefix' => $request->prefix,
                'phone' => $request->phone,
                'address' => $request->address,
                'zip' => $request->zip,
                'city' => $request->city,
                'country' => $request->country
            ]);

            return $history->id;
        }catch (\Exception $e){
            $this->write('UsersPlayController::usersHistory(args)', $e->getCode(), $e->getMessage(), $request);
        }
    }

    /**
     * Save new player to database and start new quiz
     * @param Request $request
     * @return false|\Illuminate\Http\JsonResponse|string
     */
    public function save(Request $request){
        try {
            /* Check if there are any of unfinished quizzes */
            $unFinished = Quiz::where('active', '=',1)->where('started', 1)->where('finished', 0)->count();

            if (!$this->getTotalSets()) return $this->jsonResponse('1208', __('Trenutno nema dostupan ni jedan set za igranje !'));
            if($unFinished) return $this->jsonResponse('1209', __('Molimo pričekajte da se završi prethodni set !'));


            if(isset($request->selected_user)){
                /**
                 *  User already exists in database; Join on it
                 */
                $user = User::where('id', '=', $request->selected_user)->first();
            }else{
                /**
                 *  Insert new user into database
                 */
                if(isset($request->first_name) and isset($request->last_name)){
                    $request['name'] = $request->first_name . ' ' . $request->last_name;
                }else return $this->jsonResponse('1210', __('Molimo da unesete ime i prezime korisnika !'));

                $user = User::where('email', $request->email)->first();
                if ($user) return $this->jsonResponse('1202', __('Odabrani email se već koristi !'));

                $user = User::where('username', $request->username)->first();
                if ($user) return $this->jsonResponse('1203', __('Odabrano korisničko ime se već koristi !'));

                $request['password'] = Hash::make($this->generateRandomString(10));
                $request->request->add(['api_token' => hash('sha256', $request->email . '+' . time())]);
                $request['email_verified_at'] = Carbon::now();

                /* Create new user */
                $user = User::create($request->except('_token'));
            }

            /* Set all quizzes as inactive */
            Quiz::where('id', '>', 0)->update(['active' => 0]);
            /* Select first available quiz */
            $quiz = Quiz::where('user_id', '=', NULL)->orderBy('id')->first();
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
            /* Send message to presenter screen */
            $this->_message['sub_code'] = '55014';
            $this->_message['user'] = User::where('id', $quiz->user_id)->with('countryRel')->first();
            $this->_message['current_quiz_no'] = Quiz::where('user_id', '!=', null)->count();
            $this->publishMessage($this->_presenter_topic, '0000', $this->_message);

            /* Send WS message to global channel to make Live feed available for operator*/
            $this->publishMessage($this->_global_channel, '0000', ['sub_code' => '51012', "quiz_id" => $quiz->id, "status" => "show", "route" => route('system.quiz-play.live', ['quiz_id' => $quiz->id])]);
            /* Also, set open lines as false since first category should open any second */
            // Config::where('key', 'open_lines')->update(['value' => 0]);
            // $this->publishMessage($this->_global_channel, '0000', ['sub_code' => '51011', "key" => "open_lines", "value" => 0]);

            /* Add users to history:: Deprecated */
            // $tempID = $this->usersHistory($request);

            /* Return redirect to quiz */
            return $this->jsonSuccess(__('Uspješno kreiran korisnički profil'), route('system.users.all-users'));
        } catch (\Exception $e) {
            $this->write('UsersPlayController::save(args)', $e->getCode(), $e->getMessage(), $request);

            return $this->jsonResponse('1201', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    /**
     * Check for user existence and offer live check for phone controller
     * @param Request $request
     * @return false|string
     */
    public function checkForExistence(Request $request){
        try{
            $users = User::where('first_name', 'LIKE', '%' . $request->first_name . '%')
                ->where('last_name', 'LIKE', '%' . $request->last_name . '%')
                ->with('countryRel')
                ->take(5)->get();

            foreach ($users as $user){
                try{
                    /* Set by default to false */
                    $user->hasScore = false;
                    $beginningDate = Carbon::now()->subMonth()->format('Y-m-d');

                    $user->quizzes_in_last_month = HistoryScore::where('user_id', '=', $user->id)->where('date', '>=', $beginningDate)->orderBy('date', 'DESC')->count();
                    $user->allowed_to_play = $user->quizzes_in_last_month < 2;

                    if($user->quizzes_in_last_month == 0){
                        $user->additional_info = __('Korisnik/ca nije igrala u zadnjih mjesec dana!');
                    }else if($user->quizzes_in_last_month == 1){
                        $user->additional_info = __('Korisnik/ca je igrala jednom u zadnjih mjesec dana!');
                    }else{
                        $user->additional_info = __('Korisnik/ca je igrao/la ' . $user->quizzes_in_last_month .' puta u zadnjih mjesec dana!');
                    }

                    /* Get last score from user */
                    $score = HistoryScore::where('user_id', '=', $user->id)->orderBy('date', 'DESC')->first();
                    if($score){
                        $now = Carbon::now();
                        $date = Carbon::parse($score->date);

                        $user->hasScore = true;
                        $user->last = $date->diffInDays($now);
                        $user->last_date = Carbon::parse($score->date)->format('d.m.Y');
                        $user->total = HistoryScore::where('user_id', '=', $user->id)->count();

                        if($user->last < 30){
                            $timeExplanation = ($user->last) . " dana)!";
                        }else if(($user->last >= 30) and ($user->last <= 60)){
                            $timeExplanation = "mjesec dana)!";
                        }else if(($user->last > 60) and ($user->last <= 90)){
                            $timeExplanation = "dva mjeseca)!";
                        }else{
                            $timeExplanation = "više od 3 mjeseca)";
                        }

                        $user->score_exp = "Zadnji put igrao/la " . $user->last_date . " (prije " . $timeExplanation;
                    }else{
                        $user->last = 'Nije poznato!';
                    }
                }catch (\Exception $e){
                    $this->write('UsersPlayController::checkForExistence(args)', $e->getCode(), $e->getMessage(), $request);
                }
            }

            return $this->jsonResponse('0000', __('Success'), [
                'users' => $users
            ]);
        }catch (\Exception $e){
            $this->write('UsersPlayController::checkForExistence(args)', $e->getCode(), $e->getMessage(), $request);
            return $this->jsonResponse('1202', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    /**
     * Fetch users data by UserID
     * @param Request $request
     * @return false|string
     */
    public function fetchUserData(Request $request){
        try{
            return $this->jsonResponse('0000', __('Success'), [
                'user' => User::where('id', '=', $request->id)->first()
            ]);
        }catch (\Exception $e){
            $this->write('UsersPlayController::fetchUserData(args)', $e->getCode(), $e->getMessage(), $request);
            return $this->jsonResponse('1202', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    public function checkForAttr(Request $request){
        try{
            return $this->jsonResponse('0000', __('Success'), [
                'exists' => User::where($request->key, '=', $request->value)->count()
            ]);
        }catch (\Exception $e){
            $this->write('UsersPlayController::checkForAttr(args)', $e->getCode(), $e->getMessage(), $request);
            return $this->jsonResponse('1202', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
}
