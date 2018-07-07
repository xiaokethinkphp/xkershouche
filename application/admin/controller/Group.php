<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 组控制器
 */
class Group extends Common
{
    public function lst(){
        $group_model = model('AuthGroup');
        $group_select = $group_model->getAuthGroupList();
        $this->assign('group',$group_select);
        return view();
    }

    public function add()
    {
        $this->getAuthList();
        return view();
    }

    private function getAuthList()
    {
        $auth_model = model("authRule");
        $auth_list = $auth_model->getAuthList();
        $this->assign("auth",$auth_list);
    }

    public function addhanddle()
    {
        if(!request()->isPost()){
            $this->redirect('admin/group/lst');
        }
        $post = input('post.');
        if (!isset($post['rules'])) {
            $this->error('请选择权限规则！');
        }
        $data = array();
        $data['title'] = input('post.title');
        $data['rules'] = implode(',', $post['rules']);
        $group_add_result = db("authGroup")->insert($data);
        if ($group_add_result) {
            $this->success("组添加成功",'admin/group/lst');
        } else {
            $this->error('组添加失败','admin/group/lst');
        }

    }

    public function checkAuthNameAjax()
    {
        if (!request()->isAjax()) {
            $this->redirect('admin/group/lst');
        }
        $validate = validate("Group");
        return $validate->check(input("post."));
    }

    public function changeStatus()
    {
        if (!request()->isAjax()) {
            $this->redirect('admin/group/lst');
        }
        $status_find = db("authGroup")->find(input('post.'));
        if (empty($status_find)) {
            return -1;
        }
        $status_upd_result = db('authGroup')->update([
            'id'    =>  input('post.id'),
            'status'    =>  1 xor $status_find['status']
        ]);
        if ($status_upd_result) {
            return 1 xor $status_find['status'];
        } else {
            return -1;
        }


    }

    public function upd($id='')
    {
        $group_find = Model('AuthGroup')->getAuth($id);
        $this->assign('group',$group_find);
        $this->getAuthList();
        return view();
    }

    public function updhanddle()
    {
        if (!request()->isPost()) {
            $this->redirect('admin/group/lst');
        }
        $post = input('post.');
        $data = array();
        $data['id'] = input('post.id');
        $data['title'] = input('post.title');
        $data['rules'] = implode(',', $post['rules']);
        $group_add_result = db("authGroup")->update($data);
        if ($group_add_result!==false) {
            $this->success("组修改成功",'admin/group/lst');
        } else {
            $this->error('组修改失败','admin/group/lst');
        }

    }

    public function del1($id='')
    {
        $group_del_result = db('authGroup')->delete($id);
        if ($group_del_result) {
            $this->success("组删除成功",'admin/group/lst');
        } else {
            $this->error('组删除失败','admin/group/lst');
        }
    }

    public function del($id='')
    {
        $group_model = Model("AuthGroup");
        $group_del_result = $group_model->delGroup($id);
        if ($group_del_result) {
            $this->success("组删除成功",'admin/group/lst');
        } else {
            $this->error('组删除失败','admin/group/lst');
        }
    }
}
