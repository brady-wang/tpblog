<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"/www/tpblog/public/../app/admin/view/login/index.html";i:1526645200;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <title>login</title>
    <!-- Bootstrap -->
    <link href="/static/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="/static/admin/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/static/adminjs/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <div class="form-signin">
        <h2 class="form-signin-heading">登陆</h2>
        <input type="text" class="input-block-level" placeholder="用户名" id='username'>
        <input type="password" class="input-block-level" placeholder="密码" id='password'>
        <!--<label class="checkbox">-->
           <!--<input type="checkbox" value="remember-me"> Remember me-->
        <!--</label>-->
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
        $("#username").focus();

          $("#submit_login").click(function(){
              var username = $.trim($("#username").val());
              var password = $.trim($("#password").val());

             var data = {};
            data.username = username;
            data.password = password;

            $.ajax({
              type:'post',
              dataType:'json',
              url:"<?php echo url('login/index'); ?>",
              data:data,
              success:function(res){
                layer.msg(res.msg);
                if(res.success == true){
                  var admin_url = "<?php echo url('index/index'); ?>"
                  setTimeout("location.href='"+admin_url+"'",2000);
                }
              }
            })



          })
      })
    </script>
  </body>
</html>