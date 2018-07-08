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
        if ($key&&$val) {
            $arr = array();
            if ($key=='level') {
                $arr['level']=['"level","eq",'.$val];
                cookie("level",$arr);
            } else if($key=='price'){
                if ($val==3) {
                    $arr['price']=['"price","lt","3"'];
                    cookie("price",$arr);
                } else if($val==5){
                    $arr['price']=['"price","between","3,5"'];
                    cookie("price",$arr);
                } else if($val==8){
                    $arr['price']=['"price","between","5,8"'];
                    cookie("price",$arr);
                }else if($val==12){
                    $arr['price']=['"price","between","8,12"'];
                    cookie("price",$arr);
                }else if($val==18){
                    $arr['price']=['"price","between","12,18"'];
                    cookie("price",$arr);
                }else if($val==24){
                    $arr['price']=['"price","between","18,24"'];
                    cookie("price",$arr);
                }else if($val==35){
                    $arr['price']=['"price","between","24,35"'];
                    cookie("price",$arr);
                }else if($val==50){
                    $arr['price']=['"price","between","35,50"'];
                    cookie("price",$arr);
                }else if($val==100){
                    $arr['price']=['"price","between","50,100"'];
                    cookie("price",$arr);
                }else if($val==999){
                    $arr['price']=['"price","gt","100"'];
                    cookie("price",$arr);
                }

            }else if($key=='plate'){
                if ($val == 1) {
                    $mytime=mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
                    $arr['plate']=['"plate","gt",'.$mytime];
                    cookie("plate",$arr);
                } else if($val==3) {
                    $mytime1=mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
                    $mytime2=mktime(0, 0, 0, date('m'), date('d'), date('Y')-3);
                    $arr['plate']=['"plate","bwtween","'.$mytime2.','.$mytime1.'"'];
                    cookie("plate",$arr);
                }else if($val==5) {
                    $mytime1=mktime(0, 0, 0, date('m'), date('d'), date('Y')-3);
                    $mytime2=mktime(0, 0, 0, date('m'), date('d'), date('Y')-5);
                    $arr['plate']=['"plate","bwtween","'.$mytime2.','.$mytime1.'"'];
                    cookie("plate",$arr);
                }else if($val==999) {
                    $mytime=mktime(0, 0, 0, date('m'), date('d'), date('Y')-5);
                    $arr['plate']=['"plate","gt",'.$mytime];
                    cookie("plate",$arr);
                }

            } else if($key=='gas'){
                if ($val=='1') {
                    $arr['gas']=['"gas","lt","1"'];
                    cookie("gas",$arr);
                } else if($val=='1.5'){
                    $arr['gas']=['"gas","bwtween","1.1,1.5"'];
                    cookie("gas",$arr);
                }else if($val=='2'){
                    $arr['gas']=['"gas","bwtween","1.6,2"'];
                    cookie("gas",$arr);
                }else if($val=='3'){
                    $arr['gas']=['"gas","bwtween","2.1,3"'];
                    cookie("gas",$arr);
                }else if($val==999){
                    $arr['gas']=['"gas","gt","3.1"'];
                    cookie("gas",$arr);
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
        $level_select = db('level')->select();
        $this->assign('level',$level_select);

        $buycars_model = model('\app\admin\model\Cars');
        $buycars_list = $buycars_model->getCarsList();
        // dump($buycars_list);
        $this->assign('buycars',$buycars_list);
        return view($view);
    }


}
