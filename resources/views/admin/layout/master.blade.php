
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>越来越寒(lll￢ω￢)</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/fileinput/bootstrap-fileinput.css" rel="stylesheet">
    <link href="/confirm/jquery-confirm.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <script src="/fileinput/jquery.min.js"></script>
    <script src="/vue/vue.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>--}}
    <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
            height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-title">系统管理</li><!-- /.menu-title -->
                <li>
                    <a href="/admin/changePass"> <i class="menu-icon ti-write"></i>我的资料</a>
                </li>
                <li class="menu-title">内容管理</li><!-- /.menu-title -->
                <li>
                    <a href="/admin/tag"> <i class="menu-icon ti-tag"></i>内容标签 </a>
                </li>
                <li>
                    <a href="/admin/lesson"> <i class="menu-icon ti-video-clapper"></i>视频管理 </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
{{--                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>--}}
{{--                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>--}}
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{--                        <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">--}}
                       <i class="fa fa-user" style="margin-right: 8px"></i> {{Auth::guard('admin')->user()->username}}
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="/admin/changePass"><i class="fa fa- user"></i>我的账号</a>

                        <a class="nav-link" href="/admin/logout"><i class="fa fa-power -off"></i>退出</a>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <!-- /#header -->
    @yield('breadcrumbs')
    <!-- Content -->
    <div class="content">
          @yield('content')
    </div>

    <!-- /.content -->
    <div class="clearfix"></div>
    @if(Session::has('message'))
        <div class="alert alert-info"> {{Session::get('message')}}
        </div>
    @endif
</div>
@include('admin.layout.errors')
{{--<script src="/assets/js/main.js"></script>--}}
<script src="/assets/js/matchHeight.js"></script>
<script src="/confirm/jquery-confirm.js"></script>
</body>
</html>
