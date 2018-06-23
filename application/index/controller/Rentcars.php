<?php
namespace app\index\controller;
use \think\Controller;
/**
 *
 */
class Rentcars extends Controller
{
    public function rentcarsdetails($id='')
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
        if ($rentcars_find['status']==0) {
            $this->error('该车辆已出租');
        }
        if ($rentcars_find['status']==-1) {
            $this->redirect('admin/rentcars/lst');
        }
        $this->assign('rentcars',$rentcars_find);
        return view();
    }
}
