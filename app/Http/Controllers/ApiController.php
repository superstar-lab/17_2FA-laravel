<?php

namespace App\Http\Controllers;

use App\ANotification;
use App\Bitcoin;
use App\Mail\AdminGiftcardMail;
use App\Mail\AdminMail;
use App\Mail\AdminRechargeMail;
use App\Mail\OrderMail;
use App\Mail\WithdrawMail;
use App\Models\Card;
use App\Models\Cardorder;
use App\Models\Giftcard;
use App\Models\Order;
use App\Models\OrderImage;
use App\Models\Withdraw;
use App\Operator;
use App\Recharge;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\CardCategory;



class ApiController extends Controller
{

    public function __construct(){
        if(!auth('api')->user()){
                return response()->json(array_merge(['status' => 403],['data' => 'Authorization Failed']),400);
        }
    }

    public function card(){
        $cards = Card::where('status',1)->get();
        return response()->json(array_merge(['status' => 200],['data' => $cards]),200);
    }

    public function bitcoin()
    {
        $bitcoin = Bitcoin::where('id','1')->first();

        return response()->json(array_merge(['status' => 200],['data' => $bitcoin]),200);
    }

    public function sellIndex()
    {
        $categories = CardCategory::all();
        return response()->json(array_merge(['status' => 200],['data' => $categories]),200);
    }

    public function sellCards(){
        $category_slug = request()->category ?? 1;
        $category = CardCategory::where('slug',$category_slug)->firstOrFail();
        $cards = $category->cards()->where('status',1)->get();
        return response()->json(array_merge(['status' => 200],['data' => $cards]),200);
    }

