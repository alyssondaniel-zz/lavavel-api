<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('departaments', 'DepartamentController@index');
Route::get('departaments/{departament}', 'DepartamentController@show');
Route::post('departaments', 'DepartamentController@store');
Route::put('departaments/{departament}', 'DepartamentController@update');
Route::delete('departaments/{departament}', 'DepartamentController@delete');

Route::get('tickets', 'TicketController@index');
Route::get('tickets/{ticket}', 'TicketController@show');
Route::post('tickets', 'TicketController@store');
Route::put('tickets/{ticket}', 'TicketController@update');
Route::delete('tickets/{ticket}', 'TicketController@delete');

Route::get('comments', 'CommentController@index');
Route::get('comments/{comment}', 'CommentController@show');
Route::post('comments', 'CommentController@store');
Route::put('comments/{comment}', 'CommentController@update');
Route::delete('comments/{comment}', 'CommentController@delete');
