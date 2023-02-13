<?php

namespace App\Http\Controllers;

use App\Models\Cardorder;
use App\Models\Order;
use App\Mail\GiftcardMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class CardOrderController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminModel = config('multiauth.models.admin');
    }

    public function index($slug)
    {

        if ($slug == 'all') {
            $orders = Cardorder::all();
        }else{
            $orders = Cardorder::where('status',$slug)->get();
        }

        return view('vendor.multiauth.cardorders.index',compact('orders'));
    }
    
    public function userIndex($id)
    {

            $orders = Cardorder::where('user_id',$id)->get();

        return view('vendor.multiauth.cardorders.index',compact('orders'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $order = Cardorder::where('id',$id)->first();
        return view('vendor.multiauth.cardorders.show',compact('order'));
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



    public function update(Request $request,$id)
    {
        $order = Cardorder::where('id',$id)->first();
        $request->validate([
            'status' => 'required',
            'comment' => '',
        ]);


        $order->update($request->all());

        try {
            Mail::to($order->user->email)->send(new GiftcardMail($order));


        } catch (\Exception $e) {
            return 'error sending mail';
        }

        return back()
            ->with('success','Order updated successfully');
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
