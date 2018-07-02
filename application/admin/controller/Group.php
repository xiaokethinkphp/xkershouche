<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 组控制器
 */
class Group extends Controller
{
    public function lst(){
        $group_model = model('AuthGroup');
        $group_select = $group_model->getAuthGroupList();
        $this->assign('group',$group_select);
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
}
