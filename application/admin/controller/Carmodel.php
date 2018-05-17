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
        $alpha = array('A','B','C','D','E',
        'F','G','H','I','J','K','L','M','N',
        'O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $this->assign('az',$alpha);
        return view();
    }

    // 添加车型界面显示
    public function add()
    {
        // 获取当前年份
        $current_year = date("Y");
        $years = array();
        for ($i=0; $i < 20; $i++) {
            $years[$i] = $current_year-$i;
        }
        $this->assign("years",$years);
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

    // 车型添加提交方法
    public function addHanddle()
    {
        $post = request()->post();
        $validate = validate("Carmodel");
        if (!$validate->check($post)) {
            $this->error($validate->getError());
        }
        $carmodel_insert_result = db("carmodel")->insert($post);
        if ($carmodel_insert_result) {
            $this->success("车型添加成功",'admin/carmodel/lst');
        }else {
            $this->error("车型添加失败",'admin/carmodel/lst');
        }
    }


    // 验证表单的ajax方法
    public function checkEditionAjax()
    {
        if (request()->isAjax()) {
            $post = request()->post();
            $validate = validate("Carmodel");
            return $validate->check($post);
        } else {
            $this->redirect("admin/carmodel/lst");
        }

    }
}
