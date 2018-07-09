<?php
namespace app\index\controller;
use \think\Controller;
/**
 *
 */
class Buycars extends Controller
{
    public function index($key='',$val='',$order='',$paginate='',$view='indexlist')
    {
        $level_select = db('level')->select();
        $this->assign('level',$level_select);
        $level_id_name = array_column($level_select, 'name','id');

        if ($key) {
            $arr = array();
            if ($key=='level') {
                if ($val) {
                    $arr['where']='"level","eq",'.$val;
                    $arr['name'] = $level_id_name[$val];
                    cookie("level",$arr);
                } else {
                   cookie("level",null);
                }

            } else if($key=='price'){
                if ($val==3) {
                    $arr['where'] = '"price","lt","3"';
                    $arr['name'] = '3万以下';
                    cookie("price",$arr);
                } else if($val==5){
                    $arr['where']='"price","between","3,5"';
                    $arr['name'] = '3-5万';
                    cookie("price",$arr);
                } else if($val==8){
                    $arr['where']='"price","between","5,8"';
                    $arr['name'] = '5-8万';
                    cookie("price",$arr);
                }else if($val==12){
                    $arr['where']='"price","between","8,12"';
                    $arr['name'] = '8-12万';
                    cookie("price",$arr);
                }else if($val==18){
                    $arr['where']='"price","between","12,18"';
                    $arr['name'] = '12-18万';
                    cookie("price",$arr);
                }else if($val==24){
                    $arr['where']='"price","between","18,24"';
                    $arr['name'] = '18-24万';
                    cookie("price",$arr);
                }else if($val==35){
                    $arr['where']='"price","between","24,35"';
                    $arr['name'] = '24-35万';
                    cookie("price",$arr);
                }else if($val==50){
                    $arr['where']='"price","between","35,50"';
                    $arr['name'] = '35-50万';
                    cookie("price",$arr);
                }else if($val==100){
                    $arr['where']='"price","between","50,100"';
                    $arr['name'] = '50-100万';
                    cookie("price",$arr);
                }else if($val==999){
                    $arr['where']='"price","gt","100"';
                    $arr['name'] = '100万以上';
                    cookie("price",$arr);
                }else if($val==''){
                    cookie("price",null);
                }

            }else if($key=='plate'){
                if ($val == 1) {
                    $mytime=mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
                    $arr['where']='"plate","gt",'.$mytime;
                    $arr['name']='1年以内';
                    cookie("plate",$arr);
                } else if($val==3) {
                    $mytime1=mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
                    $mytime2=mktime(0, 0, 0, date('m'), date('d'), date('Y')-3);
                    $arr['where']='"plate","bwtween","'.$mytime2.','.$mytime1.'"';
                    $arr['name']='1-3年';
                    cookie("plate",$arr);
                }else if($val==5) {
                    $mytime1=mktime(0, 0, 0, date('m'), date('d'), date('Y')-3);
                    $mytime2=mktime(0, 0, 0, date('m'), date('d'), date('Y')-5);
                    $arr['where']='"plate","bwtween","'.$mytime2.','.$mytime1.'"';
                    $arr['name']='3-5年';
                    cookie("plate",$arr);
                }else if($val==999) {
                    $mytime=mktime(0, 0, 0, date('m'), date('d'), date('Y')-5);
                    $arr['where']='"plate","gt",'.$mytime;
                    $arr['name']='5年以上';
                    cookie("plate",$arr);
                }else if($val==''){
                    cookie("plate",null);
                }

            } else if($key=='gas'){
                if ($val=='1') {
                    $arr['where']='"gas","lt","1"';
                    $arr['name']='1.0L以下';
                    cookie("gas",$arr);
                } else if($val=='1.5'){
                    $arr['where']='"gas","bwtween","1.1,1.5"';
                    $arr['name']='1.1L-1.5L';
                    cookie("gas",$arr);
                }else if($val=='2'){
                    $arr['where']='"gas","bwtween","1.6,2"';
                    $arr['name']='1.6L-2.0L';
                    cookie("gas",$arr);
                }else if($val=='3'){
                    $arr['where']='"gas","bwtween","2.1,3"';
                    $arr['name']='2.1L-3.0L';
                    cookie("gas",$arr);
                }else if($val==999){
                    $arr['where']='"gas","gt","3.1"';
                    $arr['name']='3.0L以上';
                    cookie("gas",$arr);
                }else if($val==''){
                    cookie("gas",null);
                }
            }
        }

        if ($order) {
            if($order=='listtime'){
                if (!cookie('?listtime')) {
                    cookie('listtime','asc');
                } else{
                    if(cookie('listtime')=='asc'){
                        cookie('listtime','desc');
                    }
                }
            }else if($order=='price'){
                if (!cookie('?price')) {
                    cookie('price','asc');
                } else{
                    if(cookie('price')=='asc'){
                        cookie('price','desc');
                    }
                }
            }else if($order=='kilometer'){
                if (!cookie('?kilometer')) {
                    cookie('kilometer','asc');
                } else{
                    if(cookie('kilometer')=='asc'){
                        cookie('kilometer','desc');
                    }
                }
            }if($order=='plate'){
                if (!cookie('?plateorder')) {
                    cookie('plateorder','asc');
                } else{
                    if(cookie('plateorder')=='asc'){
                        cookie('plateorder','desc');
                    }
                }
            }

        }
        dump(cookie('level'));
        dump(cookie("price"));
        dump(cookie('plate'));
        dump(cookie('gas'));
        dump(cookie('listtime'));
        // cookie('where',null);

        $buycars_model = model('\app\admin\model\Cars');
        $buycars_list = $buycars_model->getCarsList();
        // dump($buycars_list);
        $this->assign('buycars',$buycars_list);
        return view($view);
    }


}
