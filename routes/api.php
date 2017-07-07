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


Route::get('/skus', 'SkuController@index')->name('sku.index');
Route::post('/sku', 'SkuController@store')->name('sku.store');

Route::get('/comments', 'CommentController@index')->name('comment.index');
Route::get('/comments/add/{id}', 'CommentController@index')->name('comment.index');
Route::post('/comment', 'CommentController@store')->name('comment.store');

Route::get('/users', 'UserController@index')->name('user.index');
Route::post('/user', 'UserController@store')->name('user.store');

