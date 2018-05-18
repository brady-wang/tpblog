<?php
namespace app\admin\controller;

use think\Db;
use think\Exception;
use think\Request;
use app\Admin\controller\MY_Controller;
use app\admin\model\Admin as AdminModel;
class Admin extends MY_Controller
{

	/**
	 * @return \think\response\View
	 */
    public function index()
    {
		$admin = model("Admin");
	    $list =  $admin->paginate(config('per_page'),true);
	    $this->assign("list",$list);

        return view();
    }

	/**
	 * @return \think\response\View
	 */
    public function add(Request $request)
    {
    	$id = $request->param('id');
    	if(!empty($id)){
    		$user_info = db('admin')->where('id',$id)->find();

		    return view('add',['user_info'=>$user_info]);
	    } else {
		    return view();
	    }

    }

	/**
	 * @param Request $request
	 */
    public function do_change(Request $request)
    {
        $param = $request->param();

		try{
			$validate = validate('Admin');

			if(!$validate->check($param)){
				if($validate->getError()){
					throw new Exception($validate->getError());
				}
			}

			$data = [
				'username'=>$param['username'],
				'email'=>$param['email'],
				'nick_name'=>$param['nick_name'],
				'desc'=>$param['desc'],
				'create_time'=>date("Y-m-d H:i:s",time())
			];
			$data['password'] = empty($param['password']) ? '' : md5($param['password']);
			$id = $param['id'];
			if($id){
				return $this->do_edit($data,$id);
			} else {
				return $this->do_add($data);
			}
		} catch(Exception $e){
			return json(['success'=>false,'msg'=>$e->getMessage()]);
		}


    }

	/**
	 * @param $data 新增内容
	 */
    public function do_add($data)
    {
	    $res = db('admin')->insert($data);
	    if($res){
			return json(['success'=>true,'msg'=>'success']);
	    } else {
			return json(['success'=>false,'msg'=>'failed']);
	    }
    }

	/**
	 * @param $data 编辑内容
	 * @param $id 编辑id
	 */
    public function do_edit($data,$id)
    {
	    $res = db('admin')->where('id',$id)->update($data);
	    if($res){
			return json(['success'=>true,'msg'=>'success']);
	    } else {
			return json(['success'=>false,'msg'=>'failed']);
	    }
    }

	/**
	 * @param Request $request
	 */

    public function del(Request $request)
    {
    	$id = $request->param('id');
	    $res = db('admin')->fetchSql(false)->where('id',$id)->delete();
	    if($res){
			return json(['success'=>true,'msg'=>'success']);
	    } else {
			return json(['success'=>false,'msg'=>'failed']);
	    }
    }







}
