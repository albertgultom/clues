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

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('logout', 'UserController@logout');

Route::get('registerprofile', 'UserController@registerprofile');

Route::get('question/{id}/create', 'QuestionController@create');
Route::get('question/{id}/delete', 'QuestionController@delete');

Route::get('question/{id}/play', 'QuestionController@play');
Route::get('question/{id}/result', 'QuestionController@resultscore');
Route::post('result', 'QuestionController@result');
Route::get('getdataexam/{a}/{b}/{c}', 'QuestionController@dataexam');
Route::post('getresultexam', 'QuestionController@resultexam');
Route::get('showanswertrue/{id}', 'QuestionController@answertrue');


Route::get('create_question/{id}', 'QuestionController@create_question');
Route::get('delete_question/{id}', 'QuestionController@delete_question');
Route::post('store_question', 'QuestionController@store');

Route::get('inputToken/{id}', 'QuestionSetController@inputtoken');
Route::post('checktoken', 'QuestionSetController@checktoken');
Route::post('like', 'QuestionSetController@like');
Route::get('setsoal/{id?}', 'QuestionSetController@setsoal');
Route::post('setsoal', 'QuestionSetController@store');
// Route::put('setsoal', 'QuestionSetController@edit');
Route::post('posting_questionset', 'QuestionSetController@posting');
Route::post('archive_questionset', 'QuestionSetController@archive');

Route::get('postedquestion/', 'QuestionSetController@postedquestion');
Route::get('archivequestion/', 'QuestionSetController@archivequestion');



Route::get('user/', 'UserController@view');
Route::get('user/{username}', 'UserController@view_user');
Route::get('settings', 'UserController@setting');
Route::put('user/updateprofile', 'UserController@update');
Route::put('changepassword', 'UserController@changepassword');
Route::get('password', function(){
	return view('user.changepassword');
});
Route::post('changepassword', 'UserController@changepassword');

Route::post('following', 'UserController@following');

Route::get('readnotif/{id}', 'UserController@readnotif');

Route::get('search', 'SearchController@getResult');


Route::get('followers', 'UserController@followers');
Route::get('followings', 'UserController@followings');

Route::get('followers/{id}', 'UserController@followers_other');
Route::get('followings/{id}', 'UserController@followings_other');

Route::post('upload', 'QuestionController@upload');



Route::get('tentang', 'HomeController@tentang');
Route::get('syaratketentuan', 'HomeController@syaratketentuan');
Route::get('bantuan', 'HomeController@bantuan');
Route::get('kontak', 'HomeController@kontak');
















