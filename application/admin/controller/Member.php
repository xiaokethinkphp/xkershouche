<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *
 */
class Member extends Controller
{
    public function lst()
    {
        $member_model = model('Member');
        $member_list = $member_model->getMemberList();
        $this->assign('member_list',$member_list);
        return view();
    }

    public function verify()
    {
        if (request()->isAjax()) {
            $status_upd_result = db('member')->where('id',input('post.id'))->update([
                'status'    =>  1
            ]);
            if ($status_upd_result) {
                return true;
            }else{
                return false;
            }
        } else{
            $this->redirect('admin/member/lst');
        }
    }

    public function del($id='')
    {
        $member_del_result = db('member')->delete($id);
        if ($member_del_result) {
            $this->success('删除成功','admin/member/lst');
        } else{
            $this->error('删除失败','admin/member/lst');
        }
    }

    public function clearimg()
    {
        $imgs = getfiles2('../uploads/member');
        foreach ($imgs as $key => $value) {
            $db = db('member')->where('thumb',str_replace('../uploads/','',str_replace('\\','/',$value)))->find();
            if (!$db) {
                if (file_exists($value)) {
                    // code...
                    unlink($value);
                }
            }
        }
        $this->redirect('admin/member/lst');
    }
}
