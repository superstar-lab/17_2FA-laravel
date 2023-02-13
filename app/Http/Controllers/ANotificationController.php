<?php

namespace App\Http\Controllers;

use App\ANotification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Models\User;

class ANotificationController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
        $this->adminModel = config('multiauth.models.admin');
    }


    public function index()
    {
        $announcements = ANotification::all();
        return view('vendor.multiauth.notification.index',compact('announcements'));
    }

    public function create()
    {
        return view('vendor.multiauth.notification.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'announcement' => 'required',
        ]);

        $notification = ANotification::create($request->all());
        
        $users = User::whereNotNull('app_token')->get();
        
        
        foreach($users as $user){
            try{
                
                //Start FCM iOS Code 
                    $json_data = array('to'=> $user->app_token, 'mutable_content' => true, 'content_available' => true, 'notification'=>array("title"=>"Gcbuying", "body" => $notification->announcement, "sound" => "default", "priority" => "high"), 'data'=>array("message"=>$notification->announcement, "title"=>"Gcbuying","priority" => "high"));
                    
                    $data = json_encode($json_data);
                    
                    //FCM API end-point
                    
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    
                    //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
                    
                    $server_key = 'AAAAyf1HKrw:APA91bEoWJBQffXyGtjJ_J_POf-DyqnzvFzUwgC19_GcFICTyKcsmyMqkOL6IZPki6Ev27yWWBFoB8s0B7vY3Kph4VCx938VQ4BZYtoGSLcw9gwFWI3TtdhDYiWJFMzkH2_n5MmD20cS';
                    
                    //header with content_type api key
                    
                    $headers = array(
                    
                    'Content-Type:application/json',
                    
                    'Authorization:key='.$server_key
                    
                    );
                    
                    
                    //CURL request to route notification to FCM connection server (provided by Google)
                    
                    $ch = curl_init();
                    
                    curl_setopt($ch, CURLOPT_URL, $url);
                    
                    curl_setopt($ch, CURLOPT_POST, true);
                    
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    
                    $result = curl_exec($ch);
                    
                    if ($result === FALSE) {
                    
                    die('Oops! FCM Send Error: ' . curl_error($ch));
                    
                    }
                    
                    curl_close($ch);

            }catch(\Exception $e){
                return $e->message;
            }
        }
        
        

        return redirect()->route('notification.index')
            ->with('success','Notification created successfully.');
    }


    public function show(ANotification $notification)
    {
        $announcement = $notification;
        return view('vendor.multiauth.notification.show',compact('announcement'));
    }


    public function edit(ANotification $notification)
    {
        $announcement = $notification;
        return view('vendor.multiauth.notification.edit',compact('announcement'));
    }


    public function update(Request $request, ANotification $notification)
    {
        $announcement = $notification;
        $request->validate([
            'announcement' => 'required',

        ]);

        $announcement->update($request->all());
        
        
        $users = User::whereNotNull('app_token')->get();
        
        
        foreach($users as $user){
            try{
                
                //Start FCM iOS Code 
                    $json_data = array('to'=> $user->app_token, 'mutable_content' => true, 'content_available' => true, 'notification'=>array("title"=>"Gcbuying", "body" => $announcement->announcement, "sound" => "default", "priority" => "high"), 'data'=>array("payload_variable_1"=>"", "payload_variable_2" =>""));
                    
                    $data = json_encode($json_data);
                    
                    //FCM API end-point
                    
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    
                    //api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
                    
                    $server_key = 'AAAAyf1HKrw:APA91bEoWJBQffXyGtjJ_J_POf-DyqnzvFzUwgC19_GcFICTyKcsmyMqkOL6IZPki6Ev27yWWBFoB8s0B7vY3Kph4VCx938VQ4BZYtoGSLcw9gwFWI3TtdhDYiWJFMzkH2_n5MmD20cS';
                    
                    //header with content_type api key
                    
                    $headers = array(
                    
                    'Content-Type:application/json',
                    
                    'Authorization:key='.$server_key
                    
                    );
                    
                    
                    //CURL request to route notification to FCM connection server (provided by Google)
                    
                    $ch = curl_init();
                    
                    curl_setopt($ch, CURLOPT_URL, $url);
                    
                    curl_setopt($ch, CURLOPT_POST, true);
                    
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                    
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    
                    $result = curl_exec($ch);
                    
                    if ($result === FALSE) {
                    
                    die('Oops! FCM Send Error: ' . curl_error($ch));
                    
                    }
                    
                    curl_close($ch);

            }catch(\Exception $e){
                return $e->message;
            }
        }
        
        

        return redirect()->route('notification.index')
            ->with('success','Notification updated successfully');
    }


    public function destroy(ANotification $notification)
    {
        $announcement = $notification;
        $announcement->delete();

        return redirect()->route('notification.index')
            ->with('success','Notification deleted successfully');
    }
}
