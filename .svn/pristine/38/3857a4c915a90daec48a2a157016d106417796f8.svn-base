<?php

/**
 * Created by PhpStorm.
 * User: brady
 * Date: 2018/5/18
 * Time: 10:20
 */
namespace app\admin\model;
use think\model;

class Admin extends Model
{
    protected $table = 'admin';

    public function login($data)
    {
        $data = db($this->table)->where('username','=',$data['username'])->where('password','=',md5($data['password']))->find();
        if($data){
            unset($data['password']);
            session('admin_info',$data);
            return true;
        } else{
            return false;
        }
    }

//    protected function formatDateTime($time, $format, $timestamp = false)
//    {
//        return $time;
//    }
}