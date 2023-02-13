<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
Route::post('get_network_fee','WalletController@get_network_fee');
Route::get('stats', 'StatsController@statsAPI');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('change-password','AuthController@changePassword');
});

Route::group([
    'middleware' => 'api',
],function ($router) {

    // Normal Actions




//    Route::post('card', 'ApiController@card');
    Route::post('bitcoin', 'ApiController@bitcoin');
    Route::post('trade', 'ApiController@sell');
    Route::post('orders', 'ApiController@orders');
    Route::post('orders/show/{id}', 'ApiController@showOrder');
     Route::post('wallet/transactions/sentandrecieved', 'WalletApiController@sentAndRecieved');
    // code added by satyendra 
    Route::post('update-profile', 'AuthController@updateProfile');
    Route::post('trade-details/{id}', 'ApiController@showTradeDetailsById');
    Route::post('trade-history/{id}', 'ApiController@showTradeHistory');
    Route::post('withdraws/createwithpassword', 'ApiController@withdrawNowWithPassword');
    Route::post('bank/updatewithpassword', 'ApiController@bankUpdateWithPassword');


   //
    Route::post('withdraws', 'ApiController@withdraws');
    Route::post('withdraws/create', 'ApiController@withdrawNow');
    Route::post('withdraws/show/{id}', 'ApiController@showWithdraw');
    Route::post('bank', 'ApiController@bank');
    Route::post('bank/update', 'ApiController@bankUpdate');
    Route::post('sell-cards', 'ApiController@allCard');
    Route::post('card/category','ApiController@sellIndex');
    Route::post('card/category/show','ApiController@sellCards');
    Route::post('buy-cards', 'ApiController@card');
    Route::post('buy-cards/orders/create', 'ApiController@buyCardNow');
    Route::post('buy-cards/orders/show/{id}', 'ApiController@showGiftcard');
    Route::post('buy-cards/orders', 'ApiController@allBuyCard');
    Route::post('recharges/operators', 'ApiController@operators');
    Route::post('recharges/operators/{id}', 'ApiController@findOperators');
    Route::post('recharges/orders/create', 'ApiController@rechargeNow');
    Route::post('recharges/orders/show/{id}', 'ApiController@showRecharge');
    Route::post('recharges/orders', 'ApiController@allRecharges');
    Route::post('notifications', 'ApiController@notifications');



    // Bitcoin Wallet

    Route::post('wallet/btc-address', 'WalletApiController@btc_address');
    Route::post('wallet/check-balance', 'WalletApiController@checkBalance');
    Route::post('wallet/transactions/sent', 'WalletApiController@sent');
    Route::post('wallet/transactions/received', 'WalletApiController@received');
     Route::post('wallet/transactions/sells', 'WalletApiController@sells');
     Route::post('wallet/sent', 'WalletApiController@sentNow');
     Route::post('wallet/sell', 'WalletApiController@sellNow');
    Route::post('wallet/sent_network_fee', 'WalletApiController@get_network_fee');





});

Route::fallback(function(){
    return response()->json([
        'status' => 'error',
        'message' => 'Page Not Found. If error persists, contact info@gcbuying.com'], 404);
});
