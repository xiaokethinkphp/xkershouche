<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *规则控制器
 */
class Auth extends Controller
{
    public function lst()
    {
        $auth_model = model("authRule");
        $auth_list = $auth_model->getAuthList();
        $this->assign("auth",$auth_list);
        return view();
    }

    public function add()
    {
        $auth_model = model("authRule");
        $auth_list = $auth_model->getAuthList();
        $this->assign("auth",$auth_list);
        return view();
    }

    public function addhanddle()
    {
        $auth_add_result = db('authRule')->insert(input('post.'));
        if ($auth_add_result) {
            $this->success('权限规则添加成功','admin/auth/lst');
        } else{
            $this->error("权限规则添加失败",'admin/auth/lst');
        }
    }

    public function checkAuthNameAjax()
    {
        if (!request()->isAjax()) {
            $this->redirect('admin/auth/lst');
        }
        $validate = validate("Auth");
        return $validate->check(input("post."));
    }

    public function upd($id='')
    {

        $auth_find = db("authRule")->find($id);
        if (empty($auth_find)) {
            $this->redirect('admin/auth/lst');
        }
        $this->assign("auth_find",$auth_find);

        $auth_model = model("authRule");
        $auth_list = $auth_model->getAuthList();
        $this->assign("auth",$auth_list);
        return view();
    }

    public function updhanddle()
    {
        if (!request()->isPost()) {
            $this->redirect('admin/auth/lst');
        }
        $auth_upd_result = db("authRule")->update(input('post.'));
        if ($auth_upd_result!==false) {
            $this->success('权限规则修改成功','admin/auth/lst');
        } else{
            $this->error('权限规则修改失败','admin/auth/lst');
        }
    }

    public function del($id='')
    {
        $auth_model = model("AuthRule");
        if ($auth_model->delAuth($id)) {
            $this->success('规则删除成功','admin/auth/lst');
        } else {
            $this->error("规则删除失败",'admin/auth/lst');
        }

    }
}