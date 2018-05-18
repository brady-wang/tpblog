<?php
/**
 * Created by PhpStorm.
 * User: brady
 * Date: 2018/5/18
 * Time: 11:09
 */

namespace app\admin\controller;
use app\admin\controller\MY_Controller;
use think\Controller;
use think\Request;

class Login extends Controller
{

    public function logout()
    {
        session('admin_info', null);
        $this->redirect('login/index', 302);
    }

    public function index(Request $request)
    {
        if($request->isPost()){

            $user = model("Admin");
            $data = $request->post();

            $res = $user->login($data);
            if($res){
                echo json_encode(['success'=>true,'msg'=>'登陆成功']);
            } else {
                echo json_encode(['success'=>false,'msg'=>"用户名或者密码错误"]);
            }

        } else {
            return view();
        }

    }
}