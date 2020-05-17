<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Lesson;
use App\Model\Tag;
use App\Model\Video;
use Illuminate\Http\Request;
use DB;

class ContentController extends CommonController
{

    //显示标签
    public function tags()
    {
        return $this->response(Tag::get());
    }

    //获取课程   课程的全部视频
    public function lesson($tid)
    {
        if ($tid) {
            $data = DB::table('lessons')
                ->select('lessons.*')
                ->join('tag_lessons', 'lessons.id', '=', 'tag_lessons.lesson_id')
                ->where('tag_id', $tid)
                ->get();
        } else {
            $data = Lesson::get();
        }
        return $this->response($data);
    }

    //推荐课程
    public function commonLesson($row)
    {
        $data = Lesson::where('incommend', 1)->limit($row)->get();
        return $this->response($data);
    }

    //热门课程
    public function hotLesson($row)
    {
        $data = Lesson::where('ishot', 1)->limit($row)->get();
        return $this->response($data);
    }

    //视频列表
    public function videoList($lessonId)
    {
        $data = Video::where('lesson_id', $lessonId)->get();
        return $this->response($data);
    }


    public function videos()
    {
        return $this->response(Video::get());
    }
}
