<?php

namespace App\Http\Controllers;

use App\Bitcoin;
use App\Btcsell;
use BlockIo\APIException;
use BlockIo\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class WalletApiController extends Controller
{
    protected $block_io;


    public function __construct()
    {

        $apiKey = config('services.blockio.key');
        $verson = 2;
        $pin = config('services.blockio.pin');

        $this->block_io = new Client($apiKey, $pin, $verson);

    }

    protected function withdraw($amount , $to_address){
//        return $this->block_io->withdraw_from_addresses(array('amounts' => $amount, 'from_addresses' => $this->user_btc_address(), 'to_addresses' => $to_address));



        $prepare_tx =  $this->block_io->prepare_transaction(array('amounts' => $amount, 'from_addresses' => $this->user_btc_address(), 'to_addresses' => $to_address));

        // 2. Summerize Transaction
        // $summerize_tx =  $this->block_io->summarize_prepared_transaction($prepare_tx);

        // 3.  Create and SIgn Transaction
        $sign_tx =  $this->block_io->create_and_sign_transaction($prepare_tx);

        // 4.  Submit Signed Transaction
        return $this->block_io->submit_transaction(['transaction_data' => $sign_tx]);


    }

    protected function user_btc_address(){
        return auth('api')->user()->wallet->btc_address;
    }

    protected function balance(){

        $balance = $this->block_io->get_address_balance(['addresses' => $this->user_btc_address()]);
        return $balance->data->balances[0];
    }

    public function checkBalance()
    {
        return response()->json($this->balance(),200);
    }

    public function btc_address()
    {
        
        return response()->json(['status' => 200, 'address' => $this->user_btc_address()],200);
    }


    public function sent(){
        $transactions = $this->block_io->get_transactions(array('type' => 'sent', 'addresses' => $this->user_btc_address()));
        return response()->json($transactions);
    }
    public function received(){
        $transactions = $this->block_io->get_transactions(array('type' => 'received', 'addresses' => $this->user_btc_address()));
        return response()->json($transactions);
    }
    
    //code added by satyendra 
    
    
    public function sentAndRecieved(){
        $sells = Btcsell::where('user_id',auth('api')->user()->id)->get();
        $senttransactions = $this->block_io->get_transactions(array('type' => 'sent', 'addresses' => $this->user_btc_address()));
        $recivedtransactions = $this->block_io->get_transactions(array('type' => 'received', 'addresses' => $this->user_btc_address()));
        // return response()->json(["recieved"=>$recivedtransactions->data->txs]);
        return response()->json(["status" => "200", "message" => "Data Fetched","sent"=>$senttransactions->data->txs,"recieved"=>$recivedtransactions->data->txs,"sold_via_gc" => $sells]);
    }
    
    //
    
    
    


    public function withdrawNow(Request $request)
    {
        $result = $this->withdraw($request->amount,$request->address);
        return response()->json(["status" => "200", "message" => "Transaction Successful"]);
    }

//    public function createBTC(){
//        $address = $this->block_io->get_new_address(array('label' => 'API-'.auth('api')->user()->email));
//        auth('api')->user()->wallet()->create(['btc_address' => $address->data->address]);
//    }

    public function sells(){
        $sells = Btcsell::where('user_id',auth('api')->user()->id)->get();
        return response()->json(array_merge(['status' => 'success'],['data' => $sells]),200);
    }

    public function sellNow(Request $request){
        $request->validate([
            'amount' => 'required'
        ]);
        $bitcoin = Bitcoin::where('id','1')->first();
        $response = Http::get('https://blockchain.info/ticker');
        $usd_rate = $response->json()['USD']['last'];

        $result = $this->withdraw((string) $request->amount,$bitcoin->address);

        if($result->status=='success'){
            $naira = $request->amount * $usd_rate * $bitcoin->rate;
            $user = auth('api')->user();
            $user->balance += $naira;
            $user->save();

            $sells = Btcsell::create([
                'txid' => Str::random(8),
                'user_id' => auth('api')->user()->id,
                'amount_btc' => $request->amount,
                'amount_naira' => $naira,
                'status' => 'Success'
            ]);

            return response()->json(array_merge(['status' => 'success'],['data' => $sells]),200);
        }elseif ($result->status=='fail'){
            return response()->json(array_merge(['status' => 'error'],['data' => 'Transaction Failed. Insufficient Balance']),200);
        }
    }

    public function sentNow(Request $request){
        $request->validate([
            'address' => 'required',
            'amount' => 'required'
        ]);

        try{
            $result = $this->withdraw((string) $request->amount,$request->address);
        }catch(APIException $e){
            return response()->json($e->getRawData());
        }


        return response()->json($result);
    }



    public function get_network_fee(Request $request){

        try{

            $response = $this->block_io->get_network_fee_estimate(array('amounts' => (string) $request->amount, 'from_addresses' => $this->user_btc_address(), 'to_addresses' => $request->address));
            return response()->json($response);
        }catch(APIException $e){
            return response()->json($e->getRawData());
        }



    }
}
