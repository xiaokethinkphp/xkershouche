<?php
namespace app\admin\controller;
use \think\Controller;
/**
 * 车源控制器
 */
class Cars extends Controller
{
    public function clearimg()
    {
        $imgs = getfiles2('../uploads/cars');
        foreach ($imgs as $key => $value) {
            $db = db('carsimg')->where('url',str_replace('../uploads/','',str_replace('\\','/',$value)))->find();
            if (!$db) {
                if (file_exists($value)) {
                    // code...
                    unlink($value);
                }
            }
        }
        $this->redirect('admin/cars/lst');
    }

    public function lst()
    {
        $cars_model = model("Cars");
        $cars_list = $cars_model->getCarsList();
        $this->assign("cars_list",$cars_list);
        // dump($cars_list);
        return view();
    }

    public function verify($id='')
    {
        $cars_model = model("Cars");
        $carsInfo = $cars_model->getCarsInfo($id);
        if (empty($carsInfo)) {
            $this->redirect('admin/cars/lst');
        }
        if ($carsInfo['status']!=2) {
            $this->error('该车辆已审核');
        }
        $this->assign('cars',$carsInfo);
        // dump($carsInfo);
        return view('upd');
    }

    public function verifyHanddle()
    {
        if (request()->isPost()) {
            $verify_result = db('cars')->where('id',input('post.id'))->update(['status'=>1]);
            if ($verify_result) {
                $this->success('操作成功','admin/cars/lst');
            } else {
                $this->error('操作失败','admin/cars/lst');
            }

        } else{
            $this->redirect("admin/cars/lst");
        }
    }

    public function del($id='')
    {
        $cars_del_result = db('cars')->delete($id);
        if ($cars_del_result) {
            $this->success('车辆删除成功','admin/cars/lst');
        } else {
            $this->error('车辆删除失败','admin/cars/lst');
        }

    }

    public function areaAjax()
    {
        if (request()->isAjax()) {
            $fileName = '../public/static/index/static/area.json';
            $string = file_get_contents($fileName);
            $data = json_decode($string,true);
            $arr = array();
            foreach ($data as $key => $value) {
                if ($value['code']==input('post.province_id')) {
                    $arr['province_name'] = $value['name'];
                    foreach ($value['children'] as $key1 => $value1) {
                        if ($value1['code']==input('post.city_id')) {
                            $arr['city_name'] = $value1['name'];
                            foreach ($value1['children'] as $key2 => $value2) {
                                if ($value2['code']==input('post.county_id')) {
                                    $arr['county_name'] = $value2['name'];
                                }
                            }
                        }
                    }
                }
            }
            return $arr;
        } else {
            $this->redirect("admin/cars/lst");
        }

    }

}
