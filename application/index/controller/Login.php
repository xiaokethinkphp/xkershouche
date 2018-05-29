<?php
namespace app\index\controller;
use \think\Controller;
class Login extends Controller
{
    public function index()
    {
        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    // 用户注册界面显示
    public function register()
    {

    }
}
