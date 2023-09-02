<?php

namespace App\Http\Middleware;

use App\Models\Settings\Config;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class isLogged
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
