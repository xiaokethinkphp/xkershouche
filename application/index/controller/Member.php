<?php
namespace app\index\controller;
use \think\Controller;
/**
 * 用户控制器
 */
class Member extends Common
{
    // 用户中心
    public function membercenter()
    {
        $member_find = db("member")->find(cookie("id"));
        $this->assign("member_find",$member_find);


        return view();
    }

    // 用户登出
    public function logout()
    {
        cookie("member",null);
        $this->success("退出成功！",'index/login/login');
    }

    // 用户二手车列表
    public function ershouchelst()
    {
        return view('memberershouchelist');
    }

    // 用户二手车添加界面
    public function erchoucheadd()
    {
        $level_select = db("level")->select();
        $this->assign("level",$level_select);

        $selfattribute_select = db("selfattribute")
        ->where('isshow',1)
        ->order("order desc")
        ->select();
        $this->assign("self",$selfattribute_select);
        return view('memberershoucheadd');
    }

    public function brandJsonGet()
    {
        if (request()->isAjax()) {
            $member_model = model("Member");
            return $member_model->getBrand();
        } else {
            $this->redirect("index/member/membercenter");
        }

    }

    public function ershoucheaddhaddle1()
    {
        $post = input('post.');
        dump($post);
        // $arr1:关联模型数据
        $arr1 = array_slice($post,20,-1,true);
        // $arr2:表的数据
        $arr2 = array_diff($post,$arr1);
        db("cars")->insert($arr2);
        dump($arr2);
    }

    public function ershoucheaddhaddle()
    {
        if (request()->isPost()) {
            $arr1 = array();//关联模型数据
            $arr2 = array();//数据表数据
            foreach (input('post.') as $key => $value) {
                is_int($key)?$arr1[$key] = $value:$arr2[$key] = $value;
            }
            dump(input('post.'));
            dump($arr1);
            dump($arr2);
        } else {
            $this->redirect("index/member/membercenter");
        }

    }
}
