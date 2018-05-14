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
        ->order('type desc')->order('order desc')
        ->select();
        // 将得到的信息转换成数组
        $brand_model_all_toArray = $brand_model_all->toArray();
        // 进行无限级分类
        $brand_list = getChildren($brand_model_all_toArray);
        // 将其中首字母不是$initial的清除掉
        foreach ($brand_list as $key => $value) {
            if ($value['initial']!=$initial) {
                unset($brand_list[$key]);
            }
        }
        // 将变量分配到模板上
        $this->assign("brand_list",$brand_list);
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
            // 判断POST信息信息中的id情况，
            // 如果id为空，则说明是进行添加的操作
            // 如果不为空，则说明是进行修改的操作
            if (!empty($post['id'])) {
                $brand_find_result = db('brand')->where('id','neq',$post['id'])
                ->where('name',$post['name'])->find();
            } else{
                $brand_find_result = db('brand')->where("name",$post['name'])->find();
            }
            // 如果找到返回假，如果找不到返回真
            return !$brand_find_result;
        } else {
            $this->redirect("admin/brand/lst");
        }

    }

    // 使用Ajax进行品牌类型的更新
    public function changeTypeAjax()
    {
        // 判断是否是ajax请求
        if (request()->isAjax()) {
            // 获取POST信息
            $post = request()->post();
            // 获取对应品牌的信息
            $brand_find = db("brand")->find($post['id']);
            // 进行品牌信息的更新
            $brand_update_result = db("brand")->where("id",$post['id'])->update([
                'type'  =>  ($brand_find['type'] xor 1)
            ]);
            if ($brand_update_result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            // 不是则跳转到品牌列表界面
            $this->redirect("admin/brand/lst");
        }
    }

    public function changeOrderAjax()
    {
        // 判断是否是ajax请求
        if (request()->isAjax()) {
            // 获取POST信息
            $post = request()->post();
            // 进行品牌信息的更新
            $brand_update_result = db("brand")->where("id",$post['id'])->update([
                'order'  =>  $post['order']
            ]);
            if ($brand_update_result) {
                return 1;
            } else {
                return 0;
            }
        } else {
            // 不是则跳转到品牌列表界面
            $this->redirect("admin/brand/lst");
        }
    }

    // 品牌修改界面显示
    public function upd($id='')
    {
        // 获取对应id的品牌信息
        $brand_find = db("brand")->find($id);
        // 判断对应的信息是否存在，如果不存在则跳转到品牌列表界面
        if (!empty($brand_find)) {
            // 判断是否是顶级品牌，如果不是，则获取到母品牌的信息
            if ($brand_find['pid']!=0) {
                $brand_father_find = db("brand")->find($brand_find['pid']);
                $this->assign("brand_father_find",$brand_father_find);
            }
            $this->assign("brand_find",$brand_find);
        } else {
            // 不是则跳转到品牌列表界面
            $this->redirect("admin/brand/lst");
        }
        return view();
    }

    // 品牌修改提交处理
    public function updhanddle()
    {
        // 判断是否是post请求
        if (request()->isPost()) {
            // 获取POST信息
            $post = request()->post();
            // 获取被修改的品牌的数据
            $brand_find = db('brand')->find($post['id']);
            // 判断是否是顶级品牌
            if ($brand_find['level']==1) {
                // 获取file信息
                $file = request()->file('thumb');
                if (!empty($file)) {
                    // 进行文件的上传
                    $info = $file->validate(['size'=>2*1024*1024,'ext'=>'jpeg,jpg,png,gif'])
                    ->rule('uniqid')->move('../uploads/brand','');
                    // 判断是否上传成功
                    if ($info) {
                        // 将上传图片的信息写入到post当中
                        $post['thumb'] = $info->getSaveName();
                        // 将数据写入到数据库当中
                        $brand_update_result = db("brand")->update($post);
                        // 获取旧图片信息
                        $thumb_old = $brand_find['thumb'];
                        if ($brand_update_result!==false) {
                            // 新旧图片进行对比，如果图片一样，则说明新图片将老图片进行了替换，不用删除老图片
                            if ($thumb_old!=$post['thumb']) {
                                // 进行图片删除
                                if (file_exists("../uploads/brand/".$thumb_old)) {
                                    unlink("../uploads/brand/".$thumb_old);
                                }
                            }
                            $this->success("品牌修改成功",'admin/brand/lst');
                        } else {
                           if ($thumb_old!=$post['thumb']) {
                               // 进行图片删除
                               if (file_exists("../uploads/brand/".$post['thumb'])) {
                                   unlink("../uploads/brand/".$post['thumb']);
                               }
                           }
                           $this->error("品牌修改失败",'admin/brand/lst');
                        }
                    } else {
                        $this->error($file->getError(),'admin/brand/lst');
                    }
                } else {
                    // 进行数据更新
                    $brand_update_result = db("brand")->update($post);
                    if ($brand_update_result) {
                        $this->success('品牌修改成功','admin/brand/lst');
                    } else {
                        $this->error("品牌修改失败",'admin/brand/lst');
                    }
                }
            } else {
                // 进行数据更新
                $brand_update_result = db("brand")->update($post);
                if ($brand_update_result) {
                    $this->success('品牌修改成功','admin/brand/lst');
                } else {
                    $this->error("品牌修改失败",'admin/brand/lst');
                }
            }
        } else {
            // 如果不是则跳转到品牌列表界面
            $this->redirect("admin/brand/lst");
        }
    }
}
