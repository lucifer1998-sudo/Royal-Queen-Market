<?php

Route::middleware(['guest'])->group(function () {

    Route::get('enter','Auth\LoginController@showSignIn')->name('logins');
    Route::post('enter','Auth\LoginController@postSignIn')->name('logins.post');

    Route::get('membership/{refid?}','Auth\RegisterController@showSignUp')->name('signup');
    Route::get('registration/{code}','Auth\RegisterWithInviteController@create')->name('register.with.invite');
    Route::post('registration/{code}','Auth\RegisterWithInviteController@store')->name('register.with.invite.post');

    Route::post('membership','Auth\RegisterController@signUpPost')->name('signup.post');

    Route::get('secret/onetime','Auth\RegisterController@showMnemonic')->name('mnemonic');

    Route::get('/passwordreset', 'Auth\ForgotPasswordController@showForget');
    Route::get('/passwordreset/secret', 'Auth\ForgotPasswordController@showMnemonic');
    Route::get('/passwordreset/2fa', 'Auth\ForgotPasswordController@showPGP');

    Route::post('/passwordreset/secret', 'Auth\ForgotPasswordController@resetMnemonic');
    Route::post('/passwordreset/2fa', 'Auth\ForgotPasswordController@sendVerify');

    Route::get('/passwordreset/2fa/challenge', 'Auth\ForgotPasswordController@showVerify')->name('pgprecover');
    Route::post('/passwordreset/2fa/challenge', 'Auth\ForgotPasswordController@resetPgp')->name('resetpgp');

});

Route::get('challenge', 'Auth\LoginController@showVerify') -> name('verify');
Route::post('challenge', 'Auth\LoginController@postVerify') -> name('verify.post');


Route::post('logout','Auth\LoginController@postSignOut')->name('signout.post');




