<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *车型控制器
 */
class Carmodel extends Controller
{
    // 车型列表显示
    public function lst()
    {
        return view();
    }

    // 添加车型界面显示
    public function add()
    {
        return view();
    }

    // 多级联动下拉列表ajax方法
    public function brandJsonGet()
    {
        if (request()->isAjax()) {
            $brand_select = db("brand")->select();
            return getChildren($brand_select);
        } else {
            $this->redirect("admin/carmodel/lst");
        }

    }

    public function addHanddle()
    {
        $post = request()->post();
        dump($post);
    }
}
