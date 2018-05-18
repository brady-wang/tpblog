<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\controller\MY_Controller;
class Tags extends MY_Controller
{
    public function index()
    {
        $tags = model("Tags");
        $list = $tags->paginate(config('per_page'),true);
        $this->assign('list',$list);
        return view('index');
     }


    public function add()
    {
        $tag_name = input('post.tag_name');
        if(input("?id")){
            $this->do_edit(input('post.id'),$tag_name);
        }else {
            $this->do_add($tag_name);
        }

    }

    public function del()
    {
        $id = input('post.id');
        try{
            if(empty($id)){
                throw new Exception("100");
            }

            if(!db('tags')->where('id','=',$id)->delete()){
                throw new Exception("4000001");
            } else {
                $this->success_response();
            }

        }catch(Exception $e){
            $this->error_response($e->getMessage());
        }
    }

    public function do_add($tag_name)
    {
        try{
            if(empty($tag_name)){
                throw new Exception("4000000");
            }

            $data = [
                'tag_name'=>$tag_name,
                'create_time'=>date("Y-m-d H:i:",time())
            ];
            if(!db('tags')->insert($data)){
                throw new Exception("4000001");
            } else {
                $this->success_response();
            }

        }catch(Exception $e){
            $this->error_response($e->getMessage());
        }
    }

    public function do_edit($id,$tag_name)
    {
        try{

            if(empty($id)){
                throw new Exception("100");
            }

            if(empty($tag_name)){
                throw new Exception("4000000");
            }

            $data = [
                'tag_name'=>$tag_name,
                'create_time'=>date("Y-m-d H:i:",time())
            ];
            if(!db('tags')->where('id',$id)->update($data)){
                throw new Exception("4000001");
            } else {
                $this->success_response();
            }

        }catch(Exception $e){
            $this->error_response($e->getMessage());
        }
    }


}
