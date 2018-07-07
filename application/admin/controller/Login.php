<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 后台登录控制器
 */
class Login extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function checkLogin()
    {
        if (!request()->isPost()) {
            $this->redirect('admin/login/index');
        }
        $admin_find = db('admin')->where([
            'name'  =>  input('post.name'),
            'password'  =>  md5(input('post.password')),
        ])->find();
        switch ($admin_find['status']) {
            case '0':
                $this->error("该管理员已被禁用，请联系超级管理员",'admin/login/index');
                break;
            case '1':
            case '2':
            cookie('admin',$admin_find);
            db('admin')->update([
                'last_login_ip' =>  request()->ip(),
                'last_login_time'   =>  strtotime('now'),
                'id'    =>  $admin_find['id']
            ]);
            $this->success("登录成功！",'admin/index/index');
            break;
            default:
                $this->error("管理员状态错误，请联系超级管理员",'admin/login/index');
                break;
        }
        if (!$admin_find) {

            $this->error('用户名或密码错误','admin/login/index');
        }
    }
}
