<?php

Route::group(['namespace' => 'Api'], function () {
    //显示标签
    Route::get('tags', 'ContentController@tags');

    //获取课程  根据标签  课程的全部视频
    Route::get('lesson/{tid}','ContentController@lesson');

    //推荐课程  多少条
    Route::get('commonLesson/{row}','ContentController@commonLesson');

    //热门课程
    Route::get('hotLesson/{row}','ContentController@hotLesson');

    //视频列表
    Route::get('videoList/{lessonId}','ContentController@videoList');

    //全部视频
    Route::get('videos','ContentController@videos');
});