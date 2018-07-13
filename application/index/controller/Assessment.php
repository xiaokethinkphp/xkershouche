<?php
namespace app\index\controller;
use \think\Controller;
/**
 * 车源评估控制器
 */
class Assessment extends Controller
{
    public function index()
    {
        $current_year = date('Y',time());
        $arr = array();
        for ($i=0; $i < 10; $i++) {
            $arr[$i] = $current_year-$i;
        }
        $this->assign('years',$arr);

        $assessment_select = db('assessment')->where('assessment_price','neq','')->order('addtime desc')->limit(2)->select();
        $this->assign('assessment_list',$assessment_select);
        return view();
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

    public function assesshanddle()
    {

        if(!request()->isPost()){
            $this->redirect('index/assessment/index');
        }
        $post = input('post.');
        $post['full_name'] = db('brand')->where('id',$post['brand_level1'])->value('name')
        ." ".db('brand')->where('id',$post['brand_level2'])->value('name')
        ." ".db('brand')->where('id',$post['brand_level3'])->value('name')
        ." ".db('carmodel')->where('id',$post['carmodel'])->value('style')
        ." ".db('carmodel')->where('id',$post['carmodel'])->value('edition');

        $post['addtime'] = strtotime('now');
        $assessment_add_result = db('assessment')->insertGetId($post);
        if ($assessment_add_result) {
            $this->success('发布成功',url('index/assessment/assessresult',array('id'=>$assessment_add_result)));
        } else {
            $this->error("发布失败",'index/assessment/index');
        }


    }

    public function assessresult($id='')
    {
        $assessment_find = db('assessment')->find($id);
        if($assessment_find['assessment_price']){
            $this->assign('price',$assessment_find['assessment_price']);
            $this->assign("assessment",$assessment_find);
            return view('assessmentresult');
        }
        if (empty($assessment_find)) {
            $this->redirect('index/assessment/index');
        }
        $assessment_price = assessmentPrice($assessment_find['carmodel'],$assessment_find['year'],$assessment_find['month'],$assessment_find['kilometre']);
        if ($assessment_price=='') {
            $this->error('该车未被记录，无法估价','index/assessment/index');
        }
        db("assessment")->where("id",$id)->update(['assessment_price'=>$assessment_price]);
        $this->assign("price",$assessment_price);
        $this->assign("assessment",$assessment_find);
        return view('assessmentresult');
    }

}
