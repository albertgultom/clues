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

Route::get('question', 'QuestionController@index');
Route::get('question/{id}/create', 'QuestionController@create');
Route::get('question/{id}/delete', 'QuestionController@delete');
Route::get('question/{id}/edit', 'QuestionController@edit');
Route::get('question/{id}/play', 'QuestionController@play');
Route::post('result', 'QuestionController@result');
Route::get('getdataexam/{a}/{b}/{c}', 'QuestionController@dataexam');
Route::post('getresultexam', 'QuestionController@resultexam');
Route::get('showanswertrue/{id}', 'QuestionController@answertrue');


Route::get('create_question/{id}', 'QuestionController@create_question');
Route::get('delete_question/{id}', 'QuestionController@delete_question');
Route::post('store_question', 'QuestionController@store');

Route::post('like', 'QuestionSetController@like');
Route::get('setsoal', 'QuestionSetController@setsoal');
Route::post('setsoal', 'QuestionSetController@store');
// Route::put('setsoal', 'QuestionSetController@edit');
Route::post('posting_questionset', 'QuestionSetController@posting');
Route::post('archive_questionset', 'QuestionSetController@archive');

Route::get('user/', 'UserController@view');
Route::get('user/{username}', 'UserController@view_user');

Route::get('settings', 'UserController@setting');
Route::post('following', 'UserController@following');


Route::get('readnotif/{id}', 'UserController@readnotif');


