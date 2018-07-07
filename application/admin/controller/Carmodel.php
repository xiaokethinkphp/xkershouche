<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *车型控制器
 */
class Carmodel extends Common
{
    // 车型列表显示
    public function lst($initial="A")
    {
        $alpha = array('A','B','C','D','E',
        'F','G','H','I','J','K','L','M','N',
        'O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $this->assign('az',$alpha);
        $brand_model = model("Brand");
        // $brand_get = $brand_model->get(56);
        // $brand_pid = $brand_get['pid'];
        // $brand_select = db('brand')->select();
        // $brand_parents = getParents($brand_select,$brand_pid);
        // $brand_get->carmodel;
        // $brand_parents[] = $brand_get->toArray();
        $brand_data = $brand_model->brandGetData($initial);
        $this->assign("brand_data",$brand_data);
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

    // 车型修改界面显示
    public function upd($id='')
    {
        $carmodel_find = db("carmodel")->find($id);
        if ($carmodel_find) {
            $this->assign('carmodel_find',$carmodel_find);

            $current_year = date("Y");
            $years = array();
            for ($i=0; $i < 20; $i++) {
                $years[$i] = $current_year-$i;
            }
            $this->assign("years",$years);

            $brand_model = model("Brand");
            $brand_select = db("brand")->select();
            $carmodel_parents = $brand_model->getParents($brand_select,$carmodel_find['carid']);
            $this->assign('carmodel_parents',$carmodel_parents);
            return view();
        } else {
            $this->redirect("admin/carmodel/lst");
        }
    }

    // 车型修改提交处理
    public function updhanddle()
    {
        if (request()->isPost()) {
            $post = request()->post();
            $carmodel_upd_result = db("carmodel")->update($post);
            if ($carmodel_upd_result!==false) {
                $this->success("车型修改成功",'admin/carmodel/lst');
            } else {
                $this->error("车型修改失败",'admin/carmodel/lst');
            }

        } else {
            $this->redirect("admin/carmodel/lst");
        }

    }

    public function del($id='')
    {
        $carmodel_del_result = db("carmodel")->delete($id);
        if ($carmodel_del_result) {
            $this->success("车型删除成功",'admin/carmodel/lst');
        } else {
            $this->error("车型删除失败",'admin/carmodel/lst');
        }
    }
}
