<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 车辆级别控制器
 */
class Level extends Controller
{
    // 车辆级别列表
   public function lst()
   {
       return view();
   }

   // 车辆级别添加界面显示
   public function add()
   {
       return view();
   }

   public function addhanddle()
   {
       if (request()->isPost()) {
           $post = input('post.');
           $validate = validate("Level");
           if (!$validate->check($post)) {
               $this->error($validate->getError());
           } else {
               $level = db("level")->insert($post);
               if ($level) {
                   $this->success("级别插入成功",'admin/level/lst');
               } else {
                   $this->error("级别插入失败",'admin/level/lst');
               }

           }

       } else {
           $this->redirect("admin/level/lst");
       }
   }

   public function checkNameAjax()
   {
       if (request()->isAjax()) {
           $post = input('post.');
           $keys = array_keys($post);
           $key = $keys[0];
           $validate = validate("Level");
           if ($validate->scene($key)->check($post)) {
              return true;
          } else {
              return false;
          }
       } else{
           $this->redirect("admin/level/lst");
       }
   }
}
