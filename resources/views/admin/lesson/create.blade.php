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
    <style>
        .my_radio_box {
            float: left;
            margin-left: 15px;
            height: 40px;
        }

        .my_radio_box span {
            float: left;
            margin-right: 8px;
        }

        .my_radio_cell {
            float: left;
            margin-top: 5px;
        }

        .my_radio_cell input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .my_radio_cell input[type="radio"] + .radio_label:before {
            content: '';
            background: #f4f4f4;
            border-radius: 100%;
            border: 1px solid #b4b4b4;
            display: inline-block;
            width: 1.4em;
            height: 1.4em;
            position: relative;
            top: -0.2em;
            margin-right: 1em;
            vertical-align: top;
            cursor: pointer;
            text-align: center;
            -webkit-transition: all 250ms ease;
            transition: all 250ms ease;
        }

        .my_radio_cell input[type="radio"]:checked + .radio_label:before {
            background-color: #607d8b;
            box-shadow: inset 0 0 0 4px #f4f4f4;
        }

        .my_radio_cell input[type="radio"]:focus + .radio_label:before {
            outline: none;
            border-color: #607d8b;
        }

        .card .card-top button, .card .card-footer button {
            background: #607d8b;
            color: #FFFFFF;
            font-size: 14px;
            padding: inherit;
        }

        .btn {
            color: #fff;
            background-color: #337ab7;
            border-color: #2e6da4;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            text-decoration: none;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
    </style>
    <div class="animated fadeIn">
        <div class="card" id="app">
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" href="/admin/lesson">课程列表</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" href="/admin/lesson/create">新增课程</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                         aria-labelledby="pills-profile-tab">
                        <form action="/admin/lesson" method="post" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>添加视频</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                                                 class=" form-control-label">标题</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                                                    name="title" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                                                 class=" form-control-label">介绍</label>
                                                </div>
                                                <div class="col-12 col-md-9"><textarea name="introduce" rows="5"
                                                                                       placeholder=""
                                                                                       class="form-control"
                                                                                       required></textarea></div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                                                 class=" form-control-label">预览图</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="preview"
                                                           class="form-control preview_title" value="wu.png" readonly>
                                                    <div class="fileinput fileinput-new">
                                                        <div class="fileinput-new thumbnail"
                                                             style="width: 200px;height: auto;max-height:150px;">
                                                            <img id='picImg'
                                                                 style="width: 100%;height: auto;max-height: 140px;"
                                                                 src="{{asset('images/wu.png')}}" alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 200px; max-height: 150px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-sm"
                                                                  id="upload_click">选择文件</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                                                 class=" form-control-label">推荐</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="my_radio_box">
                                                        <span>是</span>
                                                        <div class="my_radio_cell">
                                                            <input type="radio" id="index_1" name="incommend" value="1">
                                                            <label for="index_1" class="radio_label"></label>
                                                        </div>
                                                    </div>
                                                    <div class="my_radio_box">
                                                        <span>否</span>
                                                        <div class="my_radio_cell">
                                                            <input type="radio" id="index_2" name="incommend" value="0"
                                                                   checked>
                                                            <label for="index_2" class="radio_label"></label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                                                 class=" form-control-label">热门</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <div class="my_radio_box">
                                                        <span>是</span>
                                                        <div class="my_radio_cell">
                                                            <input type="radio" id="index_3" name="ishot" value="1">
                                                            <label for="index_3" class="radio_label"></label>
                                                        </div>
                                                    </div>
                                                    <div class="my_radio_box">
                                                        <span>否</span>
                                                        <div class="my_radio_cell">
                                                            <input type="radio" id="index_4" name="ishot" value="0"
                                                                   checked>
                                                            <label for="index_4" class="radio_label"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label for="text-input"
                                                                                 class=" form-control-label">点击数</label>
                                                </div>
                                                <div class="col-12 col-md-9"><input type="number" value="0"
                                                                                    id="text-input" name="click"
                                                                                    class="form-control"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>视频管理</h4>
                                    </div>
                                    <div class="col-md-12" v-for="(k,v) in videos">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input"
                                                                                         class=" form-control-label">视频标题</label>
                                                        </div>
                                                        <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                                                            v-model="k.title"
                                                                                            class="form-control"></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input"
                                                                                         class=" form-control-label">视频地址</label>
                                                        </div>
                                                        <div class="col-12 col-md-9"><input type="text" id="text-input"
                                                                                            v-model="k.path"
                                                                                            class="form-control"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <span class="btn btn-primary" style="background: #d9534f"
                                                      @click.prevent="del(v)">删除视频</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <span class="btn btn-primary" @click.prevent="add" style="background: #00c292">添加视频</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 offset-md-2">
                                <div class="row form-group" hidden>
                                    <textarea name="videos" cols="30" rows="10"
                                              class="form-control">@{{videos}}</textarea>
                                </div>
                                <button id="payment-button" type="submit" class="btn btn-info btn-block">
                                    <span id="payment-button-amount">保存数据</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div style="height: 35px"></div>
                    <div class="col-md-8 offset-md-2">
                        <div class="card">
                            <div class="card-header">
                                <h5>选择文件，上传视频，并将获取的视频链接，复制粘贴到视频地址</h5>
                            </div>
                            <div class="col-md-12" style="margin: 15px auto">
                                <input type="text" id="oss_path" class="form-control">
                            </div>
                            <div id="uploader" class="wu-example col-sm-10 col-md-4 col-lg-5">
                                <input type="hidden" name="file"> <!--这里一定的加上 name=‘file’ 否侧就报错-->
                                <!--用来存放文件信息-->
                                <div id="preview" class="uploader-list" style="margin-bottom: 3px"></div>
                                <div id="picker" class="btn btn-primary" style="background-color: #f39c12">选择文件</div>
                                <div id="ctlBtn" class="btn btn-primary" style="background-color: #00aced">开始上传</div>
                            </div>
                            <div style="height: 35px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="_token" class="tag_token" value="<?php echo csrf_token(); ?>">
    <script>
        new Vue({
            el: '#app',
            data: {
                videos: [{title: '', path: ''}]
            },
            methods: {
                add: function () {
                    var field = {title: '', path: ''};
                    this.videos.push(field);
                },
                del: function (k) {
                    this.videos.splice(k, 1)
                }
            }
        });
    </script>
    <script src="/layui/layui.all.js"></script>
    <script src=" http://cdn.staticfile.org/webuploader/0.1.0/webuploader.min.js"></script>
    <script type="text/javascript"
            src="{{asset('/aliyun-oss-php-master/lib/plupload-2.1.2/js/plupload.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/aliyun-oss-php-master/upload.js')}}"></script>
    <script>
        layui.use('upload', function () {
            var upload = layui.upload;
            var tag_token = $(".tag_token").val();
            //普通图片上传
            var uploadInst = upload.render({
                elem: '#upload_click'
                , type: 'images'
                , exts: 'jpg|png|gif|jpeg' //设置一些后缀，用于演示前端验证和后端的验证
                //,auto:false //选择图片后是否直接上传
                //,accept:'images' //上传文件类型
                , url: '/component/uploader'
                , data: {'_token': tag_token}
                , before: function (obj) {
                    //预读本地文件示例，不支持ie8
                    // obj.preview(function(index, file, result){
                    //     $('.img-upload-view').attr('src', result); //图片链接（base64）
                    // });
                }
                , done: function (res) {
                    if (res.status == 1) {
                        $("#picImg").attr("src", res.path);
                        $(".preview_title").val(res.path);
                        return $.alert('上传成功');
                    } else {
                        $.alert(res.message);
                    }
                }
                , error: function () {
                    //演示失败状态，并实现重传
                    return $.alert('上传失败,请重新上传');
                }
            });
        });


        var objdata = {
            upfile_nametype: "local_name",
            cdn_url: 'http://laral.jingani.cn/',
            host: "http://jingani.oss-cn-hangzhou.aliyuncs.com",
            path: ''
        };
        var uploader = WebUploader.create({
            auto: false,
            // swf文件路径
            swf: "http://cdn.staticfile.org/webuploader/0.1.0/Uploader.swf",
            // 文件接收服务端。
            server: objdata.host,//阿里云oss地址
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#picker',
            // accept:{
            //     title:'video',
            //     extentions: "mp4",
            //     mimeTypes: 'video/mp4'
            // },
            formData: {
                '_token': '{{csrf_token()}}'
            },
            fileVal: "file",
            resize: false,
            fileNumLimit: 1
        });
        uploader.on("uploadBeforeSend", function (obj, data, headers) {
            $.ajax({
                type: "post",
                url: "/component/oss",
                timeout: 10000,
                data: {
                    "_token": '{{csrf_token()}}',
                },
                success: function (str) {
                    // console.log("str",str);
                    if (str) {
                        try {
                            var res = JSON.parse(str);
                            // console.log('res',res)
                            // console.log('ll',calculate_object_name(data.name,objdata.upfile_nametype));return;
                            $.extend(data, {
                                'key': res.dir + calculate_object_name(data.name, objdata.upfile_nametype),
                                'policy': res.policy,
                                'OSSAccessKeyId': res.accessid,
                                'success_action_status': '200', //让服务端返回200,不然，默认会返回204
                                'callback': res.callback,
                                'signature': res.signature
                            });
                        } catch (e) {
                            layer.alert("系统错误");
                        }

                    } else {
                        layer.alert("结果为空");
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert("ajax error");
                },
                complete: function (XMLHttpRequest, status) { //请求完成后最终执行参数
                    if (status == 'timeout') {
                        layer.alert('请求超时，请稍后再试！');
                    }
                },
                async: false
            })
            obj.filepath = objdata.cdn_url + data.key;
            objdata.path = objdata.cdn_url + data.key;
            // console.log("data",data)
            headers['Access-Control-Allow-Origin'] = "*";
        })
        // 当有文件添加进来的时候
        uploader.on('fileQueued', function (file) {
            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // uploader.makeThumb( file, function( error, src ) {
            //     if ( error ) {
            //         layer.msg('不能预览');
            //         return;
            //     }
            //     $("#preview").html("<img src='"+src+"'>");
            // }, 100, 100 );
            //删除错误的第一个文件
            $("#picker").on("click", function () {
                uploader.removeFile(file);
            })
        });
        //点击上传
        $("#ctlBtn").on("click", function (obj) {
            layer.load();
            uploader.upload();
        });
        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on('uploadSuccess', function (file, msg) {
            layer.closeAll();
            if (msg.Status == 'Ok') {
                layer.msg('上传成功', {icon: 1, time: 2000});
                // $("#oss_path").val(objdata.path);
                $("#oss_path").val("https://jingani.oss-cn-hangzhou.aliyuncs.com/laravel/"+file.name);
            } else {
                layer.msg("上传失败", {icon: 2, time: 3000});
            }
            // console.log("file",file);
            // console.log("msg",msg);
        });
        // 文件上传失败，显示上传出错。
        uploader.on('uploadError', function (file) {
            layer.closeAll();
            // console.log("error file",file);
            var $li = $('#' + file.id),
                $error = $li.find('div.error');

            // 避免重复创建
            if (!$error.length) {
                $error = $('<div class="error"></div>').appendTo($li);
            }
            $error.text('上传失败');
        });
    </script>
@endsection