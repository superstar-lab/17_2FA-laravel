<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $blogs = Blog::orderByDesc('updated_at')->where('online', true)->paginate(3);
    return view('welcome',compact('blogs'));
})->name('welcome');



//Route::get('wallet',function(){
//    return '<h1 style="text-align:center">Bitcoin transactions coming soon , currently under maintenance</h1>';
//})->name('wallet.index');


 Route::view('wallet/2fa','auth.2fa')->name('wallet.2fa');
 Route::post('wallet/2fa','twoFaController@check');
 Route::post('wallet/2fa/new','twoFaController@new')->name('wallet.2fa.new');
 Route::get('wallet','WalletController@index')->middleware('verified')->name('wallet.index');
 Route::get('wallet/send','WalletController@sent')->middleware('verified','twoFa')->name('wallet.send');
 Route::post('wallet/send','WalletController@sentNow')->middleware('verified')->name('wallet.send.now');
 Route::get('wallet/sell','WalletController@sell')->middleware('verified')->name('wallet.sell');
 Route::post('wallet/sell','WalletController@sellNow')->middleware('verified')->name('wallet.sell.now');

Route::view('about-us','about-us')->name('about-us');
Route::view('ghana','ghana')->name('ghana');
Route::view('privacy','privacy')->name('privacy');
Route::view('rate-calculator','rate-calculator')->name('rate-calculator');
Route::view('how-to-trade','how-to-trade')->name('how-to-trade');
Route::get('blogs','HomepageController@blogs')->name('all.blogs');
Route::get('blogs/{param}/', 'HomepageController@blogshow')->name('single.blog');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/balance', 'AccountController@balance')->name('balance')->middleware('verified');
Route::get('/sell-category', 'AccountController@sellIndex')->name('sell.index')->middleware('verified');
Route::get('/sell', 'AccountController@sell')->name('sell')->middleware('verified');
Route::get('/sell/bitcoin', 'AccountController@sellBitcoin')->middleware('verified')->name('sell.bitcoin');
Route::get('/sell/usdt', 'AccountController@sellUsdt')->middleware('verified')->name('sell.usdt');
Route::post('/sell', 'AccountController@sellNow')->middleware('verified','throttle:2')->name('sell.now');

Route::get('/withdraw', 'AccountController@withdraw')->middleware('verified')->name('withdraw');
Route::post('/withdraw', 'AccountController@withdrawNow')->middleware('verified','throttle:2')->name('withdraw.now');
Route::get('/orders', 'AccountController@orders')->middleware('verified')->name('orders');
Route::get('/bank', 'AccountController@bank')->middleware('verified')->name('bank');
Route::post('/bank', 'AccountController@bankUpdate')->middleware('verified','throttle:2')->name('bank.update');
Route::get('/card-rate', 'AccountController@allCard')->middleware('verified')->name('card.rate');
Route::GET('/password/change', 'AccountController@showChangePasswordForm')->middleware('verified')->name('password.change');
Route::POST('/password/change', 'AccountController@changePassword');
Route::GET('/orders/{id}','AccountController@show')->middleware('verified')->name('orders.show');
Route::get('/withdraws', 'AccountController@withdraws')->middleware('verified')->name('withdraws');
Route::GET('/withdraws/{id}','AccountController@showWithdraw')->middleware('verified')->name('withdraws.show');

Route::get('/recharges', 'RechargeController@index')->middleware('verified')->name('recharge.index');
Route::GET('/recharges/{id}','RechargeController@show')->middleware('verified')->name('recharge.show');
Route::post('/recharges', 'RechargeController@store')->middleware('verified','throttle:2')->name('recharge.store');


Route::get('/buy-gift-card', 'GiftcardController@index')->middleware('verified')->name('giftcard.index');
Route::GET('/buy-gift-card/{id}','GiftcardController@show')->middleware('verified')->name('giftcard.show');
Route::post('/buy-gift-card', 'GiftcardController@store')->middleware('verified','throttle:2')->name('giftcard.store');


Route::get('/chat', 'ChatController@index')->middleware('verified')->name('chat.index');
Route::get('/messages', 'ChatController@fetchMessages');
Route::post('/messages', 'ChatController@sendMessage');


Route::get('admin/blogs/create', 'BlogController@create')->name('blogs.create')->middleware('role:seo');
Route::post('admin/blogs', 'BlogController@store')->name('blogs.store')->middleware('role:seo');
Route::get('admin/blogs', 'BlogController@index')->name('blogs.index')->middleware('role:seo');
Route::get('admin/blogs/{param}', 'BlogController@show')->name('blogs.show')->middleware('role:seo');
Route::get('admin/blogs/edit/{param}', 'BlogController@edit')->name('blogs.edit')->middleware('role:seo');
Route::patch('admin/blogs/{param}','BlogController@update')->name('blogs.update')->middleware('role:seo');
Route::DELETE('admin/blogs/{param}','BlogController@destroy')->name('blogs.destroy')->middleware('role:seo');
Route::get('admin/about', 'AboutController@index')->name('about.index')->middleware('role:seo');
Route::get('admin/about-edit', 'AboutController@edit')->name('about.edit')->middleware('role:seo');
Route::post('admin/about', 'AboutController@store')->name('about.update')->middleware('role:seo');
Route::get('admin/terms', 'TermsController@index')->name('terms.index')->middleware('role:seo');
Route::get('admin/terms-edit', 'TermsController@edit')->name('terms.edit')->middleware('role:seo');
Route::post('admin/terms', 'TermsController@store')->name('terms.update')->middleware('role:seo');


Route::get('admin/trade', 'TradeController@index')->name('trade.index')->middleware('role:seo');
Route::get('admin/trade-edit', 'TradeController@edit')->name('trade.edit')->middleware('role:seo');
Route::post('admin/trade', 'TradeController@store')->name('trade.update')->middleware('role:seo');


Route::get('admin/settings', 'SettingController@index')->name('admin.settings')->middleware('role:seo');
Route::post('admin/settings', 'SettingController@update')->name('admin.settings.update')->middleware('role:seo');


