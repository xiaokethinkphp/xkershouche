<?php
namespace app\admin\controller;

class Index extends Common
{
    public function index()
    {
        return view();
    }

    public function logout()
    {
        cookie('admin',null);
        $this->redirect("admin/login/index");
    }

    public function changePasswordSelf()
    {
        $admin_get = db('admin')->find(cookie('admin')['id']);
        if (!$admin_get) {
            $this->redirect("admin/admin/lst");
        }
        $this->assign('admin',$admin_get);
        return view();
    }

    public function changePasswordHanddle()
    {
        $post = input('post.');
        unset($post['repassword']);
        $post['password'] = md5($post['password']);
        $admin_changepwd_result = db('admin')->update($post);
        if ($admin_changepwd_result!==false) {
            $this->success("密码修改成功",'admin/index/index');
        } else{
            $this->error("密码修改失败",'admin/index/index');
        }
    }
}
