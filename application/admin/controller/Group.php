<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 组控制器
 */
class Group extends Controller
{
    public function lst(){
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
        db("authGroup")->insert($data);

    }

    public function checkAuthNameAjax()
    {
        if (!request()->isAjax()) {
            $this->redirect('admin/group/lst');
        }
        $validate = validate("Group");
        return $validate->check(input("post."));
    }
}
