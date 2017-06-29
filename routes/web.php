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

Route::get('setsoal', 'QuestionSetController@setsoal');
Route::post('setsoal', 'QuestionSetController@store');

Route::get('user/', 'UserController@view');
Route::get('user/{username}', 'UserController@view_user');

Route::get('settings', 'UserController@setting');


