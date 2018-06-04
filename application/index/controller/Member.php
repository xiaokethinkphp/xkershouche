<?php
namespace app\index\controller;
use \think\Controller;
/**
 * 用户控制器
 */
class Member extends Common
{
    public function membercenter()
    {
        $member_find = db("member")->find(cookie("id"));
        $this->assign("member_find",$member_find);
        return view();
    }

    public function logout()
    {
        cookie("member",null);
        $this->success("退出成功！",'index/login/login');
    }
}
