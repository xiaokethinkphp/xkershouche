<?php
namespace app\index\controller;
use \think\Controller;
/**
 * 公共控制器
 */
class Common extends Controller
{
    protected function initialize()
    {
        if(!cookie('member')){
            $this->error("请先登录！",'index/login/login');
        }
    }
}
