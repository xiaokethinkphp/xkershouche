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
    }
}
