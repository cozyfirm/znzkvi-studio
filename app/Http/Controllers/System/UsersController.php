<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\Filters;
use App\Models\Core\Countries;
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
            'countries' => Countries::pluck('name', 'id')->prepend(__('Odaberite državu'), ''),
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
        $users = User::where('banned', 0);
        $users = Filters::filter($users);
        $filters = [
            'name' => __('Ime i prezime'),
            'email' => __('Email'),
            'phone' => __('Telefon'),
            'address' => 'Adresa stanovanja',
            'city' => __('Grad'),
            'countryRel.name' => 'Država'
        ];

        return view($this->_path.'index', [
            'users' => $users,
            'filters' => $filters
        ]);
    }

    public function getData($action, $username = null){
        return view($this->_path.'create', [
            'countries' => Countries::pluck('name', 'id')->prepend(__('Odaberite državu'), ''),
            'codes' => Countries::where('phone_code', '!=', null)->pluck('phone_code', 'id'),
            $action => true,
            'user' => isset($username) ? User::where('username', $username)->first() : NULL
        ]);
    }
    public function createUser(){
        return $this->getData('create');
    }
    public function saveUser(Request $request){
        try{
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
            User::where('id', $request->id)->update($request->except(['_token', '_method', 'id']));
            return $this->jsonSuccess(__('Uspješno kreiran profil'), route('system.users.preview-user', ['username' => $request->username]));

        }catch (\Exception $e){
            return $this->jsonResponse('1203', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
}
