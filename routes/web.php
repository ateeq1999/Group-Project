<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');

// Auth Routes

Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
  ]);
  Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login'
  ]);
  Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
  ]);
  
  // Password Reset Routes...
  Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
  ]);
  Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
  ]);
  Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
  ]);
  Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
  ]);
  
  Route::post('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@register'
  ]);

// End Auth Routes


Route::get('/profile', ['as' => 'profile', 'uses' => 'HomeController@profile'])->middleware('auth');
Route::get('/dash', ['as' => 'dash', 'uses' => 'HomeController@index'])->middleware('auth');

Route::get('/patient',['as' => 'patient', 'uses' => 'PatientController@index'])->middleware('auth');
Route::post('/patientregister',['as' => 'patient_register', 'uses' => 'PatientController@register_patient'])->middleware('auth');
Route::get('/createchannelview',['as' => 'create_channel_view', 'uses' => 'PatientController@create_channel_view'])->middleware('auth');

Route::get('/checkpatientview',['as' => 'check_patient_view', 'uses' => 'PatientController@check_patient_view'])->middleware('auth');

Route::get('/myattend', ['as' => 'myattend', 'uses' => 'AttendController@myattend'])->middleware('auth');
Route::get('/attendmore', ['as' => 'attendmore', 'uses' => 'AttendController@attendmore'])->middleware('auth');

Route::get('/regfinger', ['as' => 'regfinger', 'uses' => 'UserController@regFingerprint'])->middleware('auth');
Route::get('/newuser', ['as' => 'newuser', 'uses' => 'UserController@regNew'])->middleware('auth');
Route::get('/resetuser', ['as' => 'resetuser', 'uses' => 'UserController@resetUser'])->middleware('auth');