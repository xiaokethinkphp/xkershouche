<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *
 */
class Admin extends Common
{
    public function lst1()
    {
        $admin_select = db("admin")->select();
        $this->assign("admin",$admin_select);
        return view();
    }

    public function lst()
    {
        $admin_model = model("Admin");
        $admin_all = $admin_model->where('status','neq',2)->select();
        foreach ($admin_all as $key => $value) {
            $value->group;
        }
        $this->assign('admin',$admin_all);
        return view();
    }

    public function add()
    {
        $group_model = model('AuthGroup');
        $group_select = $group_model->getAuthGroupList($where='status=1');
        $this->assign('group',$group_select);
        // dump($group_select);
        return view();
    }

    public function addhanddle1()
    {
        $post = input('post.');
        $groups = $post['groups'];
        unset($post['groups']);
        unset($post['repassword']);
        $post['password'] = md5($post['password']);
        $post['last_login_time'] = strtotime('now');
        $post['last_login_ip'] = request()->ip();
        $id = db("admin")->insertGetId($post);
        $admin_model = model("Admin");
        $admin_get = $admin_model::get($id);
        $admin_get->group()->save($groups);
    }

    public function addhanddle()
    {
        $post = input('post.');
        $admin_model = model("Admin");
        $admin_add_result = $admin_model->adminAdd($post);
        $this->redirect("admin/admin/lst");
    }

    public function checkNameAjax()
    {
        if (!request()->isAjax()) {
            $this->redirect("admin/admin/lst");
        }
        $validate = validate("Admin");
        return $validate->scene('name')->check(input('post.'));
    }

    public function changePassword($id='')
    {
        $admin_get = db('admin')->find($id);
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
            $this->success("密码修改成功",'admin/admin/lst');
        } else{
            $this->error("密码修改失败",'admin/admin/lst');
        }
    }

    public function changeStatus()
    {
        if (!request()->isAjax()) {
            $this->redirect('admin/admin/lst');
        }
        $status_find = db("admin")->find(input('post.'));
        if (empty($status_find)) {
            return -1;
        }
        $status_upd_result = db('admin')->update([
            'id'    =>  input('post.id'),
            'status'    =>  1 xor $status_find['status']
        ]);
        if ($status_upd_result) {
            return 1 xor $status_find['status'];
        } else {
            return -1;
        }
    }

    public function changeAuth($id='')
    {
        $admin_model = model("Admin");
        $admin_get =$admin_model->field('id,name')->find($id);
        if (!$admin_get) {
            $this->redirect("admin/admin/lst");
        }
        $admin_get->group;
        $group = $admin_get['group']->toArray();
        $admin_get['groups'] = array_column($group, 'id');
        $this->assign('admin',$admin_get);
        // dump($admin_get);
        $group_model = model('AuthGroup');
        $group_select = $group_model->getAuthGroupList();
        $this->assign('group',$group_select);
        return view();
    }

    public function changAuthhanddle()
    {
        if (!request()->isPost()) {
            $this->redirect("admin/admin/lst");
        }
        $admin_model = Model("Admin");
        $post = input('post.');
        $admin_get = $admin_model->get($post['id']);
        \think\Db::transaction(function () use($post,$admin_get){
            db('authGroupAccess')->where('uid',$post['id'])->delete();
            $admin_get->group()->attach($post['groups']);
        });
    }

    public function del($id='')
    {
        $admin_model = Model("Admin");
        $admin_del_result = $admin_model->delAdmin($id);
        if ($admin_del_result) {
            $this->success("管理员删除成功",'admin/admin/lst');
        } else {
            $this->error("管理员删除失败",'admin/admin/lst');
        }

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
}
