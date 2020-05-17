@extends('admin.layout.master')
@section('breadcrumbs')
<!-- Breadcrumbs-->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>修改密码</h1>
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
            <div class="col-md-6 offset-md-3">
                <div class="card-body">
                    <!-- Credit Card -->
                    <div id="pay-invoice">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center">修改密码</h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">原密码</label>
                                    <input id="cc-payment" name="original_password" type="text" class="form-control" aria-required="true" aria-invalid="false" value="">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">新密码</label>
                                    <input id="cc-name" name="password" type="text" class="form-control cc-name valid"  autocomplete="off" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">确认密码</label>
                                    <input id="cc-number" name="password_confirmation" type="tel" class="form-control cc-number identified visa" value="">
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">确认修改</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
