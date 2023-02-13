<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Mail\WithdrawMail;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Mail;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminModel = config('multiauth.models.admin');
    }

    public function index($slug)
    {
          
        $ordersmoney = Withdraw::where('status','Pending')->sum('amount');
        
    
        // if ($slug == 'all') {
        //     $orders = Withdraw::all();
        // }else{
        //     $orders = Withdraw::where('status',$slug)->get();
        // }
        
         if ($slug == 'all') {
            $orders = Withdraw::orderBy('id', 'desc')->paginate(15);
        }else{
            $orders = Withdraw::where('status',$slug)->orderBy('id', 'desc')->paginate(15);
        }

        return view('vendor.multiauth.withdraws.index',compact('orders'))->with('pendingmoney',$ordersmoney);
    }


    public function userIndex($id)
    {

        
            // $orders = Withdraw::where('user_id',$id)->get();
            $orders = Withdraw::where('user_id',$id)->orderBy('id', 'desc')->paginate(15);
        

        return view('vendor.multiauth.withdraws.index',compact('orders'));
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
        $order = Withdraw::where('id',$id)->first();
        return view('vendor.multiauth.withdraws.show',compact('order'));
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
        $order = Withdraw::where('id',$id)->first();
        $request->validate([
            'status' => 'required',
            'comment' => '',
        ]);
        $old_status = $order->status;
        $order->update($request->all());

        
        try {
            Mail::to($order->user->email)->send(new WithdrawMail($order));

        } catch (\Exception $e) {
            return 'error sending mail';
        }

        return back()
            ->with('success','Withdraw request updated successfully');
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
