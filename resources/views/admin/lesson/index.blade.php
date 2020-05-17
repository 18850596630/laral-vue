@extends('admin.layout.master')
@section('breadcrumbs')
    <!-- Breadcrumbs-->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>课程管理</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.breadcrumbs-->
@endsection

@section('content')
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" href="/admin/lesson">课程列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" href="/admin/lesson/create">新增课程</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                         aria-labelledby="pills-home-tab">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>课程视频</th>
                                    <th>课程介绍</th>
                                    <th>视频数量</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $data as $k=>$d)
                                    <tr>
                                        <td> {{$k+1}} </td>
                                        <td>{{$d['title']}}</td>
                                        <td>{{$d['introduce']}}</td>
                                        <td>{{$d->videos()->count()}}</td>
                                        <td>
                                            <a href="/admin/lesson/{{$d['id']}}/edit"
                                               class="btn btn-primary btn-sm">编辑</a>
                                            <button data-id="{{$d['id']}}" type="button"
                                                    class="_this_del btn btn-secondary btn-sm">删除
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $.noConflict();
        jQuery(document).ready(function ($) {
            $("._this_del").click(function () {
                var _id = $(this).attr("data-id");
                $.confirm({
                    title: '提醒!',
                    content: '您确认删除该视频课程?',
                    buttons: {
                        ok: {
                            text: '确认',
                            action: function () {
                                $.ajax({
                                    url: '/admin/lesson/' + _id,
                                    method: 'DELETE',
                                    data: {
                                        'id': _id,
                                        '_token': '{{csrf_token()}}'
                                    },
                                    success: function (res) {
                                        $.dialog(res.message + '，3秒后刷新');
                                        setTimeout(function () {
                                            window.location.reload();
                                        }, 3000)
                                    }
                                })
                            }
                        },
                        cancel: {
                            text: '取消'
                        },
                    }
                });
            })
        })
    </script>
@endsection