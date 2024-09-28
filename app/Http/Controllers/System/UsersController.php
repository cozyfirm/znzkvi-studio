<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Core\Countries;
use App\Models\Users\UsersHistory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller{
    protected $_path = 'system.users.';

    /*
     *  My profile - User only available profile
     */

    public function myProfile(){
        return view($this->_path. 'my-profile', [
            'user' => User::where('id', Auth::user()->id)->first(),
            'countries' => Countries::pluck('name_ba', 'id')->prepend(__('Odaberite državu'), ''),
            'codes' => Countries::where('phone_code', '!=', null)->pluck('phone_code', 'id'),
        ]);
    }
    public function updateProfile(Request $request){
        try {
            User::where('id', Auth::user()->id)->update(
                $request->except(['_token'])
            );

            return $this->jsonSuccess(__('Uspješno ažurirano!'), route('system.users.my-profile'));
        }catch (\Exception $e){
            return $this->jsonResponse('1200', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }


    /* -------------------------------------------------------------------------------------------------------------- */
    /*
     *  Admin role => Preview and edit all users
     */
    public function allUsers (){
        $users = User::where('role', '!=', 4);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => __('Email'),
            'phone' => __('Telefon'),
            'address' => 'Adresa stanovanja',
            'city' => __('Grad'),
            'countryRel.name' => __('Država'),
            'scoreRel.date' => __('Datum kviza'),
            'scoreRel.correct_answers' => __('Tačnih odgovora'),
            'scoreRel.joker' => __('Joker'),
            'scoreRel.threshold' => __('Prag'),
            'scoreRel.total_money' => __('Osvojeno novca')
        ];

        return view($this->_path.'index', [
            'users' => $users,
            'filters' => $filters
        ]);
    }

    public function getData($action, $username = null){
        return view($this->_path.'create', [
            'countries' => Countries::pluck('name_ba', 'id')->prepend(__('Odaberite državu'), ''),
            'codes' => Countries::where('phone_code', '!=', null)->pluck('phone_code', 'phone_code'),
            $action => true,
            'user' => isset($username) ? User::where('username', $username)->first() : NULL
        ]);
    }
    public function createUser(){
        return $this->getData('create');
    }
    public function saveUser(Request $request){
        try{
            if(isset($request->first_name) and isset($request->last_name)){
                $request['name'] = $request->first_name . ' ' . $request->last_name;
            }else return $this->jsonResponse('1210', __('Molimo da unesete ime i prezime korisnika !'));

            $user = User::where('email', $request->email)->first();
            if($user) return $this->jsonResponse('1202', __('Odabrani email se već koristi'));

            $user = User::where('username', $request->username)->first();
            if($user) return $this->jsonResponse('1203', __('Željeno korisniko ime je već zauzeto'));

            $request['password'] = Hash::make($this->generateRandomString(10));
            $request->request->add(['api_token' => hash('sha256', $request->email. '+'. time())]);
            $request['email_verified_at'] = Carbon::now();

            $user = User::create($request->except('_token'));
            return $this->jsonSuccess(__('Uspješno kreiran profil'), route('system.users.preview-user', ['username' => $user->username]));
        }catch (\Exception $e){
            return $this->jsonResponse('1201', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function previewUser($username){
        return $this->getData('preview', $username);
    }
    public function editUser($username){
        return $this->getData('edit', $username);
    }
    public function updateUserData(Request $request){
        try{
            if(isset($request->first_name) and isset($request->last_name)){
                $request['name'] = $request->first_name . ' ' . $request->last_name;
            }else return $this->jsonResponse('1210', __('Molimo da unesete ime i prezime korisnika !'));

            User::where('id', '=', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this->jsonSuccess(__('Uspješno kreiran profil'), route('system.users.preview-user', ['username' => $request->username]));

        }catch (\Exception $e){
            return $this->jsonResponse('1203', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }

    /**
     *  History of users | Deprecated and won't be used anymore
     */
    public function usersHistory (){
        $users = UsersHistory::where('id', '>', 0);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => __('Email'),
            'phone' => __('Telefon'),
            'address' => 'Adresa stanovanja',
            'city' => __('Grad'),
            'countryRel.name' => 'Država',
            'scoreRel.date' => 'Datum kviza',
            'scoreRel.correct_answers' => 'Tačnih odgovora',
            'scoreRel.joker' => 'Joker',
            'scoreRel.threshold' => 'Prag',
            'scoreRel.total_money' => 'Osvojeno novca'
        ];

        return view($this->_path.'history', [
            'users' => $users,
            'filters' => $filters
        ]);
    }
    public function previewHistory($id){
        return view($this->_path.'create', [
            'countries' => Countries::pluck('name_ba', 'id')->prepend(__('Odaberite državu'), ''),
            'codes' => Countries::where('phone_code', '!=', null)->pluck('phone_code', 'phone_code'),
            'preview' => true,
            'history' => true,
            'user' => UsersHistory::where('id', '=', $id)->first()
        ]);
    }
}
