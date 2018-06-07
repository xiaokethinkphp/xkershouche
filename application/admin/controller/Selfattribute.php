<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 自定义属性控制器
 * selfattribute
 */
class Selfattribute extends Controller
{
    public function lst()
    {
        $selfattribute_select = db("selfattribute")->paginate(5);
        $this->assign("self",$selfattribute_select);
        if (request()->isAjax()) {
            return view("paginate1");
        } else {
            return view();
        }
    }

    public function add()
    {
        return view();
    }

    public function addhanddle()
    {
        if (request()->isPost()) {
            $selfattribute_add_result = db('selfattribute')->insert(input('post.'));
            if ($selfattribute_add_result) {
                $this->success("自定义属性添加成功","admin/selfattribute/lst");
            } else {
                $this->error("自定义属性添加失败","admin/selfattribute/lst");
            }

        } else {
            $this->redirect("admin/selfattribute/lst");
        }

    }

    // 判断名称是否合法的ajax方法
    public function checkNameAjax()
    {
        if (request()->isAjax()) {
            $validate = validate("Selfattribute");
            return $validate->scene('name')->check(input('post.'));
        } else {
            $this->redirect("admin/selfattribute/lst");
        }

    }

    public function changeIsshowAjax()
    {
        if (request()->isAjax()) {
            $db = db("selfattribute")->find(input("post.id"));
            $db['isshow'] = ($db['isshow'] xor 1);
            db("selfattribute")->update($db);
            return $db['isshow'];
        } else {
            $this->redirect("admin/selfattribute/lst");
        }

    }
}
