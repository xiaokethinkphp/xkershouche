<?php
namespace app\index\controller;
use \think\Controller;
/**
 *
 */
class Cars extends Controller
{
    public function carsdetails($id='')
    {
        $cars_model = model('\app\admin\model\Cars');
        $car = $cars_model->getCarsInfo($id);
        // dump($car);
        $this->assign('car',$car);
        return view();
    }
}
