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
Route::any('/component/uploader','Component\UploadController@uploader');
Route::any('/component/uoloadList','Component\UploadController@uploadList');

Route::any('/component/oss','Component\OssController@sign');
Route::any('/component/postCallback','Component\OssController@postCallback');
include __DIR__.'/admin/web.php';
