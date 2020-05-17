<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

abstract class CommonController extends Controller
{
    //
    public function __construct()   //用户登录验证
    {
        $this->middleware('admin.auth');
    }

    //成功信息
    protected function success($message){
        return response()->json(['message'=>$message,'code'=>1]);
    }

    //失败信息
    protected function eroor($message){
        return response()->json(['message'=>$message,'code'=>0]);
    }

}
