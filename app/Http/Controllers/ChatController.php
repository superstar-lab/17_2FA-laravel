<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Mail\AdminMessageReceived;
use App\Mail\MessageReceived;
use App\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{

    public function index()
    {
        return view('chat.index');
    }


    public function fetchMessages()
    {

        if(auth()->check()) {
            $user = auth()->user();
            $messages = Message::where('user_id',$user->id)->with('user')->get();
            foreach($messages as $msg){
                if(!$msg->isAdmin){
                    $msg->isAdmin = null;
                }
            }
            
            return $messages;
        }

        if(auth('admin')->check()){
            $user = User::where('id',request()->user)->first();
            $user->update(['isUnread'=> 0]);
            $messages =  Message::where('user_id',$user->id)->with('user')->get();
            
            foreach($messages as $msg){
                if(!$msg->isAdmin){
                    $msg->isAdmin = null;
                }
            }
            
            return $messages;
            
        }


    }


    public function sendMessage(Request $request)
    {


        if(auth()->check()) {
            $user = auth()->user();
            if($request->has('file')){

                $request->validate([
                    'file' => 'image'
                ]);

                $filename = request('file')->store('image');
                $message=Message::create([
                    'user_id' => $user->id,
                    'image' => $filename
                ]);
            }else{

                $message = $user->messages()->create([
                    'message' => $request->input('message')
                ]);
            }
            
            auth()->user()->update(['isUnread'=>1]);

            broadcast(new MessageSent($user,$message->load('user')))->toOthers();
            Mail::to('coinwoidx@gmail.com')->send(new AdminMessageReceived($user));
            Mail::to('abdulhafizkadiri@gmail.com')->send(new AdminMessageReceived($user));
            return response(['status'=>'Message sent successfully','message'=>$message]);

        }
        if(auth('admin')->check()){

            $user = User::where('id',$request->user)->first();
            if(request()->user){
                if(request()->has('file')){
                    $request->validate([
                        'file' => 'image'
                    ]);
                    $filename = request('file')->store('image');
                    $message=Message::create([
                        'user_id' => request()->user,
                        'image' => $filename,
                        'isAdmin' => true
                    ]);
                }else{
                    $message = Message::create([
                        'message' => $request->input('message'),
                        'isAdmin' => true,
                        'user_id' => $user->id
                    ]);
                }
                broadcast(new MessageSent($user,$message->load('user')))->toOthers();
                Mail::to($user)->send(new MessageReceived($user));
                return response(['status'=>'Message sent successfully','message'=>$message]);
            }
        }

    }
}
