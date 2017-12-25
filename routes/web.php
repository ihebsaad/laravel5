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


Route::get('{n}', function($n) {
    return 'Je suis la page ' . $n . ' !';
})->where('n', '[1-3]');

//Route::get('users', 'UsersController@getInfos');
//Route::post('users', 'UsersController@postInfos');

Route::resource('user', 'UserController');
Route::get('user', 'UserController@getInfos');
Route::post('user', 'UserController@postInfos');


Route::get('contact', 'ContactController@getForm');
Route::post('contact', 'ContactController@postForm');

Route::get('photo', 'PhotoController@getForm');
Route::post('photo', 'PhotoController@postForm');

Route::get('email', 'EmailController@getForm');
Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);

Route::resource('user', 'UserController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('post', 'PostController', ['except' => ['show', 'edit', 'update']]);
Route::get('post/tag/{tag}', 'PostController@indexTag');

Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);
Route::get('language', 'PostController@language');


Route::get('/login', ['as' => 'login', 'uses' => 'IndexController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'IndexController@logout'])->middleware('auth');
Route::get('/dump', ['as' => 'dump', 'uses' => 'IndexController@dump', 'middleware' => 'auth'])->middleware('auth');

Route::get('/auth0/callback', ['as' => 'logincallback', 'uses' => '\Auth0\Login\Auth0Controller@callback']);
