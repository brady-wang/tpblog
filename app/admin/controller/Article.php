<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\controller\MY_Controller;

class Article extends MY_Controller
{


    public function index()
    {
        $article = model("Article");
        $list = $article->paginate(config('per_page'),true);
        $this->assign('list',$list);
        return view('index');
    }

    public function add()
    {

        if(input("?id")){
            $this->do_add(input('post.'));
        }else {
            return view();
        }
    }

    public function del()
    {
        $id = input('post.id');
        try{
            if(empty($id)){
                throw new Exception("100");
            }

            if(!db('cate')->where('id','=',$id)->delete()){
                throw new Exception("4000001");
            } else {
                $this->success_response();
            }

        }catch(Exception $e){
            $this->error_response($e->getMessage());
        }
    }

    public function do_add($cate_name)
    {
        try{
            if(empty($cate_name)){
                throw new Exception("4000000");
            }

            $data = [
                'cate_name'=>$cate_name,
                'create_time'=>date("Y-m-d H:i:",time())
            ];
            if(!db('cate')->insert($data)){
                throw new Exception("4000001");
            } else {
                $this->success_response();
            }

        }catch(Exception $e){
            $this->error_response($e->getMessage());
        }
    }

    public function do_edit($id,$cate_name)
    {
        try{

            if(empty($id)){
                throw new Exception("100");
            }

            if(empty($cate_name)){
                throw new Exception("4000000");
            }

            $data = [
                'cate_name'=>$cate_name,
                'create_time'=>date("Y-m-d H:i:",time())
            ];
            if(!db('cate')->where('id','=',$id)->update($data)){
                throw new Exception("4000001");
            } else {
                $this->success_response();
            }

        }catch(Exception $e){
            $this->error_response($e->getMessage());
        }
    }


}
