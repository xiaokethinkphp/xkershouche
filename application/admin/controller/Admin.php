<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *
 */
class Admin extends Controller
{
    public function lst()
    {
        return view();
    }

    public function add()
    {
        return view();
    }

    public function addhanddle()
    {
        $post = input('post.');
        $post['password'] = md5($post['password']);
        $post['last_login_time'] = strtotime('now');
        $post['last_login_ip'] = request()->host();
        db("admin")->insert($post);
    }
}
