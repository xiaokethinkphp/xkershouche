<?php
namespace app\index\validate;
use \think\Validate;
/**
 * 品牌验证器
 */
class Member extends Validate
{
    protected $rule = [
        'member_name'  =>  "require|length:1,10|unique:member",
        'mobile_number'  =>  "require|length:11|unique:member",
        'province_id'   =>  "require",
        'city_id'   =>  "require",
        'county_id'   =>  "require",
        'member_password'   =>  'require|length:6,10',
    ];

    protected $message = [
        'member_name.require'  =>  '用户名不能为空',
        'member_name.length'   =>  '用户长度在1-10之间',
        'member_name.unique'   =>  '该用户已经存在',
        'mobile_number.require'  =>  '手机号不能为空',
        'mobile_number.length'   =>  '手机号长度不正确',
        'mobile_number.unique'   =>  '该手机已经被注册',
        'province_id.require'   =>  '请填写省份',
        'city_id.require'   =>  '请填写市',
        'county_id.require'   =>  '请填写县',

    ];

    protected $scene = [
        'member_name'  =>  ['member_name'],
        'mobile_number' =>  ['mobile_number']
    ];
}
