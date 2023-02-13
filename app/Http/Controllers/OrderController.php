<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
      
        $this->adminModel = config('multiauth.models.admin');
    }

    public function index($slug)
    {

        // if ($slug == 'all') {
        //     $orders = Order::all();
        // }else{
        //     $orders = Order::where('status',$slug)->get();
        // }

        if ($slug == 'all') {
            $orders = Order::orderBy('id', 'desc')->paginate(15);
        }else{
            $orders = Order::where('status',$slug)->orderBy('id', 'desc')->paginate(15);
        }
        return view('vendor.multiauth.orders.index',compact('orders'));
    }
    
//   public function index($slug)
//     {

//         if ($slug == 'all') {
//             $orders = Order::all();
//         }else{
//             $orders = Order::where('status',$slug)->get();
//         }

//         return view('vendor.multiauth.orders.index',compact('orders'));
//     }
    
    public function userIndex($id)
    {
        
            // $orders = Order::where('user_id',$id)->get();
            $orders = Order::where('user_id',$id)->orderBy('id', 'desc')->paginate(15);

        return view('vendor.multiauth.orders.index',compact('orders'));
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
        $order = Order::where('id',$id)->first();
        return view('vendor.multiauth.orders.show',compact('order'));
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
        $order = Order::where('id',$id)->first();
        $request->validate([
            'status' => 'required',
            'comment' => '',
        ]);

        $balance = $order->user->balance;

        $old_status = $order->status;

        $order->update($request->all());

        if($order->status=='Completed' && $old_status != 'Completed') {
            $order->user->update([
                'balance' => ($balance + $order->get_amount)
            ]);
        }
        try {
            Mail::to($order->user->email)->send(new OrderMail($order));


        } catch (\Exception $e) {
            return $e;
            // return 'error sending mail';
        }

        return back()
            ->with('success','Trade Order updated successfully');
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
