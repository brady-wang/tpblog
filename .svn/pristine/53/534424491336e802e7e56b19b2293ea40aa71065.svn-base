<?php
namespace app\admin\controller;

use think\Request;
use app\admin\controller\MY_Controller;
class Friend extends MY_Controller
{


    public function index()
    {
	    $friend = model("Friend");
	    $list = $friend->paginate(config('per_page'));
	    $this->assign('list',$list);
        return view();
    }

    /**
     * @param Request $request
     * @return \think\response\View
     */
    public function add()
    {

    	$id = input('post.id');
    	if(input('?id')){
		    $this->do_edit(input('post.id'),input('post.'));
	    } else {
    		$this->do_add(input('post.'));
	    }
    }

    public function do_add($param)
    {

        $data = [
            'web_name'=>$param['web_name'],
            'web_url'=>$param['web_url'],
            'create_time'=>date("Y-m-d H:i:s",time())
        ];
        $res = db('friend')->insert($data);
        if($res){
	        $this->success_response();
        } else {
	        $this->error_response('500');
        }

    }

	public function do_edit($id,$param)
	{
		try{
			if(empty($id)){
				throw new Exception("100");
			}

			if(empty($param['web_name'])){
				throw new Exception("4000002");
			}

			if(empty($param['web_url'])){
				throw new Exception("4000003");
			}

			$data = [
				'web_name'=>$param['web_name'],
				'web_url'=>$param['web_url'],
			];
			if(!db('friend')->where('id',$id)->update($data)){
				throw new Exception("4000004");
			} else {
				$this->success_response();
			}

		}catch(Exception $e){
			$this->error_response($e->getMessage());
		}
	}


	public function del()
	{
		$id = input('post.id');
		try{
			if(empty($id)){
				throw new Exception("100");
			}

			if(!db('friend')->where('id','=',$id)->delete()){
				throw new Exception("701");
			} else {
				$this->success_response();
			}

		}catch(Exception $e){
			$this->error_response($e->getMessage());
		}
	}


}
