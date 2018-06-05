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
        return view('memberershoucheadd');
    }

    public function ershoucheaddhaddle()
    {
        dump(input('post.'));
    }
}
