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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/form', function (\Illuminate\Http\Request $request) {
    dump($request->all());
});
Auth::routes();
Route::group(['middleware'=>'auth'],function ($router){
    $router->resource('post', 'PostController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);//软
});
$router->post('upload/uploadImages', 'UploadController@uploadImages');//文件上传
/*-*/ //不可删除