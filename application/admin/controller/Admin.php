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
        $admin_select = db("admin")->select();
        $this->assign("admin",$admin_select);
        return view();
    }

    public function add()
    {
        return view();
    }

    public function addhanddle()
    {
        $post = input('post.');
        unset($post['repassword']);
        $post['password'] = md5($post['password']);
        $post['last_login_time'] = strtotime('now');
        $post['last_login_ip'] = request()->ip();
        db("admin")->insert($post);
    }

    public function checkNameAjax()
    {
        if (!request()->isAjax()) {
            $this->redirect("admin/admin/lst");
        }
        $validate = validate("Admin");
        return $validate->scene('name')->check(input('post.'));
    }
}
