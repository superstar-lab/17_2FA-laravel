<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Notifications\twoFaNotification;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class twoFa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if($request->user()->twofa > 0){
            $number = random_int(100000,999999);
            $user = User::find($request->user()->id);
            $user->update([
                'twofa' => $number
            ]);
            $user->notify(new twoFaNotification($user->twofa));
            return redirect()->route('wallet.2fa');
        }else if (Session::get('2fa') === false) {
            $number = random_int(100000,999999);
            $user = User::find($request->user()->id);
            $user->update([
                'twofa' => $number
            ]);
            $user->notify(new twoFaNotification($user->twofa));
            return redirect()->route('wallet.2fa');

        }
        else{
            return $next($request);
        }


    }
}
