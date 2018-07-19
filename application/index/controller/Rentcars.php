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
        mobile_number,listtime,img,r.status as status,
        r.province_id as rprovince_id,r.city_id as rcity_id,
        r.county_id as rcounty_id,dayprice,monthprice,
        details'
        )->find($id);
        if (empty($rentcars_find)) {
            $this->redirect('index/rentcars/index');
        }
        if ($rentcars_find['status']==0) {
            $this->error('该车辆已出租');
        }
        if ($rentcars_find['status']==-1) {
            $this->redirect('index/rentcars/index');
        }
        $this->assign('rentcars',$rentcars_find);
        return view();
    }

    public function index($dayprice='',$where='')
    {
        switch (cookie('dayprice')) {
            case '100':
                $where[] = ['dayprice','lt','100'];

                break;
            case '200':
                $where[] = ['dayprice','between','100,200'];

                break;
            case '300':
                $where[] = ['dayprice','between','200,300'];

                break;
            case '400':
                $where[] = ['dayprice','between','300,400'];

                break;
            case '500':
                $where[] = ['dayprice','between','400,500'];

                break;
            case '999':
                $where[] = ['dayprice','gt','500'];

                break;
            default:
                // code...
                break;
        }
        $rentcars = db('rentcars')->where($where)->where('status','1')->paginate(2);
        $this->assign('rentcars',$rentcars);
        return view();
    }

    public function index2()
    {
        dump(cookie('aaa'));
    }
}
