<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Model\Tag;
use Illuminate\Http\Request;

    class TagController extends CommonController
{
    /**
     * 标签界面
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Tag::get();
//        dd($model);
        return view('admin.tag.index',compact('data'));
    }

    /**
     * 新建标签界面
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tag.create');
    }

    /**
     * 标签添加
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request,Tag $model)
    {
        $model->create($request->all());
        return redirect('/admin/tag');
//        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return redirect('/admin/tag');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Tag::find($id);
        return view('admin.tag.edit',compact('model'));  //正常视图
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Tag::find($id);
        $model['name']=$request['name'];
        $model->save();
        return redirect('/admin/tag');   //跳转界面   一般用于数据提交后
    }

    /**
     *
     * 标签删除
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        return $this->success('删除成功');   //从CommonController 继承过来
    }
}
