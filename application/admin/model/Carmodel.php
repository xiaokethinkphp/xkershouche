<?php
namespace app\admin\model;
use \think\Model;
/**
 * 车型模型
 */
class Carmodel extends Model
{
    public function brand()
    {
        return $this->belongsTo("Brand");
    }
}
