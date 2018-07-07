<?php
namespace app\index\controller;
use \think\Controller;
/**
 *
 */
class Buycars extends Controller
{
    public function index()
    {
        $buycars_model = model('\app\admin\model\Cars');
        $buycars_list = $buycars_model->getCarsList();
        // dump($buycars_list);
        $this->assign('buycars',$buycars_list);
        return view();
    }
}
