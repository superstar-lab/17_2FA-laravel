<?php

namespace App\Http\Controllers;

use App\Bitcoin;
use App\Operator;
use App\Recharge;
use App\Mail\AdminRechargeMail;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $operators = Operator::where('status',1)->get();
        $bitcoin = Bitcoin::where('id',1)->first();
        $recharges = Auth::user()->recharges()->orderBy('id', 'desc')  -> paginate(5);

        return view('recharge.index',compact('operators','bitcoin','recharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'operator_id'    => 'required',
            'phone'          => 'required',
            'amount_naira'   => 'required',
            'amount_usd'     => 'required',
            'amount_btc'     => 'required',
        ]);

        $user = Auth::user();
        $id = IdGenerator::generate(['table' => 'recharges', 'length' => 12, 'prefix' =>'TXR', 'field' => 'txid']);

        $recharge = Recharge::create([
            'operator_id'    => $request->operator_id,
            'phone'          => $request->phone,
            'amount_naira'   => $request->amount_naira,
            'amount_usd'     => $request->amount_usd,
            'amount_btc'     => $request->amount_btc,
            'user_id'        => $user->id,
            'status'         => 'Pending',
            'comment'        => '',
            'txid'           => $id,
            'note'           => $request->note ?? ''
        ]);
        
        Mail::to('coinwoidx@gmail.com')->send(new AdminRechargeMail($recharge));
        
        return back()->with('success','Recharge Request Has been placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $recharge = Recharge::with('operator')->where('id',$id)->first();
        return view('recharge.show',compact('recharge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
