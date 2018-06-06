<?php
namespace app\index\model;
use\think\Model;
/**
 * 用户模型
 */
class Member extends Model
{
    public function getBrand()
    {
        $brand_select = db("brand")->select();
        $brand_children = getChildren($brand_select);
        $brand_model = model("\app\admin\model\Brand");
        foreach ($brand_children as $key => $value) {
            foreach ($value['children'] as $key1 => $value1) {
                foreach ($value1['children'] as $key2 => $value2) {
                   $brand_get = $brand_model->get($value2['id']);
                   $carmodel = $brand_get->carmodel()->order('style desc')->select();
                   $carmodel = $carmodel->toArray();
                   foreach ($carmodel as $key3 => $value3) {
                       $carmodel[$key3]['name'] = $value3['style'].'款 '.$value3['edition'];
                   }
                   $brand_children[$key]['children'][$key1]['children'][$key2]['children'] = $carmodel;
               }
            }
        }
        return $brand_children;
    }
}
