<?php
namespace app\index\controller;

use think\Controller;
use think\Config;
use think\Exception;

class Index extends Controller
{
    public function index()
    {


        return view('index');

     }

}
