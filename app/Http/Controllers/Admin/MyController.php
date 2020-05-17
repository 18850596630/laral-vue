<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPost;
use Illuminate\Http\Request;
use Auth;

class MyController extends CommonController
{
    /**
     * 修改密码界面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function passForm(){
        return view('admin.my.passForm');
    }

    /**
     * 密码更新
     * @param AdminPost $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePass(AdminPost $request){
        $model=Auth::guard('admin')->user();
        $model->password=bcrypt($request['password']);  //密码加密
        $model->save();                                 //更新修改密码);
        return view('admin.entry.index')->with('message', 'Message sent!');

    }
}
