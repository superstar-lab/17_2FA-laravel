<?php

namespace App\Http\Controllers;

use App\Notifications\twoFaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class twoFaController extends Controller
{
    public function new()
    {
        $number = random_int(100000,999999);
        $user = Auth::user();
        $user->update([
            'twofa' => $number
        ]);
        $user->notify(new twoFaNotification($user->twofa));
        return redirect()->route('wallet.2fa')->with('success','A new Code has been sent to your email');
    }

    public function check(Request $request)
    {
        if(auth()->user()->twofa == $request->code){
            $user = Auth::user();

            $user->update([
                'twofa' => 0,
            ]);

            Session::put('2fa',true);
        }

        return redirect()->route('wallet.send');

    }
}
