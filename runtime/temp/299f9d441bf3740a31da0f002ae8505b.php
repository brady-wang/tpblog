<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:53:"/www/tpblog/public/../app/admin/view/article/add.html";i:1526645200;s:42:"/www/tpblog/app/admin/view/common/top.html";i:1526646781;s:43:"/www/tpblog/app/admin/view/common/left.html";i:1526645200;s:45:"/www/tpblog/app/admin/view/common/footer.html";i:1526558785;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <title>Tables</title>
    <!-- Bootstrap -->
    <link href="/static/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/styles.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="/static/admin/vendors/flot/excanvas.min.js"></script>
    <![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/static/admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<script src="/static/admin/vendors/jquery-1.9.1.js"></script>
<!--<script src="/static/admin/bootstrap/js/bootstrap.min.js"></script>-->
<script src="/static/admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="/static/common/layer/layer.js"></script>

<script src="/static/common/bootstrap/js/bootstrap.min.js"></script>
<!--<link href="/static/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" >-->
<style>
    .pagination { display: inline-block; padding-left: 0; margin: 20px 0; border-radius: 4px; }
    .pagination li { display: inline; }
    .pagination li a,.pagination li span { position: relative; float: left; padding: 6px 12px; margin-left: -1px; line-height: 1.428571429; text-decoration: none; background-color: #fff; border: 1px solid #ddd; }
    .pagination li:first-child a { margin-left: 0; border-bottom-left-radius: 4px; border-top-left-radius: 4px; }
    .pagination li:last-child a { border-top-right-radius: 4px; border-bottom-right-radius: 4px; }
    .pagination li a:hover, .pagination li a:focus { background-color: #eee; }
    .pagination .active span, .pagination .active span:hover, .pagination .active span:focus { z-index: 2; color: #fff; cursor: default; background-color: #428bca; border-color: #428bca; }
    .pagination .disabled span, .pagination .disabled span:hover, .pagination .disabled span:focus { color: #999; cursor: not-allowed; background-color: #fff; border-color: #ddd; }
    .pagination-lg li a { padding: 10px 16px; font-size: 18px; }
    .pagination-sm li a, .pagination-sm li span { padding: 5px 10px; font-size: 12px; }
</style>

<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#">管理后台</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo \think\Session::get('admin_info.username'); ?> <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="<?php echo url('Admin/add',['id'=>\think\Session::get('admin_info.id')]); ?>">个人资料</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="<?php echo url('login/logout'); ?>">登出</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav pull-right">

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">设置 <b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="#">网站设置 </a>
                            </li>
                            <li>
                                <a href="#">修改密码</a>
                            </li>
                            <li>
                                <a href="#">友情链接</a>
                            </li>
                        </ul>
                    </li>

                </ul>


            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <style>
    #sidebar{
        margin-top: -29px;
        margin-left: -3px;
    }
    #sidebar li{
        line-height: 20px;;
    }
</style>
<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse ">
        <li  class="<?php if(\think\Request::instance()->controller() == 'Index'): ?>active<?php endif; ?>" >
            <a href="<?php echo url('index/index'); ?>"><i class="icon-chevron-right"></i> 首页</a>
        </li>

        <li class="<?php if(\think\Request::instance()->controller() == 'Admin'): ?>active<?php endif; ?>">
            <a href="<?php echo url('admin/index'); ?>"><i class="icon-chevron-right"></i> 用户管理</a>
        </li>

        <li class="<?php if(\think\Request::instance()->controller() == 'Article'): ?>active<?php endif; ?>">
            <a href="<?php echo url('article/index'); ?>"><i class="icon-chevron-right"></i> 文章管理</a>
        </li>
        <li class="<?php if(\think\Request::instance()->controller() == 'Cate'): ?>active<?php endif; ?>">
            <a href="<?php echo url('cate/index'); ?>"><i class="icon-chevron-right"></i> 分类管理</a>
        </li>
        <li class="<?php if(\think\Request::instance()->controller() == 'Tags'): ?>active<?php endif; ?>">
            <a href="<?php echo url('tags/index'); ?>"><i class="icon-chevron-right"></i> 标签管理</a>
        </li>


        <li class="<?php if(\think\Request::instance()->controller() == 'Setting'): ?>active<?php endif; ?>">
            <a href="<?php echo url('setting/index'); ?>"><i class="icon-chevron-right"></i> 网站设置</a>
        </li>
        <li class="<?php if(\think\Request::instance()->controller() == 'Friend'): ?>active<?php endif; ?>">
            <a href="<?php echo url('friend/index'); ?>"><i class="icon-chevron-right"></i> 友情链接</a>
        </li>


    </ul>
</div>
        <!--/span-->
        <div class="span9" id="content">

            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <!--面包屑开始-->
                    <div class="navbar">
                        <div class="navbar-inner">
                            <ul class="breadcrumb">
                                <li>
                                    <a href="<?php echo url('index/index'); ?>">管理后台</a> <span class="divider">/</span>
                                </li>
                                <li><a href="<?php echo url('admin/index'); ?>">文章管理</a><span class="divider">/</span></li>
                                <li class="active">文章新增</li>

                            </ul>
                        </div>
                    </div>
                    <!--面包屑结束-->

                    <div class="block-content collapse in">
                        <div class="span12">
                            <div class="form-horizontal">
                                <fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="id">ID</label>
                                        <div class="controls">
                                            <input class="input-xlarge focused" id="id" type="text" value="<?php echo (isset($user_info['id']) && ($user_info['id'] !== '')?$user_info['id']:''); ?>"
                                                   placeholder="id" disabled >
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="username">用户名</label>
                                        <div class="controls">
                                            <input class="input-xlarge focused" id="username" type="text" value="<?php echo (isset($user_info['username']) && ($user_info['username'] !== '')?$user_info['username']:''); ?>"
                                                   placeholder="请输入用户名">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="password">密码</label>
                                        <div class="controls">
                                            <input class="input-xlarge focused" id="password" type="text" value="<?php echo (isset($user_info['password']) && ($user_info['password'] !== '')?$user_info['password']:''); ?>"
                                                   placeholder="请输入密码">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="email">邮箱</label>
                                        <div class="controls">
                                            <input class="input-xlarge " id="email" type="text" placeholder="请输入邮箱" value="<?php echo (isset($user_info['email']) && ($user_info['email'] !== '')?$user_info['email']:''); ?>">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="nick_name">昵称</label>
                                        <div class="controls">
                                            <label>
                                                <input type="text" id="nick_name" value="" class="input-xlarge"
                                                       placeholder="请输入昵称" value="<?php echo (isset($user_info['nick_name']) && ($user_info['nick_name'] !== '')?$user_info['nick_name']:''); ?>">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="control-group success">
                                        <label class="control-label" for="desc">描述</label>
                                        <div class="controls">
                                            <textarea name="desc" class="input-xlarge" id="desc" cols="30" rows="10"
                                                      placeholder="请输入个人描述"><?php echo (isset($user_info['desc']) && ($user_info['desc'] !== '')?$user_info['desc']:''); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" id="submit_add_user" class="btn btn-primary">提交</button>
                                        <button type="reset" class="btn">取消</button>
                                    </div>
                                </fieldset>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>


        </div>
    </div>
</div>
<hr>
<footer style="margin: 39px 490px;">
    <p>&copy; brady wang 2018 - copy <a href="http://www.cssmoban.com/" target="_blank" title="cssmoban">cssmoban</a>
</footer>
</div>
<!--/.fluid-container-->

<script src="/static/admin/vendors/jquery-1.9.1.js"></script>
<script src="/static/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/admin/vendors/datatables/js/jquery.dataTables.min.js"></script>
<script src="/static/common/layer/layer.js"></script>

<script src="/static/admin/assets/scripts.js"></script>
<script src="/static/admin/assets/DT_bootstrap.js"></script>
<script>
    $(function () {
        $("#submit_add_user").click(function(){
            var id = $.trim($("#id").val());
            var username = $.trim($("#username").val())
            var password = $.trim($("#password").val())
            var email = $.trim($("#email").val())
            var nick_name = $.trim($("#nick_name").val())
            var desc = $.trim($("#desc").val())

            var data = {};
            data.id = id;
            data.username = username;
            data.password = password;
            data.email = email;
            data.nick_name = nick_name;
            data.desc = desc;

            $.ajax({
                type:'post',
                dataType:'json',
                url:"<?php echo url('admin/do_change'); ?>",
                data:data,
                success:function(res){
                    layer.msg(res.msg);
                    if(res.success == true){
                        var href = "<?php echo url('admin/index'); ?>";
                        setTimeout("location.href='"+href+"';",2000);
                    }
                }
            })

        })
    });
</script>
</body>

</html>