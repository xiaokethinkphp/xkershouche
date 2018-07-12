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
        $brand_select = db("brand")->select();
        $brand_list = getChildren($brand_select);

        $level_select = db('level')->select();
        $this->assign('level',$level_select);
        $level_id_name = array_column($level_select, 'name','id');

        if ($key) {
            $arr = array();
            if ($key=='level') {
                if ($val) {
                    $arr['where']=['level','=',$val];
                    $arr['name'] = $level_id_name[$val];
                    cookie("level",$arr);
                } else {
                   cookie("level",null);
                }

            } else if($key=='price'){
                if ($val==3) {
                    $arr['where'] = ['price','lt','3'];
                    $arr['name'] = '3万以下';
                    cookie("price",$arr);
                } else if($val==5){
                    $arr['where'] = ['price','between','3,5'];
                    $arr['name'] = '3-5万';
                    cookie("price",$arr);
                } else if($val==8){
                    $arr['where'] = ['price','between','5,8'];
                    $arr['name'] = '5-8万';
                    cookie("price",$arr);
                }else if($val==12){
                    $arr['where']=['price','between','8,12'];
                    $arr['name'] = '8-12万';
                    cookie("price",$arr);
                }else if($val==18){
                    $arr['where']=['price','between','12,18'];
                    $arr['name'] = '12-18万';
                    cookie("price",$arr);
                }else if($val==24){
                    $arr['where']=['price','between','18,24'];
                    $arr['name'] = '18-24万';
                    cookie("price",$arr);
                }else if($val==35){
                    $arr['where']=['price','between','24,35'];
                    $arr['name'] = '24-35万';
                    cookie("price",$arr);
                }else if($val==50){
                    $arr['where']=['price','between','35,50'];
                    $arr['name'] = '35-50万';
                    cookie("price",$arr);
                }else if($val==100){
                    $arr['where']=['price','between','50,100'];
                    $arr['name'] = '50-100万';
                    cookie("price",$arr);
                }else if($val==999){
                    $arr['where']=['price','gt','100'];
                    $arr['name'] = '100万以上';
                    cookie("price",$arr);
                }else if($val==''){
                    cookie("price",null);
                }

            }else if($key=='plate'){
                if ($val == 1) {
                    $mytime=mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
                    $arr['where']=['plate','gt',$mytime];
                    $arr['name']='1年以内';
                    cookie("plate",$arr);
                } else if($val==3) {
                    $mytime1=mktime(0, 0, 0, date('m'), date('d'), date('Y')-1);
                    $mytime2=mktime(0, 0, 0, date('m'), date('d'), date('Y')-3);
                    $arr['where']=['plate','between',$mytime2.','.$mytime1];
                    $arr['name']='1-3年';
                    cookie("plate",$arr);
                }else if($val==5) {
                    $mytime1=mktime(0, 0, 0, date('m'), date('d'), date('Y')-3);
                    $mytime2=mktime(0, 0, 0, date('m'), date('d'), date('Y')-5);
                    $arr['where']=['plate','between',$mytime2.','.$mytime1];
                    $arr['name']='3-5年';
                    cookie("plate",$arr);
                }else if($val==999) {
                    $mytime=mktime(0, 0, 0, date('m'), date('d'), date('Y')-5);
                    $arr['where']=['plate','lt',$mytime];
                    $arr['name']='5年以上';
                    cookie("plate",$arr);
                }else if($val==''){
                    cookie("plate",null);
                }

            } else if($key=='gas'){
                if ($val=='1') {
                    $arr['where']=['gas','elt','1.0'];
                    $arr['name']='1.0L以下';
                    cookie("gas",$arr);
                } else if($val=='1.5'){
                    $arr['where']=['gas','between','1.1,1.5'];
                    $arr['name']='1.1L-1.5L';
                    cookie("gas",$arr);
                }else if($val=='2'){
                    $arr['where']=['gas','between','1.6,2'];
                    $arr['name']='1.6L-2.0L';
                    cookie("gas",$arr);
                }else if($val=='3'){
                    $arr['where']=['gas','between','2.1,3'];
                    $arr['name']='2.1L-3.0L';
                    cookie("gas",$arr);
                }else if($val==999){
                    $arr['where']=['gas','gt','3.1'];
                    $arr['name']='3.0L以上';
                    cookie("gas",$arr);
                }else if($val==''){
                    cookie("gas",null);
                }
            }
        }

        if ($order&&(!input('?get.page'))) {
            if($order=='listtime'){
                if (!cookie('?listtime')|cookie('listtime')=='desc') {
                    cookie('listtime','asc');
                } else{
                    if(cookie('listtime')=='asc'){
                        cookie('listtime','desc');
                    }
                }
                // cookie('listtime',null);
                cookie('priceorder',null);
                cookie('kilometer',null);
                cookie('plateorder',null);
                // $order='listtime'.' '.cookie('listtime');
            }else if($order=='price'){
                if (!cookie('?priceorder')|cookie('priceorder')=='desc') {
                    cookie('priceorder','asc');
                } else{
                    if(cookie('priceorder')=='asc'){
                        cookie('priceorder','desc');
                    }
                }
                cookie('listtime',null);
                // cookie('priceorder',null);
                cookie('kilometer',null);
                cookie('plateorder',null);
            }else if($order=='kilometer'){
                if (!cookie('?kilometer')|cookie('kilometer')=='desc') {
                    cookie('kilometer','asc');
                } else{
                    if(cookie('kilometer')=='asc'){
                        cookie('kilometer','desc');
                    }
                }
                cookie('listtime',null);
                cookie('priceorder',null);
                // cookie('kilometer',null);
                cookie('plateorder',null);
            }else if($order=='plate'){
                if (!cookie('?plateorder')|cookie('plateorder')=='desc') {
                    cookie('plateorder','asc');
                } else{
                    if(cookie('plateorder')=='asc'){
                        cookie('plateorder','desc');
                    }
                }
                cookie('listtime',null);
                cookie('priceorder',null);
                cookie('kilometer',null);
                // cookie('plateorder',null);
            }

        }
        if (request()->isAjax()) {
            $post = input('post.');
            if ($post['brand_level']=='brand_level1') {
                cookie('brand_level1',null);
                cookie('brand_level2',null);
                cookie('brand_level3',null);
                if ($post['id'] == '') {
                    return;
                }
                $arr['id'] = $post['id'];
                $arr['where'] = ['brand_level1','eq',$post['id']];
                $arr['name'] = $post['name'];
                cookie('brand_level1',$arr);
                return 1;
            } else if($post['brand_level'] == 'brand_level2'){
                cookie('brand_level2',null);
                cookie('brand_level3',null);
                if ($post['id'] == '') {
                    return;
                }
                $arr['id'] = $post['id'];
                $arr['where'] = ['brand_level2','eq',$post['id']];
                $arr['name'] = $post['name'];
                cookie('brand_level2',$arr);
                return 1;
            } else if($post['brand_level'] == 'brand_level3'){
                cookie('brand_level3',null);
                if ($post['id'] == '') {
                    return;
                }
                $arr['id'] = $post['id'];
                $arr['where'] = ['brand_level3','eq',$post['id']];
                $arr['name'] = $post['name'];
                cookie('brand_level3',$arr);
                return 1;
            }

        }
        if (cookie('?listtime')) {
            $order = 'listtime'.' '.cookie('listtime');
        }
        if (cookie('?kilometer')) {
            $order = 'kilometer'.' '.cookie('kilometer');
        }
        if (cookie('?priceorder')) {
            $order = 'price'.' '.cookie('priceorder');
        }
        if (cookie('?plateorder')) {
            $order = 'plate'.' '.cookie('plateorder');
        }
        // dump(cookie('level'));
        // dump(cookie("price"));
        // dump(cookie('plate'));
        // dump(cookie('gas'));
        dump(cookie('plateorder'));
        // cookie('price',null);
        // dump(cookie('brand_level1'));
        // dump(cookie('brand_level2'));
        // dump(cookie('brand_level3'));
        // dump(cookie('paginate'));
        // $where1 = array();
        if ($paginate=='') {
            $paginate = cookie('?paginate')?cookie('paginate'):2;
        } else{
            if (cookie('?paginate')) {
                if (cookie('paginate')!=$paginate) {
                    cookie('paginate',$paginate);
                };
            } else{
                cookie('paginate',$paginate);
                $paginate = cookie('paginate');
            }
        }
        // dump(cookie('paginate'));
        // dump(cookie('paginate',null));die;
        if (isset(cookie('level')['where'])) {
            $where1[] = cookie('level')['where'];
        }
        if (isset(cookie('price')['where'])) {
            $where1[] = cookie('price')['where'];
        }
        if (isset(cookie('plate')['where'])) {
            $where1[] = cookie('plate')['where'];
        }
        if (isset(cookie('gas')['where'])) {
            $where1[] = cookie('gas')['where'];
        }
        if (isset(cookie('brand_level1')['where'])) {
            $where1[] = cookie('brand_level1')['where'];
        }
        if (isset(cookie('brand_level2')['where'])) {
            $where1[] = cookie('brand_level2')['where'];
        }
        if (isset(cookie('brand_level3')['where'])) {
            $where1[] = cookie('brand_level3')['where'];
        }
        $where1 = empty($where1)?'':$where1;
        // dump($where1);
        $buycars_model = model('\app\admin\model\Cars');
        $buycars_list = $buycars_model->getCarsList($paginate,$where1,$order);
        // dump($buycars_list);
        $this->assign('buycars',$buycars_list);
        return view($view);
    }

    public function brandJsonGet()
    {
        if (request()->isAjax()) {
            $brand_select = db('brand')->select();
            $brand_list = getChildren($brand_select);
            return $brand_list;
        }else{
            $this->redirect("index/buycars/indx");
        }

    }

    public function clearbrand($level='',$view="indexlist"){
        switch ($level) {
            case '1':
                cookie('brand_level1',null);
                cookie('brand_level2',null);
                cookie('brand_level3',null);
                break;
            case '2':
                cookie('brand_level2',null);
                cookie('brand_level3',null);
                break;
            case '3':
                cookie('brand_level3',null);
                break;
            default:
                // code...
                break;
        }
        $this->redirect(url('index/buycars/index',array('view'=>$view)));
    }

    public function clearCondition($view='indexlist')
    {
        cookie('level',null);
        cookie('price',null);
        cookie('plate',null);
        cookie('gas',null);
        cookie('brand_level1',null);
        cookie('brand_level2',null);
        cookie('brand_level3',null);
        $this->redirect(url('index/buycars/index',array("view"=>$view)));
    }

}
