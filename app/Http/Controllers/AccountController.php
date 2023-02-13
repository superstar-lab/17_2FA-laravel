<?php

namespace App\Http\Controllers;

use App\Bitcoin;
use App\Blacklist;
use App\CardCategory;
use App\Mail\OrderMail;
use App\Mail\AdminMail;
use App\Mail\WithdrawMail;
use App\Models\Bank;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Mail;
use App\Models\Card;
use App\Models\Order;
use App\Models\OrderImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AccountController extends Controller
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

    public function balance(){
        $user = Auth::user();
        $balance = $user->balance;
        return view('balance',compact('balance'));
    }

    public function sellIndex(Request $request)
    {

        if($request->has('search') && $request->search){
            $categories = CardCategory::where('name','LIKE','%'.$request->search.'%')->orderBy('name','asc')->get();
        }else{
            $categories = CardCategory::orderBy('name','asc')->get();
        }


        return view('sell.index',compact('categories'));
    }

    public function sell(){
        $category_slug = request()->category ?? 1;
        $category = CardCategory::where('slug',$category_slug)->firstOrFail();
        $cards = $category->cards()->where('status',1)->get();
        return view('sell.card',compact('cards'));
    }
    public function sellBitcoin(){
        $bitcoin = Bitcoin::where('id','1')->first();
        return view('sell.bitcoin',compact('bitcoin'));
    }

    public function sellUsdt(){
        $bitcoin = Bitcoin::where('id','2')->first();
        return view('sell.usdt',compact('bitcoin'));
    }
    public function sellNow(Request $request){
        if($request->has('btc_amount')){
            $type = 'Bitcoin';
            $btc_amount = $request['btc_amount'];
        }else if($request->has('usdt_amount')){
            $type = 'USDT';
            $btc_amount = $request['usdt_amount'];
        }else{
            $type = 'Card';
            $btc_amount = '';
        }


        if($request->has('btc_amount')) {
            $data = $request->validate([
                'btc_amount' => 'required',
                'total_amount' => 'required',
                'sell_amount' => '',
                'images' => 'required',
                'note' => '',
            ]);
        }else if($request->has('usdt_amount')){
            $data = $request->validate([
                'usdt_amount' => 'required',
                'total_amount' => 'required',
                'sell_amount' => '',
                'images' => 'required',
                'note' => '',
            ]);
        }
        else{
            $data = $request->validate([
                'card' => 'required',
                'total_amount' => 'required',
                'sell_amount' => '',
                'images' => 'required',
                'note' => '',
            ]);
        }
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $random_string = md5(microtime());

                if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG') {
                    $name = $random_string . '.' . $file->getClientOriginalExtension();
                    $file->storeAs(
                        'image', $name
                    );
                    $images[] = $name;
                }else{
                    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
                        //ip from share internet
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                        //ip pass from proxy
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    }else{
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }

                    Blacklist::create([
                        'user_id' => auth()->user()->id,
                        'ip'      => $ip
                    ]);
                   Auth::logout();
                   return 'Only image Accepted';
                    // return error
                }
            }
        }
        $card = '';
        if ($type == 'Card'){
            $card = Card::where('id',$data['card'])->first();
            $rate = $card->rate;
            $method = $card->name;
        }
        else if($type == 'Bitcoin'){
            $rate = Bitcoin::where('id',1)->first()->rate;
            $method = 'BTC - '.$btc_amount;
        }
        else if($type == 'USDT'){
            $rate = Bitcoin::where('id',2)->first()->rate;
            $method = 'USDT - '.$btc_amount;
        }
        $sell_amount = $rate * $data['total_amount'];

        $id = IdGenerator::generate(['table' => 'orders', 'length' => 10, 'prefix' =>'TXN', 'field' => 'txn_id']);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'card_id' => $data['card'] ?? 0,
            'total_amount' => $data['total_amount'],
            'note' => 'N/A',
            'get_amount' => $sell_amount,
            'rate' => $rate,
            'method' => $method,
            'status' => 'Pending',
            'txn_id' => $id
        ]);

        foreach($images as $key => $image){

            OrderImage::create([
                'image' => $image,
                'order_id' => $order->id
            ]);
        }

        try {
            Mail::to($order->user->email)->send(new OrderMail($order));
            Mail::to('coinwoidx@gmail.com')->send(new AdminMail($order));
            Mail::to('abdulhafizkadiri@gmail.com')->send(new AdminMail($order));


        } catch (\Exception $e) {
            return back()->with('success','Trade Order Has been successully placed');
        }

        return back()->with('success','Trade Order Has been successully placed');

    }

    public function orders(){

        $orders = Auth::user()->orders()->orderBy('id','DESC')->paginate(5);
        return view('orders.index',compact('orders'));
    }
    public function withdraws(){

        $withdraws = Auth::user()->withdraws()->orderBy('id','DESC')->paginate(5);
        return view('withdraws.index',compact('withdraws'));
    }

    public function bank()
    {
        $bank = Auth::user()->bank;
//        dd($bank);
        return view('bank',compact('bank'));
    }
    public function bankUpdate(Request $request)
    {
        $bank = Auth::user()->bank;

        $status = $bank->update($request->except('_token'));

        if($status){
            return back()->with('success','Bank Account Updated Successfully !');
        }

        return view('bank',compact('bank'));
    }
    public function allCard(){
        $cards = \App\Models\Card::paginate(5);
        return view('card_rate',compact('cards'));
    }
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }
    public function changePassword(Request $request)
    {
        $data = $request->validate([
            'oldPassword'   => 'required',
            'password'      => 'required|confirmed',
        ]);
        auth()->user()->update(['password' => bcrypt($data['password'])]);
        Auth::logoutOtherDevices($data['password']);
        return redirect(route('home'))->with('message', 'Your password is changed successfully');
    }
    public function show($id)
    {
        $order = Order::where('id',$id)->first();
        return view('orders.show',compact('order'));
    }
    public function showWithdraw($id)
    {

        $withdraw = Withdraw::where('id',$id)->first();

        if($withdraw->user->id != Auth::user()->id){
           abort('404');
        }
        return view('withdraws.show',compact('withdraw'));
    }

    public function withdraw()
    {
        $balance = Auth::user()->balance;
        $bank = Bank::where('id',Auth::user()->id)->first();
        return view('withdraw',compact('balance','bank'));
    }
    public function withdrawNow(Request $request)
    {
        $data = $request->validate([
            'amount'=>'required',
        ]);

        $user=Auth::user();

        if(!$user->bank->bank_name){
            return back()->with('error','Please Add Your Bank Account first');
        }



        $withdraw = Withdraw::create([
            'user_id' =>$user->id,
            'trx_id' => IdGenerator::generate(['table' => 'withdraws', 'length' => 12, 'prefix' =>'TRXN', 'field' => 'trx_id']),
            'amount' => $data['amount'],
            'bank_name' => $user->bank->bank_name,
            'account_name'=> $user->bank->account_name,
            'account_no' => $user->bank->account_no,
            'notes' => 'N/A',
            'phone' => $user->phone,
            'status' => 'Pending',

        ]);
        if($withdraw->amount <= $withdraw->user->balance && $withdraw->amount > 0) {
            $withdraw->user->update([
                'balance' => ($withdraw->user->balance) - ($withdraw->amount)
            ]);
        }else{
            $withdraw->delete();
            return back()->with('error','Insufficient Balance');
        }

        try {
            Mail::to($withdraw->user->email)->send(new WithdrawMail($withdraw));
            Mail::to('coinwoidx@gmail.com')->send(new AdminMail($withdraw));
            Mail::to('abdulhafizkadiri@gmail.com')->send(new AdminMail($withdraw));
        } catch (\Exception $e) {
            return;
        }

        return back()->with('success','Withdraw Request Successfully Placed');
    }


}
