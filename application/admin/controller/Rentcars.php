<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 租车控制器
 */
class Rentcars extends Controller
{
    public function lst()
    {
        $rentcars_select = db('rentcars')
        ->alias('r')
        ->join('member m','r.member_id=m.id')
        ->field('r.id as rid,title,full_name,member_name,mobile_number,listtime,img,r.status as status');
        if (request()->isAjax()) {
            $rentcars_select = $rentcars_select->where('r.county_id',input('post.county_id'))->select();
            $this->assign('rentcars',$rentcars_select);
            return view("ajaxpage");
        } else {
            $rentcars_select = $rentcars_select->paginate(2);
            $this->assign('rentcars',$rentcars_select);
            return view();
        }

    }

    public function clearimg()
    {
        $imgs = getfiles2('../uploads/rentcars');
        foreach ($imgs as $key => $value) {
            $db = db('rentcars')->where('img',str_replace('../uploads/','',str_replace('\\','/',$value)))->find();
            if (!$db) {
                if (file_exists($value)) {
                    // code...
                    unlink($value);
                }
            }
        }
        $this->redirect('admin/rentcars/lst');
    }

    public function verify($id='')
    {
        $rentcars_find = db("rentcars")->alias('r')
        ->join('member m','r.member_id=m.id')
        ->field('r.id as rid,title,full_name,member_name,
        mobile_number,listtime,img,status,
        r.province_id as rprovince_id,r.city_id as rcity_id,
        r.county_id as rcounty_id,dayprice,monthprice,
        details'
        )->find($id);
        if (empty($rentcars_find)) {
            $this->redirect('admin/rentcars/lst');
        }
        $this->assign('rentcars_find',$rentcars_find);
        return view('upd');
    }

    public function verifyhanddle()
    {
        if (request()->isPost()) {
            $rentcars_upd_result = db('rentcars')->where('id',input('post.id'))->update(['status'=>1]);
            if ($rentcars_upd_result) {
                $this->success('操作成功','admin/rentcars/lst');
            } else {
                $this->error('操作失败','admin/rentcars/lst');
            }

        } else {
            $this->redirect('admin/rentcars/lst');
        }

    }

    public function del($id='')
    {
        $rentcars_del_result = db('rentcars')->delete($id);
        if ($rentcars_del_result) {
            $this->success('删除成功','admin/rentcars/lst');
        } else {
            $this->error('删除失败','admin/rentcars/lst');
        }

    }

}
