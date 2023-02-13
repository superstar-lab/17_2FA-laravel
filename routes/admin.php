<?php


    Route::GET('/emailview', '\App\Http\Controllers\MyAdminController@emailView')->name('emailview.index');
    Route::GET('/send-email', '\App\Http\Controllers\MyAdminController@sendEmail')->name('emailview.sendEmail');
    Route::POST('/handlemail', '\App\Http\Controllers\MyAdminController@handleEmailSend')->name('emailview.handleEmail');


    Route::GET('/home', '\App\Http\Controllers\MyAdminController@index')->name('admin.home');
    Route::GET('/users','\App\Http\Controllers\UserController@index')->name('admin.users.index')->middleware('role:moderator');
    Route::GET('/users/{id}','\App\Http\Controllers\UserController@show')->name('admin.users.show')->middleware('role:moderator');
    Route::PUT('/users/{id}','\App\Http\Controllers\UserController@update')->name('admin.users.update')->middleware('role:moderator');
    Route::POST('/users/{id}/ban','\App\Http\Controllers\UserController@ban')->name('admin.users.ban')->middleware('role:moderator');
    Route::get('/userlist', '\App\Http\Controllers\UserController@exportCsv')->middleware('role:moderator');

    Route::get('/users/{user}/chat','\App\Http\Controllers\UserController@chat')->name('admin.users.chat')->middleware('role:moderator');
    Route::resource('/cards', '\App\Http\Controllers\CardController')->middleware('role:moderator;admin2');
    Route::resource('/card-category', '\App\Http\Controllers\CardCategoriesController')->middleware('role:moderator;admin2');
    Route::post('/cards/toggle/{id}','\App\Http\Controllers\CardController@toggle')->name('cards.toggle')->middleware('role:moderator;admin2');
    Route::resource('/selling-cards', '\App\Http\Controllers\SellingCardController')->middleware('role:super;admin2');
    Route::post('/selling-cards/toggle/{id}','\App\Http\Controllers\SellingCardController@toggle')->name('selling-cards.toggle')->middleware('role:super;admin2');
    Route::resource('/operators', '\App\Http\Controllers\OperatorController')->middleware('role:super');
    Route::post('/operators/toggle/{id}','\App\Http\Controllers\OperatorController@toggle')->name('operators.toggle')->middleware('role:super');
    Route::resource('/announcement', '\App\Http\Controllers\AnnouncementController');
    Route::resource('/notification', '\App\Http\Controllers\ANotificationController');
    Route::resource('/faq', '\App\Http\Controllers\FaqController');
    Route::resource('/testimonial', '\App\Http\Controllers\TestimonialController');
    Route::GET('/orders/status/{slug}','\App\Http\Controllers\OrderController@index')->name('admin.orders.index')->middleware('role:moderator');
    Route::view('/btcsell','vendor.multiauth.btcsell.index')->name('admin.btcsell')->middleware('role:moderator');
    Route::get('/btcsell/{user_id}', function ($user_id){
        return view('vendor.multiauth.btcsell.index',compact('user_id'));
    })->name('admin.btcsell.user')->middleware('role:moderator');
    Route::GET('/orders/user/{id}','\App\Http\Controllers\OrderController@userIndex')->name('admin.orders.user')->middleware('role:moderator');
    Route::GET('/orders/{id}','\App\Http\Controllers\OrderController@show')->name('admin.orders.show')->middleware('role:moderator');
    Route::PUT('/orders/{id}','\App\Http\Controllers\OrderController@update')->name('admin.orders.update')->middleware('role:moderator');
    Route::GET('/cardorders/status/{slug}','\App\Http\Controllers\CardOrderController@index')->name('admin.cardorder.index')->middleware('role:super');
    Route::GET('/cardorders/user/{id}','\App\Http\Controllers\CardOrderController@userIndex')->name('admin.cardorder.user')->middleware('role:super');
    Route::GET('/cardorders/{id}','\App\Http\Controllers\CardOrderController@show')->name('admin.cardorder.show')->middleware('role:super');
    Route::PUT('/cardorders/{id}','\App\Http\Controllers\CardOrderController@update')->name('admin.cardorder.update')->middleware('role:super');

    Route::GET('/recharges/status/{slug}','\App\Http\Controllers\RechargeOrderController@index')->name('admin.rechargeorders.index')->middleware('role:super');
    Route::GET('/recharges/user/{id}','\App\Http\Controllers\RechargeOrderController@userIndex')->name('admin.rechargeorders.user')->middleware('role:super');
    Route::GET('/recharges/{id}','\App\Http\Controllers\RechargeOrderController@show')->name('admin.rechargeorders.show')->middleware('role:super');
    Route::PUT('/recharges/{id}','\App\Http\Controllers\RechargeOrderController@update')->name('admin.rechargeorders.update')->middleware('role:super');


    Route::GET('/withdraws/status/{slug}','\App\Http\Controllers\WithdrawController@index')->name('admin.withdraws.index')->middleware('role:moderator;admin2');
    Route::GET('/withdraws/user/{id}','\App\Http\Controllers\WithdrawController@userIndex')->name('admin.withdraws.user')->middleware('role:moderator;admin2');
    Route::GET('/withdraws/{id}','\App\Http\Controllers\WithdrawController@show')->name('admin.withdraws.show')->middleware('role:moderator;admin2');
    Route::PUT('/withdraws/{id}','\App\Http\Controllers\WithdrawController@update')->name('admin.withdraws.update')->middleware('role:moderator;admin2');
    Route::GET('/bitcoin','\App\Http\Controllers\BitcoinController@show')->name('admin.bitcoin.show')->middleware('role:super');
    Route::PUT('/bitcoin','\App\Http\Controllers\BitcoinController@update')->name('admin.bitcoin.update')->middleware('role:super');

    Route::GET('/usdt','\App\Http\Controllers\BitcoinController@showUsdt')->name('admin.usdt.show')->middleware('role:super');
    Route::PUT('/usdt','\App\Http\Controllers\BitcoinController@updateUsdt')->name('admin.usdt.update')->middleware('role:super');



// Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', '\App\Http\Controllers\MyAdminController@changePassword');




    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');
    Route::get('/me', 'AdminController@me')->name('admin.me');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

    // active status
    Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
    Route::delete('activation/{admin}', 'ActivationController@deactivate');
    Route::resource('permission', 'PermissionController');

    Route::GET('/stats', '\App\Http\Controllers\MyAdminController@stats')->name('admin.stats');

    Route::fallback(function () {
        return abort(404);
    });