    public function sell(Request $request){




        if($request->has('btc_amount')){
            $type = 'Bitcoin';
            $btc_amount = $request['btc_amount'];
        }else{
            $type = 'Card';
            $btc_amount = '';
        }
        if(! $request->has('btc_amount')) {

            $data = Validator::make($request->all(),
                [
                    'card' => 'required',
                    'total_amount' => 'required',
                    'sell_amount' => '',
                    'note' => '',
                ]);
        }else{


            $data = Validator::make($request->all(),
                [
                    'btc_amount' => 'required',
                    'total_amount' => 'required',
                    'sell_amount' => '',
                    'note' => '',
                ]);
        }

        if ($data->fails()) {
            return response()->json(array_merge(['status'=> 500],['data'=>$data->errors()]), 500);
        }

        $images=array();




        if($files=$request->images){

            foreach($files as $image) {

                $name = md5(microtime()).'.png';

                if (preg_match('/^data:image\/(\w+);base64,/', $image)) {
                    $data = substr($image, strpos($image, ',') + 1);

                    $data = base64_decode($data);
                    Storage::disk('local')->put('image/'.$name, $data);
                    $images[] = $name;
                }else{
                       return response()->json(array_merge(['status'=> 400],['message'=>'Only jpg and png file accepted']), 200);
                 }
            }
            // foreach($files as $file){
            //     $random_string =

            //     if($file->getClientOriginalExtension() === 'jpg' || $file->getClientOriginalExtension() === 'png' || $file->getClientOriginalExtension() === 'jpeg' || $file->getClientOriginalExtension() === 'JPG' || $file->getClientOriginalExtension() === 'JPEG' || $file->getClientOriginalExtension() === 'PNG') {
            //         $name = $random_string . '.' . $file->getClientOriginalExtension();
            //         $file->storeAs(
            //             'image', $name
            //         );

            //     }else{
            //         return response()->json(array_merge(['status'=> 500],['message'=>'Only jpg and png file accepted']), 500);
            //     }
            // }
        }else{
            return response()->json(array_merge(['status'=> 400],['message'=>'Invalid request. Use images[0],images[1] .... format']), 400);
        }

        $card = '';

        if ($type == 'Card'){

            try{
                $card = Card::where('id',$request->card)->first();
                $rate = $card->rate;
                $method = $card->name;
            }catch(\Exception $e){
                return response()->json(array_merge(['status'=> 400],['message'=>'Card not found. Please send the correct card id. You sent-'.$request->card]), 200);
            }

        }
        else{
            $rate = $bitcoin = Bitcoin::where('id',1)->first()->rate;
            $method = 'BTC - '.$btc_amount;
        }


        $sell_amount = $rate * $request->total_amount;

        $id = IdGenerator::generate(['table' => 'orders', 'length' => 10, 'prefix' =>'TXN', 'field' => 'txn_id']);



        $order = Order::create([
            'user_id' => auth('api')->user()->id,
            'card_id' => $request->card ?? 0,
            'total_amount' => $request->total_amount,
            'note' => $request->note ?? '',
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

            Mail::to($order->user->email)->send(new OrderMail($order));
            Mail::to('coinwoidx@gmail.com')->send(new AdminMail($order));
            Mail::to('abdulhafizkadiri@gmail.com')->send(new AdminMail($order));

        return response()->json(array_merge(['status' => 200],['data' => $order]),200);

    }

    public function orders(){
            $orders = auth('api')->user()->orders()->orderBy('id','DESC')->get();
            if(count($orders->toArray()) == 0 ){
                 return response()->json(array_merge(['status' => 400],['data' => $orders]),200);
            }
            return response()->json(array_merge(['status' => 200],['data' => $orders]),200);

    }
    public function withdraws(){
        
        $withdrawsCancelled = auth('api')->user()->withdraws()->where('status','Cancelled')->orderBy('id','DESC')->get();
        $withdrawsPending = auth('api')->user()->withdraws()->where('status','Pending')->orderBy('id','DESC')->get();
        $withdrawsCompleted = auth('api')->user()->withdraws()->where('status','Completed')->orderBy('id','DESC')->get();
        // if(!withdraws){
        //     return response()->json(array_merge(['status' => 400],['data' => "Bad Bearer Token"]),400);
        // }
        return response()->json(array_merge(['status' => 200],['cancelled' => $withdrawsCancelled,'pending'=>$withdrawsPending,'completed'=>$withdrawsCompleted]),200);
    }

    public function bank()
    {
        $bank = auth('api')->user()->bank;
        return response()->json(array_merge(['status' => 200],['data' => $bank]),200);
    }

    public function bankUpdate(Request $request)
    {
        $bank = auth('api')->user()->bank;

        $bank->update($request->all());

        return response()->json(array_merge(['status' => 200],['data' => $bank]),200);

    }

    public function allCard(){
        $cards = \App\Models\Card::all();
        return response()->json(array_merge(['status' => 200],['data' => $cards]),200);
    }

    public function showOrder($id)
    {
        $order = Order::where('id',$id)->first();

        if($order->user->id != auth('api')->user()->id){
            return response()->json(array_merge(['status' => 403],['data' => 'Authorization failed']),403);
        }

        return response()->json(array_merge(['status' => 200],['data' => $order]),200);
    }
    
    
//code added by satyendra   

 public function showTradeDetailsById($id)
    {
        $order = Order::where('id',$id)->first();

        // if($order->user->id != auth('api')->user()->id){
        //     return response()->json(array_merge(['status' => 403],['data' => 'Authorization failed']),403);
        // }

        return response()->json(array_merge(['status' => 200],['data' => $order]),200);
    }

 public function bankUpdateWithPassword(Request $request)
    {
        $user = auth('api')->user();
        if(!$user){
           return response()->json(array_merge(['status' => 400],['data' => 'Missing Token', 'message' => 'Missing Token']),400);
        }   
        
    //   if(Hash::make($request->password)!== $user->password){
    //         return response()->json(array_merge(['status' => 400],['data' => 'Password not matched', 'message' => 'Password Didnt Matched']),400);
    //     }
        
        $bank = auth('api')->user()->bank;
        $bank->update($request->all());
        return response()->json(array_merge(['status' => 200],['data' => $bank]),200);

    }

   public function  showTradeHistory($id){
       $orders = Order::where('user_id',$id)->get();
      for($i=0;$i<count($orders);$i++){
          $data = [];
          $data[$i] = Card::where('id',$orders[$i]->card_id)->get();
       
        //   $orders[$i]->product_name = $data[$i]->name;
        }

       return response()->json(array_merge(['status' => 200],['data' => $orders]),200);
      }
      
public function withdrawNowWithPassword(Request $request)
     {
       if($request->amount > 0){
          
        $user=auth('api')->user();
        
        if(!$user){
        return response()->json(array_merge(['status' => 400],['data' => 'Missing Token', 'message' => 'Missing Token']),400);

        }    
        if(!$user->bank->bank_name){
            return response()->json(array_merge(['status' => 400],['data' => 'kindly go back to fill your bank account details', 'message' => 'kindly go back to fill your bank account details']),200);
        }
        
        //   if(Hash::make($request->password)!=$user->password){
        // return response()->json(array_merge(['status' => 400],['data' => 'Password not matched', 'message' => 'Password Didnt Matched']),400);
        // }

        $withdraw = Withdraw::create([
            'user_id' =>$user->id,
            'trx_id' => IdGenerator::generate(['table' => 'withdraws', 'length' => 12, 'prefix' =>'TRXN', 'field' => 'trx_id']),
            'amount' => $request->amount ?? 0,
            'bank_name' => $user->bank->bank_name,
            'account_name'=> $user->bank->account_name,
            'account_no' => $user->bank->account_no,
            'notes' => $request->notes ?? '',
            'phone' => $user->phone,
            'status' => 'Pending',

        ]);
        if($withdraw->amount <= $withdraw->user->balance) {
            $withdraw->user->update([
                'balance' => ($withdraw->user->balance) - ($withdraw->amount)
            ]);
        }else{
            $withdraw->delete();
            return response()->json(array_merge(['status' => 200],['data' => 'Insufficient Balance']),200);
        }
            Mail::to($withdraw->user->email)->send(new WithdrawMail($withdraw));
            Mail::to('coinwoidx@gmail.com')->send(new AdminMail($withdraw));
            Mail::to('abdulhafizkadiri@gmail.com')->send(new AdminMail($withdraw));
        // return response()->json(array_merge(['status' => 200],['data' => $withdraw]),200);
                return response()->json(array_merge(['status' => 200],['data' => "SuccessFull Withdrawl"]),200);


        }else
        {
            return response()->json(array_merge(['status' => 400],['data' => "Withdrawal must be positive number", "message" => "Withdrawal must be positive number"]),200);
        }
}
    
    //code added by satyendra 

    
    public function showWithdraw($id)
    {

        $withdraw = Withdraw::where('id',$id)->first();

        if($withdraw->user->id != auth('api')->user()->id){
            return response()->json(array_merge(['status' => 403],['data' => 'Authorization failed']),403);
        }
        return response()->json(array_merge(['status' => 200],['data' => $withdraw]),200);
    }

    public function withdrawNow(Request $request)
    {
        
        if($request->amount > 0){
            $user=auth('api')->user();

        if(!$user->bank->bank_name){
            return response()->json(array_merge(['status' => 400],['data' => 'kindly go back to fill your bank account details', 'message' => 'kindly go back to fill your bank account details']),200);
        }



        $withdraw = Withdraw::create([
            'user_id' =>$user->id,
            'trx_id' => IdGenerator::generate(['table' => 'withdraws', 'length' => 12, 'prefix' =>'TRXN', 'field' => 'trx_id']),
            'amount' => $request->amount ?? 0,
            'bank_name' => $user->bank->bank_name,
            'account_name'=> $user->bank->account_name,
            'account_no' => $user->bank->account_no,
            'notes' => $request->notes ?? '',
            'phone' => $user->phone,
            'status' => 'Pending',

        ]);
        if($withdraw->amount <= $withdraw->user->balance) {
            $withdraw->user->update([
                'balance' => ($withdraw->user->balance) - ($withdraw->amount)
            ]);
        }else{
            $withdraw->delete();
            return response()->json(array_merge(['status' => 400],['data' => 'Insufficient Balance']),400);
        }


            Mail::to($withdraw->user->email)->send(new WithdrawMail($withdraw));
            Mail::to('coinwoidx@gmail.com')->send(new AdminMail($withdraw));
            Mail::to('abdulhafizkadiri@gmail.com')->send(new AdminMail($withdraw));


        return response()->json(array_merge(['status' => 200],['data' => $withdraw]),200);
        }else{
            return response()->json(array_merge(['status' => 400],['data' => "Withdrawal must be positive number", "message" => "Withdrawal must be positive number"]),200);
        }

        
    }
    
    
    public function buyCard()
    {
        $giftcards = Giftcard::where('status',1)->get();
        return response()->json(array_merge(['status' => 200],['data' => $giftcards]),200);
    }

    public function buyCardNow(Request $request)
    {
        $request->validate([
            'giftcard_id'    => 'required',
            'email'          => 'required',
            'amount_base'   => 'required',
            'amount_usd'     => 'required',
            'amount_btc'     => 'required',
        ]);

        $user = auth('api')->user();

        $id = IdGenerator::generate(['table' => 'cardorders', 'length' => 12, 'prefix' =>'ORD-', 'field' => 'txid']);

        $recharge = Cardorder::create([
            'giftcard_id'    => $request->giftcard_id,
            'email'          => $request->email,
            'amount_base'   => $request->amount_base,
            'amount_usd'     => $request->amount_usd,
            'amount_btc'     => $request->amount_btc,
            'user_id'        => $user->id,
            'status'         => 'Pending',
            'comment'        => '',
            'txid'           => $id,
            'note'           => $request->note ?? ''
        ]);

        Mail::to('coinwoidx@gmail.com')->send(new AdminGiftcardMail($recharge));


        return response()->json(array_merge(['status' => 200],['data' => $recharge]),200);
    }

    public function showGiftcard($id)
    {
        $cardorder = Cardorder::with('giftcard')->where('id',$id)->first();
        return response()->json(array_merge(['status' => 200],['data' => $cardorder]),200);
    }

    public function allBuyCard()
    {
        $cardorders = auth('api')->user()->cardorders()->orderBy('id', 'desc')  -> get();
        return response()->json(array_merge(['status' => 200],['data' => $cardorders]),200);
    }

    public function operators()
    {
        $operators = Operator::where('status',1)->get();
        return response()->json(array_merge(['status' => 200],['data' => $operators]),200);
    }

    public function findOperators($id)
    {
        $operator = Operator::find($id);
        return response()->json(array_merge(['status' => 200],['data' => $operator]),200);
    }



    public function rechargeNow(Request $request)
    {
        $request->validate([
            'operator_id'    => 'required',
            'phone'          => 'required',
            'amount_naira'   => 'required',
            'amount_usd'     => 'required',
            'amount_btc'     => 'required',
        ]);

        $user = auth('api')->user();
        $id = IdGenerator::generate(['table' => 'recharges', 'length' => 12, 'prefix' =>'TXR', 'field' => 'txid']);

        $recharge = Recharge::create([
            'operator_id'    => $request->operator_id,
            'phone'          => $request->phone,
            'amount_naira'   => $request->amount_naira,
            'amount_usd'     => $request->amount_usd,
            'amount_btc'     => $request->amount_btc,
            'user_id'        => $user->id,
            'status'         => 'Pending',
            'comment'        => '',
            'txid'           => $id,
            'note'           => $request->note ?? ''
        ]);

        Mail::to('coinwoidx@gmail.com')->send(new AdminRechargeMail($recharge));

        return response()->json(array_merge(['status' => 200],['data' => $recharge]),200);
    }

    public function showRecharge($id)
    {
        $recharge = Recharge::with('operator')->where('id',$id)->first();
        return response()->json(array_merge(['status' => 200],['data' => $recharge]),200);
    }

    public function allRecharges()
    {
        $recharges = auth('api')->user()->recharges()->orderBy('id', 'desc')  -> get();
        return response()->json(array_merge(['status' => 200],['data' => $recharges]),200);
    }

    public function notifications()
    {
        $notifications = ANotification::select('id','announcement as notification')->get();
        return response()->json(array_merge(['status' => 200],['data' => $notifications]),200);
    }




}
