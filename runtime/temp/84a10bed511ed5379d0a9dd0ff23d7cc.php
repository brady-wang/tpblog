<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:54:"/www/tpblog/public/../app/admin/view/friend/index.html";i:1526651606;s:42:"/www/tpblog/app/admin/view/common/top.html";i:1526646781;s:43:"/www/tpblog/app/admin/view/common/left.html";i:1526645200;s:45:"/www/tpblog/app/admin/view/common/footer.html";i:1526558785;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <title>友情链接</title>
    <!-- Bootstrap -->
    <link href="/static/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/styles.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/static/admin/vendors/flot/excanvas.min.js"></script><![endif]-->
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
                <a type="button" class="btn btn-info pull-left " href="javascript:void(0);" id="add_friend"><i class="icon-plus"></i>新增友情链接</a>
            </div>


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
                                <li class="active">友情链接</li>

                            </ul>
                        </div>
                    </div>
                    <!--面包屑结束-->
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>网站名称</th>
                                    <th>网站链接</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "<tr><td colspan='4' align='center'>暂时没有数据</td></tr>" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                <tr >
                                    <td><?php echo $v['id']; ?></td>
                                    <td><?php echo $v['web_name']; ?></td>
                                    <td><?php echo $v['web_url']; ?></td>
                                    <td><?php echo $v['create_time']; ?></td>
                                    <td><a class="edit_friend" data-web_name = "<?php echo $v['web_name']; ?>" data-web_url="<?php echo $v['web_url']; ?>" data-id="<?php echo $v['id']; ?>" href="javascript:void(0);">编辑</a>/<a class="friend_del" href = "javascript:void(0);" data-id="<?php echo $v['id']; ?>">删除</a></td>
                                </tr>
                                <?php endforeach; endif; else: echo "<tr><td colspan='4' align='center'>暂时没有数据</td></tr>" ;endif; ?>

                                </tbody>
                            </table>
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


<script src="/static/admin/assets/scripts.js"></script>
<script src="/static/admin/assets/DT_bootstrap.js"></script>

<div id="add_friend_modal" style="display:none;">
    <div class="form-horizontal">
        <div class="form-group">
            <label for="web_name" class="col-sm-2 control-label">友情链接名称:&nbsp; &nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="web_name" placeholder="友情链接名称">
            </div>
        </div>
        <br>
        <div class="form-group">
            <label for="web_url" class="col-sm-2 control-label">友情链接地址:&nbsp;&nbsp;</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="web_url" placeholder="友情链接地址">
            </div>
        </div>

    </div>
</div>
<script>
    $(function() {

        //友情链接新增开始
        $('#add_friend').click(function(){
            layer.open({
                type: 1,
                title:'友情链接新增',
                content: $("#add_friend_modal"),//这里content是一个普通的String,
                shadeClose:true,
                area: ['500px', '300px'],
                btn: ['确定','取消'],
                yes: function(index, layero){
                    var web_name = $.trim($("#web_name").val());
                    var web_url = $.trim($("#web_url").val());
                    var data = {};
                    data.web_name = web_name;
                    data.web_url = web_url;
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:"<?php echo url('friend/add'); ?>",
                        data:data,
                        success:function(res){
                            layer.msg(res.msg);
                            if(res.success == true){
                                var href = "<?php echo url('friend/index'); ?>";
                                setTimeout("location.href='"+href+"';",2000);
                            }
                        }
                    })
                },
                btn2: function(index, layero){

                    }
            });
        })

        //友情链接新增开始


        //友情链接编辑开始
        $('.edit_friend').click(function(){
            var id = $(this).attr('data-id');
            var old_web_name = $(this).attr('data-web_name');
            var old_web_url = $(this).attr('data-web_url');

            $('#web_name').val(old_web_name);
            $('#web_url').val(old_web_url);

            layer.open({
                type: 1,
                title:'友情链接编辑',
                content: $("#add_friend_modal"),//这里content是一个普通的String,
                shadeClose:true,
                area: ['500px', '300px'],
                btn: ['确定','取消'],
                yes: function(index, layero){
                    var web_name = $('#web_name').val();
                    var web_url = $('#web_url').val();
                    var data = {};
                    data.web_name = web_name;
                    data.web_url = web_url;
                    data.id = id;
                    $.ajax({
                        type:'post',
                        dataType:'json',
                        url:"<?php echo url('friend/add'); ?>",
                        data:data,
                        success:function(res){
                            layer.msg(res.msg);
                            if(res.success == true){
                                var href = "<?php echo url('friend/index'); ?>";
                                setTimeout("location.href='"+href+"';",2000);
                            }
                        }
                    })
                },
                btn2: function(index, layero){

                }
            });
        })

        //友情链接编辑开始

        //友情链接删除开始
        $(".friend_del").click(function(){
            var id = $(this).attr('data-id');
            layer.msg(id)

            layer.confirm('您确定要删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                var data = {};
                data.id = id;

                $.ajax({
                    type:'post',
                    dataType:'json',
                    url:"<?php echo url('friend/del'); ?>",
                    data:data,
                    success:function(res){
                        layer.msg(res.msg);
                        if(res.success == true){
                            var href = "<?php echo url('friend/index'); ?>";
                            setTimeout("location.href='"+href+"';",100);
                        }
                    }
                })
            }, function(){

            });
        })
        //友情链接删除结束




    });
</script>
</body>

</html>