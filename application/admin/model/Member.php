<?php
namespace app\admin\model;
use \think\Model;
/**
 *
 */
class Member extends Model
{
    public function getMemberList()
    {
        $member_all = Member::paginate(1)->each(function($item, $key){
            $item['area'] = getArea($item['province_id'],$item['city_id'],$item['county_id']);
        });
        return $member_all;
    }


}
