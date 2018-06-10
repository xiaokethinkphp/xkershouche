<?php
namespace app\admin\model;
use \think\Model;
/**
 * 车源模型
 */
class Selfattribute extends Model
{
    public function cars()
    {
        return $this->belongsToMany("Cars",'cars_selfattribute','cars_id','selfattribute_id');
    }
}
