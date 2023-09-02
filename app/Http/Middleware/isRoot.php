<?php

namespace App\Http\Middleware;

use App\Models\Settings\Config;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class isRoot
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){
            $user = User::find(Auth::id());

            if($user->role != 4) return redirect()->route('system.auth');

            \View::share([
                'loggedUser' => $user,
                'openLines' => Config::where('key', 'open_lines')->first()
            ]);
            return $next($request);
        }else{
            return redirect()->route('system.auth');
        }
    }
}
