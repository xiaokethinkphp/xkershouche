<?php
namespace app\admin\model;
use \think\Model;
/**
 * 品牌模型
 */
class Brand extends Model
{
    static $arr = array();
    public function carmodel()
    {
        return $this->hasMany("Carmodel","carid");
    }

    public function brandGetData()
    {
        $brand_data = array();
        $brand_model_all = Brand::where("level",3)->select();
        $brand_select = db("brand")->select();
        foreach ($brand_model_all as $key => $value) {
            self::$arr = array();
            $brand_parents = $this->getParents($brand_select,$value['pid']);
            $value->carmodel;
            $brand_parents[] = $value->toArray();
            $brand_data[] = $brand_parents;
        }
        return $brand_data;
    }

    public function getParents($list,$pid)
    {

        foreach ($list as $key => $value) {
            if ($value['id']==$pid) {
                array_unshift(self::$arr,$value);
                $this->getParents($list,$value['pid']);
            }
        }
        return self::$arr;
    }

}
