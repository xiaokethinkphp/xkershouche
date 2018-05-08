<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 品牌控制器
 */
class Brand extends Controller
{
    var $brand_model;//声明一个品牌模型
    public function __construct()
    {
        // 实例化品牌模型
        parent::__construct();
        $this->brand_model = model("Brand");
    }
    // 品牌列表
    public function lst($initial='A')
    {
        // 获取全部品牌的信息
        $brand_model_all = $this->brand_model
        ->where('initial',$initial)
        ->order('type desc')->order('order desc')
        ->select();
        // 将变量分配到模板上
        $this->assign("brand_model_all",$brand_model_all->toArray());
        return view();
    }
    // 添加品牌界面
    public function add($level=1,$pid=0)
    {
        $brand_parent_find = db('brand')->find($pid);
        if ($brand_parent_find) {
            $this->assign("brand_parent_find",$brand_parent_find);
        } else {
            $this->assign("brand_parent_find",'');
        }
        $this->assign("pid",$pid);
        $this->assign('level',$level);
        return view();
    }

    // 添加品牌提交处理
    public function addHanddle()
    {
       // 判断是否是POST请求，不是则跳转到品牌列表界面
       if (request()->isPost()) {
           // 获取POST信息
           $post = request()->post();
           // 实例化一个brand验证器
           $validate = validate("brand");
           // 进行验证，验证不通过则进行错误提示
           if ($validate->check($post)) {
               // 若果level为1，则进行图片的上传
               if ($post['level']==1) {
                   // 获取文件信息
                   $file = request()->file('thumb');
                   // 如果文件信息为空，则说明没有进行上传，返回错误
                   if (!empty($file)) {
                       // 移动到框架应用根目录/uploads/ 目录下
                       $info = $file
                       ->validate(['size'=>2*1024*1024,'ext'=>'jpeg,jpg,png,gif'])
                       ->rule('uniqid')
                       ->move( '../uploads/brand','');
                       // 如果上传成功，则将数据添加到数据库当中，如果上传失败，则返回错误信息
                       if ($info) {
                           // 将图片信息写入到post当中
                           $post['thumb'] = $info->getSaveName();
                           // 将数据写入到数据库当中
                           $brand_insert_result = db("brand")->insert($post);
                           // 判断数据是否插入成功
                           if ($brand_insert_result) {
                               $this->success("品牌添加成功",'admin/brand/lst');
                           } else {
                               $this->error("品牌添加失败");
                           }
                       } else {
                           // 上传失败，返回错误信息
                           $this->error($file->getError());
                       }
                   } else {
                       $this->error("请选择图片");
                   }
               } else {
                   // 不是添加母品牌的情况
                   $brand_insert_result = db("brand")->insert($post);
                   // 判断数据是否插入成功
                   if ($brand_insert_result) {
                       $this->success("品牌添加成功",'admin/brand/lst');
                   } else {
                       $this->error("品牌添加失败");
                   }
               }
           } else {
               $this->error($validate->getError());
           }
       } else {
           $this->redirect("admin/brand/lst");
       }
    }

    // 使用ajax进行品牌名称唯一性的检测
    public function checkNameAjax()
    {
        // 判断是否是ajax请求，不是则跳转到品牌列表界面
        if (request()->isAjax()) {
            // 获取POST信息
            $post = request()->post();
            // 查询品牌信息
            $brand_find_result = db('brand')->where("name",$post['name'])->find();
            // 如果找到返回假，如果找不到返回真
            return !$brand_find_result;
        } else {
            $this->redirect("admin/brand/lst");
        }

    }
}
