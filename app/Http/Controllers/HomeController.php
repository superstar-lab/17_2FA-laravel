<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Auth::user()->orders()->orderBy('id', 'desc')  -> paginate(5);
        $withdraws = Auth::user()->withdraws()->orderBy('id','desc') -> paginate(5);
        return view('home',compact('orders','withdraws'));
    }
}
