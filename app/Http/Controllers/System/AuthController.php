<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Core\Countries;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{
    protected $_path = 'system.users.auth.';

    public function auth(){
        return view($this->_path . 'auth');
    }
    public function authenticate (Request $request){
        try{
            if(!isset($request->username)) return $this->jsonResponse('1102', __('Unesite Vaše korisničko ime ili email'));
            if(!isset($request->password)) return $this->jsonResponse('1103', __('Unesite Vašu šifru'));

            $unknownUsername = false; $success = false;

            $user = User::where('username', $request->username)->first();
            if(!$user){
                $user = User::where('email', $request->username)->first();
                $unknownUsername = true;

                if(!$user) return $this->jsonResponse('1104', __('Nepoznato korisničko ime ili email'));
            }

            if(!$unknownUsername){
                if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) $success = true;
            }else{
                if(Auth::attempt(['email' => $request->username, 'password' => $request->password])) $success = true;
            }

            if($success){
                $user = Auth::user();
                return $this->jsonResponse('0000', __('Success'), [
                    'username' => $user->username,
                    'email' => $user->email,
                    'api_token' => $user->api_token,
                    'uri' => route('system.users.my-profile')
                ]);
            }else {
                return $this->jsonResponse('1105', __('Unijeli ste pogrešnu šifru'));
            }

        }catch (\Exception $e){
            return $this->jsonResponse('1101', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('system.auth');
    }

    /*
     *  Create profile | Register new user
     */
    public function createProfile(){
        return view($this->_path.'create-profile', [
            'phone_prefixes' => Countries::where('phone_code', '!=', null)->pluck('phone_code', 'id'),
            'countries' => Countries::pluck('name_ba', 'id')->prepend(__('Odaberite državu'), ''),
        ]);
    }
    public function createNewProfile (Request $request){
        try{
            if(!isset($request->password)) return $this->jsonResponse('1001', __('Unesite Vašu šifru'));

            /* Check for unique email and username */
            $user = User::where('email', $request->email)->first();
            if($user) return $this->jsonResponse('1002', __('Odabrani email se već koristi'));

            $user = User::where('username', $request->username)->first();
            if($user) return $this->jsonResponse('1003', __('Željeno korisniko ime je već zauzeto'));

            /* Password check */
            //try{
            //    $passwordCheck = $this->passwordCheck($request);
            //
            //    if($passwordCheck['code'] != '0000'){
            //        return $this->jsonResponse($passwordCheck['code'], $passwordCheck['message']);
            //    }
            //}catch (\Exception $e){ return $this->jsonResponse('1001', __('Error while processing your request. Please contact an administrator')); }

            /* Create new user */
            $request['password'] = Hash::make($request->password);
            $request->request->add(['api_token' => hash('sha256', $request->email. '+'. time())]);
            $request['email_verified_at'] = Carbon::now();
            // $request['phone'] = $request->prefix . $request->phone;

            $user = User::create($request->except(['_token']));

            if($user) return $this->jsonSuccess(__('Uspješno ste se kreirali korisnički račun!'), route('system.auth'));
        }catch (\Exception $e){
            return $this->jsonResponse('1101', __('Greška prilikom procesiranja podataka. Molimo da nas kontaktirate!'));
        }
    }
}
