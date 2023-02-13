<?php

namespace App\Http\Controllers;

use App\Bitcoin;
use App\Models\Cardorder;
use App\Models\Giftcard;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\AdminGiftcardMail;
use Illuminate\Support\Facades\Mail;

class GiftcardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $giftcards = Giftcard::where('status',1)->get();
        $bitcoin = Bitcoin::where('id',1)->first();
        $cardorders = Auth::user()->cardorders()->orderBy('id', 'desc')  -> paginate(5);
        return view('giftcard.index', compact('giftcards','bitcoin','cardorders'));
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
            'giftcard_id'    => 'required',
            'email'          => 'required',
            'amount_base'   => 'required',
            'amount_usd'     => 'required',
            'amount_btc'     => 'required',
        ]);

        $user = Auth::user();

        $id = IdGenerator::generate(['table' => 'cardorders', 'length' => 12, 'prefix' =>'ORD-', 'field' => 'txid']);

        $recharge = Cardorder::create([
            'giftcard_id'    => $request->giftcard_id,
            'email'          => $request->email,
            'amount_base'   => $request->amount_base,
            'amount_usd'     => $request->amount_usd,
            'amount_btc'     => $request->amount_btc,
            'user_id'        => $user->id,
            'status'         => 'Pending',
            'comment'        => '',
            'txid'           => $id,
            'note'           => $request->note ?? ''
        ]);
        
        Mail::to('coinwoidx@gmail.com')->send(new AdminGiftcardMail($recharge));
       
        
        return back()->with('success','Your Order Has been Placed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $cardorder = Cardorder::with('giftcard')->where('id',$id)->first();
        return view('giftcard.show',compact('cardorder'));
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
