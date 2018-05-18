<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"/www/tpblog/public/../app/admin/view/admin/login.html";i:1526567261;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="/static/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/static/admin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>
<body id="login">
<div class="container">

    <div class="form-signin">
        <h2 class="form-signin-heading">login</h2>
        <input type="text" class="input-block-level" name="username" placeholder="用户名">
        <input type="password" class="input-block-level" name="password" placeholder="密码">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-large btn-primary" type="submit" id="submit_login">Sign in</button>
    </div>

</div> <!-- /container -->
<script src="/static/admin/vendors/jquery-1.9.1.min.js"></script>
<script src="/static/admin/bootstrap/js/bootstrap.min.js"></script>
<script src="/static/common/layer/layer.js"></script>

<script>

    $(document).keyup(function(event){
        if(event.keyCode ==13){
            $("#submit_login").trigger("click");
        }
    });


    $(function(){
        $("input[name='username']").focus();

        $("#submit_login").click(function(){
            var username = $.trim($("input[name='username']").val());
            var password = $.trim($("input[name='password']").val());

            var data = {};
            data.username = username;
            data.password = password;

            $.ajax({
                type:'post',
                dataType:'json',
                url:"<?php echo url('admin/login'); ?>",
                data:data,
                success:function(res){
                    layer.msg(res.msg);
                    if(res.success == true){
                        var href = "<?php echo url('admin/index'); ?>";
                        setTimeout("location.href='"+href+"';",100);
                    }
                }
            })
        })
    })
</script>
</body>
</html>
