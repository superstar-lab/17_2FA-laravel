<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\BlockIo\BlockIo;


class AuthController extends Controller
{
    protected $block_io;

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','register']]);
        
         $apiKey = config('services.blockio.key');
        $verson = 2;
        $pin = config('services.blockio.pin');

        $this->block_io = new BlockIo($apiKey, $pin, $verson);
        
        
    }
    

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);
        

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['status' => 400, 'message' => 'invalid credential'], 400);
        }
        
        if(request()->has('app_token')){
            $user = auth('api')->user()->update([
                'app_token' => request()->app_token
            ]);
        }

        return $this->respondWithToken($token);
    }
    
    public function register(Request $request)
    {
        
        
        $data = Validator::make($request->all(),
                [
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'string', 'min:8'],
                    'phone' => ['required', 'unique:users'],
                ]);
                
                
                if ($data->fails()) {
                    return response()->json(array_merge(['status'=> 400],['data'=>$data->errors()]), 400);
                }
                        
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'balance' => 0
        ]);

        \App\Models\Bank::create([
            'user_id' => $user->id
            ]);
          
         $address = $this->block_io->get_new_address();
            
          \App\Models\Wallet::create(['btc_address' => $address->data->address,'user_id' => 
$user->id]);


              

        return response()->json(array_merge(['status'=> 200],['data'=> $user]), 200);
       
    }
    
    public function changePassword(Request $request)
    {
        // $data = Validator::make($request->all(),
        //         [
        //             'new_password' => ['required', 'string', 'min:4'],
        //             'old_password' => ['required', 'string', 'min:4'],
                    
        //         ]);
                
                
                // if ($data->fails()) {
                //     return response()->json(array_merge(['status'=> 400],['data'=>$data->errors()]), 400);
                // }
    
                $user = auth('api')->user();
                
        
                if(Hash::check($request->old_password, $user->password)){
                    $user->update([
                        'password' => Hash::make($request['new_password'])
                        ]);
                        
                        return response()->json(array_merge(['status'=> 200],['message'=>'Password Updated Successfully']), 200);
                        
                        
                }else{
                    return response()->json(array_merge(['status'=> 400],['message'=>'Old Password does not match']), 400);
                }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['status'=> 200, 'data' =>  auth('api')->user()]);
    }
    
    
    /**
     * 
     * 
     * 
     * */
    public function updateProfile(Request $request)
    {
        auth('api')->user()->update([
                'name' => $request->first_name ." ". $request->last_name,
                'phone' => $request->phone
            ]);

        return response()->json(array_merge(['status' => 200],['data' =>auth('api')->user()]),200);

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['status'=> 200,'message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 200,
            'user' => auth('api')->user(),
            'data' => [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
            ]
        ]);
    }
}
