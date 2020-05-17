@extends('admin.layout.master')
@section('breadcrumbs')
    <!-- Breadcrumbs-->
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>标签管理</h1>
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
                        <a class="nav-link" id="pills-home-tab" href="/admin/tag">标签列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" href="/admin/tag/create">新增标签</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="col-md-6 offset-md-3">
                            <div class="card-body">
                                <form action="/admin/tag" method="post" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">标签名称</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="name" class="form-control"></div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-info btn-block">
                                            <span id="payment-button-amount">确认添加</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection