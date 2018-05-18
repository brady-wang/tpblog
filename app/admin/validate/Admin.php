<?php

 namespace app\admin\validate;

 use think\Validate;
 class Admin extends Validate
 {
     protected $rule = [
         'username|用户名'  =>  'require|min:5|max:25',
         'password|密码'   => 'require',
     ];




 }