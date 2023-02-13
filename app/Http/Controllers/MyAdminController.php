<?php

namespace App\Http\Controllers;

use App\CardCategory;
use App\Models\Order;
use Bitfumes\Multiauth\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Bitfumes\Multiauth\Model\Admin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Mail\UpdateMail;
use Illuminate\Support\Facades\Mail;


class MyAdminController extends AdminController
{
    use AuthorizesRequests;


    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);

        $unreadUsers = \App\Models\User::where('isUnread',1)->latest()->paginate(10);



        return view('multiauth::admin.home',compact('orders','unreadUsers'));
    }
    
    
    
    //code by satyendra pandey     
      public function emailView()
        {
          return view('multiauth::emailview.index');
        }
        
        public function sendEmail(Request $request)
        {
          return view('multiauth::emailview.sendemail');
        }
        
        public function handleEmailSend(Request $request)
        {
           $content = $request->content;
           $subject = $request->subject;
           
        // $users = \App\Models\User::orderBy('id', 'desc')->whereBetween('id',[26950, 27000])->get();
        $users = \App\Models\User::orderBy('id', 'asc')->get();
   
        //   try {
        //         Mail::to("pandeysatyendra870@gmail.com")->queue(new UpdateMail($content));
                    
        //         } catch (\Exception $e) {
        //             print_r($e);die;
        //       return $e;
        //       }
           foreach($users as $user){
                try {
                  Mail::to($user->email)->queue(new UpdateMail($content));
                    
                } catch (\Exception $e) {
               return $e;
               }
          }
           
           return back()
            ->with('success','Success Mail Sent');
        }

    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed',
        ]);
        auth()->user()->update(['password' => bcrypt($data['password'])]);

        Auth::logoutOtherDevices($data['password']);

        return redirect(route('admin.home'))->with('message', 'Your password is changed successfully');
    }


    public function stats()
    {
        $categories = CardCategory::with('cards.orders')->get();

        $data = [];

        foreach($categories as $order){
            $cards = $order->cards;
            $ord = 0;
            foreach($cards as $card){
                $ord += $card->orders()->where('status','completed')->count();
            }
            $data[] = ['name' => $order->name,'count' => $ord];
        }



        return view('multiauth::stats.index',compact('data'));



    }



}
