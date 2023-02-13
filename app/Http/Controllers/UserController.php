<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Bitfumes\Multiauth\Http\Middleware\redirectIfAuthenticatedAdmin;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\BlockIo\BlockIo;

class UserController extends Controller
{
    use AuthorizesRequests;

    protected $block_io;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->adminModel = config('multiauth.models.admin');

        $apiKey = config('services.blockio.key');
        $verson = 2;
        $pin = config('services.blockio.pin');

        $this->block_io = new BlockIo($apiKey, $pin, $verson);
    }

    public function index()
    {
            // $balance = $this->block_io->get_balance();

            // dd($balance);
            // $balance = $balance->data->available_balance;

            $balance = 0;
            
            $dataCacheKey = "userData";
            

           if(request()->sort=== 'today'){
                $users = User::where('created_at','>=', today())->cursor();
            }else if(request()->valuable=== 'true') {
                $users = User::where('balance','>', 0)->cursor();
            }else {
                // if(Cache::has($dataCacheKey))
                // {
                //   $users =  Cache::get($dataCacheKey);
                // }
                // else
                // {
                  $users = User::all();
                //   Cache::put($dataCacheKey,$users,750);
                    
                // }
            }
            // if(request()->sort=== 'today'){
            //     $users = User::where('created_at','>=', today())->get();
            // }else if(request()->valuable=== 'true') {
            //     $users = User::where('balance','>', 0)->get();
            // }else {
            //     $users = User::all();
            // }
            
            //  if(request()->sort=== 'today'){
            //     $users = User::where('created_at','>=', today())->orderBy('id','DESC')->paginate(15);
            // }else if(request()->valuable=== 'true') {
            //     $users = User::where('balance','>', 0)->orderBy('id','DESC')->paginate(15);
            // }else {
            //     $users = User::orderBy('id','DESC')->paginate(15);
            // }

        return view('vendor.multiauth.users.index',compact('users','balance'));
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
        $user = User::where('id',$id)->first();



        if($user->wallet){
            $balance = $this->block_io->get_address_balance(['addresses' => $user->wallet->btc_address]);
            $btc_balance = $balance->data->balances[0]->available_balance ?? 'Block IO Error';
        }else{
            $btc_balance = "No Wallet";
        }


        return view('vendor.multiauth.users.show',compact('user','btc_balance'));
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
        $user = User::where('id',$id)->first();
        $data = $request->validate([
            'balance' => 'required'
        ]);

        $user->update($data);



        return back()
            ->with('success','User updated successfully');
    }

    public function ban(Request $request,$id){
        $user = User::where('id',$id)->first();

        if ($user->banned_until && now()->lessThan($user->banned_until)) {
            $banned_days = now()->lessThan($user->banned_until);
            $user->banned_until = null;
            $user->save();
            return back()
            ->with('success','User Unbanned Successfully');
        }

        $date = Carbon::now()->add(5,'year');

        $user->banned_until = $date;
        $user->save();
        return back()
            ->with('success','User Banned Successfully!');

    }

    public function exportCsv(Request $request)
    {
       $fileName = 'users.csv';
       $users = User::all();

            $headers = array(
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$fileName",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            );

            $columns = array('Name', 'Email', 'Phone');

            $callback = function() use($users, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns);

                foreach ($users as $user) {
                    $row['Name']  = $user->name;
                    $row['Email']    = $user->email;
                    $row['Phone']    = $user->phone;

                    fputcsv($file, array($row['Name'], $row['Email'], $row['Phone']));
                }

                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
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

    public function chat(User $user)
    {
        return view('vendor.multiauth.chat.index',compact('user'));
    }

}
