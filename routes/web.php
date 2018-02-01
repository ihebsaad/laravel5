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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::resource('sim', 'SimController');
Route::resource('plan', 'PlanController');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/home', 'HomeController@index');
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);


//Administration Portal route
Route::get('/activate/admin', [ 'uses' => 'AdminController@admin']);

Route::get('/activate/admin/enable/{id}', [ 'as' => 'admin.enable', 'uses' => 'AdminController@enable']);

Route::get('/activate/admin2', [ 'uses' => 'AdminController@admin2']);
Route::post('/activate/admin2', [ 'uses' => 'AdminController@admin2']);


Route::get('/activate/upload', [ 'uses' => 'AdminController@upload']);
Route::post('/activate/upload', [ 'uses' => 'AdminController@upload']);


// demo interfaces
Route::get('/demo', function () {
    return view('demo');
});
Route::get('/demo2', function () {
    return view('demo2');
});
Route::get('/demo3', function () {
    return view('demo3');
});
Route::get('/demo4', function () {
    return view('demo4');
});
Route::get('/demo5', function () {
    return view('demo5');
});
Route::get('/demo6', function () {
    return view('demo6');
});
Route::get('/demo7', function () {
    return view('demo7');
});
Route::get('/demo8', function () {
    return view('demo8');
});



Route::get('/pay', function () {
    return view('pay');
});
Route::post('/pay', function () {
    return view('pay');
});
Route::get('/index2', function () {
    return view('index2');
});
Route::get('/downloadtemplate', function () {
    return view('downloadtemplate');
});
Route::post('/downloadtemplate', function () {
    return view('downloadtemplate');
});
Route::get('/mail', function () {
    return view('mail');
});
Route::get('/mail2', function () {
    return view('mail2');
});

Route::get('/emails/email1', function () {
    return view('/emails/email1');
});
Route::get('/emails/email2', function () {
    return view('/emails/email2');
});
Route::get('/welcomeemail', function () {
	
  Mail::send('emails.email1', [], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Houba')
      ->to('ihebsaad@gmail.com', 'iheb')
      ->subject('From SparkPost with ❤');
  });
  
   // return redirect()->back();
});

Route::get('/thankemail', function () {
	
  Mail::send('emails.email2', [], function ($message) {
    $message
      ->from('postmaster@test.enterpriseesolutions.com', 'Houba')
      ->to('ihebsaad@gmail.com', 'iheb')
      ->subject('From SparkPost with ❤');
  });
  
   // return redirect()->back();
});