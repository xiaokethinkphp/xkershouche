<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 公共控制器
 */
class Common extends Controller
{
    protected function initialize()
    {
        if(!cookie('admin')){
            $this->error("请先登录！",'admin/login/index');
        }
        if (cookie('admin')['status']!=2) {
            // code...
            $auth = new \app\index\controller\Auth();
            $request = strtolower(request()->module().'/'.request()->controller());
            // dump($request);
            if (!$auth->check($request,cookie('admin')['id'])) {
                $this->error('您没有该权限');
            }
        }
    }
}
