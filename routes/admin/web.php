<?php
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function (){
    // 后台登录
    Route::get('/login','EntryController@loginForm');

    //登录处理
    Route::post('/login','EntryController@login');

    //后台登录主页
    Route::get('/index','EntryController@index');

    //后台退出
    Route::get('/logout','EntryController@logout');

    //修改密码
    Route::get('/changePass','MyController@passForm');
    Route::post('/changePass','MyController@changePass');

    //标签管理
    Route::resource('tag','TagController');

    //课程管理
    Route::resource('lesson','LessonController');

    //OSS 上传回调
//    Route::post('/postCallback','OssController@postCallback');
});
//admin  主域名下的admin
