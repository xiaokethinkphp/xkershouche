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
        $member_model = model("Member");
        $member_get = $member_model->get(cookie('member')['id']);
        $member_get->cars;
        foreach ($member_get['cars'] as $key => $value) {
            $value->carsimg;
        }
        dump($member_get);
        $this->assign('carslist',$member_get);
        return view('memberershouchelist');
    }

    // 用户二手车添加界面
    public function erchoucheadd()
    {
        session("cars_img",null);
        $level_select = db("level")->select();
        $this->assign("level",$level_select);

        $selfattribute_select = db("selfattribute")
        ->where('isshow',1)
        ->order("order desc")
        ->select();
        $this->assign("self",$selfattribute_select);
        return view('memberershoucheadd');
    }

    public function brandJsonGet()
    {
        if (request()->isAjax()) {
            $member_model = model("Member");
            return $member_model->getBrand();
        } else {
            $this->redirect("index/member/membercenter");
        }

    }

    public function ershoucheaddhaddle1()
    {
        $post = input('post.');
        dump($post);
        // $arr1:关联模型数据
        $arr1 = array_slice($post,20,-1,true);
        // $arr2:表的数据
        $arr2 = array_diff($post,$arr1);
        db("cars")->insert($arr2);
        dump($arr2);
    }

    public function ershoucheaddhaddle()
    {
        if (request()->isPost()) {
            $arr1 = array();//关联模型数据
            $arr2 = array();//数据表数据
            if(!session('?cars_img')){
                $this->error('请上传图片');
            };
            $arr3 = session('cars_img');//图片数据
            foreach (input('post.') as $key => $value) {
                is_int($key)?$arr1[$key] = $value:$arr2[$key] = $value;
            }
            $arr2['insurance'] = strtotime($arr2['insurance']);
            $arr2['inspect'] = strtotime($arr2['inspect']);
            $arr2['listtime'] = strtotime("now");
            $arr2['member_id'] = cookie('member')['id'];
            \think\Db::transaction(function () use($arr2,$arr1,$arr3){
                $cars_id = db("cars")->insertGetId($arr2);
                $cars_model = model('\app\admin\model\Cars');
                $cars_get = $cars_model->get($cars_id);
                foreach ($arr1 as $key => $value) {
                    // code...
                    $cars_get->selfattribute()->save($key,['selfattribute_value'=>$value]);
                }

                foreach($arr3 as $key => $value){
                    $cars_get->carsimg()->save(['url'=>$value]);
                }
            });
            $this->redirect("index/member/membercenter");
        } else {
            $this->redirect("index/member/membercenter");
        }

    }

    public function carsuploads()
    {
        // static $arr = array();
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../uploads/webuploaderdemo');
        if($info){
            // cookie('img',$arr);
            return $info->getSaveName();
        }
    }
    public function carsuploads0()
    {
        // static $arr = array();
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../uploads/cars');
        if($info){
            session('cars_img.'.$info->getSaveName(),'cars/'.$info->getSaveName());
            return $info->getSaveName();
        }
    }

    public function webuploader()
    {
        return view();
    }

    public function aa()
    {
        session('cars_img',null);
    }

    public function bb()
    {
        dump(session('cars_img'));
    }



}
