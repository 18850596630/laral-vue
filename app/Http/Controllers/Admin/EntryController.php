<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class EntryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth')->except(['loginForm','login']);  //排除方法
    }

    public function index(){
        return view('admin.entry.index');
    }

    //登录视图
    public function loginForm()
    {
        return view('admin.entry.login');
    }
    //登录处理
    public function login(Request $request)   //依赖注入
    {

//        return $request;
        $status = Auth::guard('admin')->attempt([    //找另外的模型 admin进行登录处理
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);
//        dd($status);

        if($status){
            //登录成功
            return redirect('/admin/index');
        }
        return redirect('/admin/login')->with('error','用户名或密码错误');

    }

    //退出登录
    public function logout(){
        Auth::guard('admin')->logout();    //内置方法  开箱即用
        return redirect('/admin/login');
    }

}
