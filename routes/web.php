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
Route::get('/', 'PostController@home')->name('home');
Route::get('/post/{post}.html', 'PostController@show')->name('show');
Route::group(['middleware'=>'auth'],function ($router){
    $router->resource('post', 'PostController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);//软
});
