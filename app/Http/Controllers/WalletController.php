<?php

namespace App\Http\Controllers;
use App\Bitcoin;
use App\Btcsell;
use BlockIo\Client;
use BlockIo\APIException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WalletController extends Controller
{
    protected $block_io;


    public function __construct()
    {

        $apiKey = config('services.blockio.key');
        $verson = 2;
        $pin = config('services.blockio.pin');

        $this->block_io = new Client($apiKey, $pin, $verson);

    }

    protected function user_btc_address(){
        return Auth::user()->wallet->btc_address;
    }

    protected function balance(){

        $balance = $this->block_io->get_address_balance(['addresses' => $this->user_btc_address()]);

        if($balance->status == "success"){
            return $balance->data->balances[0];
        }else{
            abort(400,"Invalid Wallet");
        }

    }


    protected function transactions($type){
        $transactions = $this->block_io->get_transactions(array('type' => $type, 'addresses' => $this->user_btc_address()));

        if($transactions->status == "success"){
            return $transactions->data->txs;
        }else{
            abort(400,"Invalid Wallet");
        }

    }


    protected function withdraw($amount , $to_address){

        // Withdraw Old format (Deprecated)
        // return $this->block_io->withdraw_from_addresses(array('amounts' => $amount, 'from_addresses' => $this->user_btc_address(), 'to_addresses' => $to_address));

        // New format
        // 1. Prepare Transaction

        $prepare_tx =  $this->block_io->prepare_transaction(array('amounts' => $amount, 'from_addresses' => $this->user_btc_address(), 'to_addresses' => $to_address));

        // 2. Summerize Transaction
        // $summerize_tx =  $this->block_io->summarize_prepared_transaction($prepare_tx);

        // 3.  Create and SIgn Transaction
        $sign_tx =  $this->block_io->create_and_sign_transaction($prepare_tx);

        // 4.  Submit Signed Transaction
        $tx =  $this->block_io->submit_transaction(array('transaction_data' => $sign_tx));

        return $tx;

    }

    public function createBTC(){
            $address = $this->block_io->get_new_address(array('label' => Auth::user()->email));
            Auth::user()->wallet()->create(['btc_address' => $address->data->address]);
    }


    public function index(){
        if(Auth::user()->wallet === null){
            $this->createBTC();
            return redirect()->route('wallet.index');
        }

        try{
            $balance = $this->balance();
            $received = $this->transactions('received');
            $sent = $this->transactions('sent');
        }catch(\Exception $e){
            $message = "Wallet Not Found";
            return view("customerror.wallet", compact("message"));
        }

        $user = Auth::user();
        $user->update([
            'twofa' => 1
        ]);
        return view('wallet.index',compact('balance','received','sent'));
    }
    public function sent(){
        $balance = $this->balance();
        return view('wallet.sent',compact('balance'));
    }
    public function sell(){
        $sells = Btcsell::where('user_id',\auth()->user()->id)->get();
        $bitcoin = Bitcoin::where('id','1')->first();
        $balance = $this->balance();
        return view('wallet.sell',compact('balance','bitcoin','sells'));
    }

    public function sellNow(Request $request){
        $request->validate([
            'amount' => 'required'
        ]);
        $bitcoin = Bitcoin::where('id','1')->first();
        $response = Http::get('https://blockchain.info/ticker');
        $usd_rate = $response->json()['USD']['last'];

        $result = $this->withdraw($request->amount,$bitcoin->address);



        if($result->status == 'success'){
            $naira = $request->amount * $usd_rate * $bitcoin->rate;
            $user = Auth::user();
            $user->balance += $naira;
            $user->save();

            Btcsell::create([
                'txid' => Str::random(8),
               'user_id' => \auth()->user()->id,
               'amount_btc' => $request->amount,
                'amount_naira' => $naira,
                'status' => 'Success'
            ]);

            return back()->with('success','Transaction Successful!');
        }elseif ($result->status=='fail'){
            $message = "Transaction failed";
            return view("customerror.wallet", compact("message"));
        }


    }

    public function sentNow(Request $request){
        $request->validate([
            'address' => 'required',
            'amount' => 'required'
        ]);


        $result = $this->withdraw($request->amount,$request->address);

        if($result->status=='success'){
            return back()->with('success','Transaction Successful!');
        }elseif ($result->status=='fail'){
            $message = "Transaction failed";
            return view("customerror.wallet", compact("message"));
        }
    }




    public function get_network_fee(Request $request){
        
        try{
           $response = $this->block_io->get_network_fee_estimate(array('amounts' => (string) $request->amount, 'from_addresses' => $request->from_address, 'to_addresses' => $request->address));
            return response()->json($response); 
        }catch(APIException $e){
            return response()->json($e->getRawData()); 
        }
        
        
        

        
    }
}
