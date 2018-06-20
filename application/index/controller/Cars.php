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
        switch ($car['status']) {
            case '0':
                $this->error('该车辆已下架');
                break;

            case '-1':
                $this->error('该车辆已出售');
                break;

            case '2':
                $this->error('该车辆未被审核');
                break;

            default:
                // code...
                $this->assign('car',$car);
                return view();
                break;
        }
    }


}
