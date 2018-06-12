<?php
namespace app\admin\model;
use \think\Model;
/**
 * 车源模型
 */
class Carsimg extends Model
{

    public function cars()
    {
        return $this->belongsTo('Cars');
    }
}
