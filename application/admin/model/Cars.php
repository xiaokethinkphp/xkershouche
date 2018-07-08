<?php
namespace app\admin\model;
use \think\Model;
/**
 * 车源模型
 */
class Cars extends Model
{
    public function selfattribute()
    {
        return $this->belongsToMany("Selfattribute",'cars_selfattribute','selfattribute_id','cars_id');
    }

    public function carsimg()
    {
        return $this->hasMany('Carsimg');
    }

    public function member()
    {
        return $this->belongsTo('\app\index\model\Member');
    }

    public function getCarsInfo($id='')
    {
        $cars_get = Cars::get($id);
        if (empty($cars_get)) {
            return false;
        } else {
            $level_find = db("level")->where('id',$cars_get['level'])->value('name');
            $cars_get['level_name'] = $level_find;
            $cars_get->carsimg;
            $cars_get->member;
            $cars_get->selfattribute;
            return $cars_get;
        }
    }

    public function getCarsList($paginate=5,$where='')
    {
        $cars_list = Cars::where($where)->paginate($paginate)->each(function($value,$key){
            $level_find = db("level")->where('id',$value['level'])->value('name');
            $value['level_name'] = $level_find;
            $value->carsimg;
            $value->member;
            $value->selfattribute;
            $value['area'] = getArea($value['province_id'],$value['city_id'],$value['county_id']);
        });
        return $cars_list;
    }


}
