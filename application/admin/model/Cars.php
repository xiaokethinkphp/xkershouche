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
}