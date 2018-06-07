<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 自定义属性验证器
 */
class Selfattribute extends Validate
{
    protected $rule = [
        'name'  =>  "require|length:1,10|unique:selfattribute",
        'value'  =>  "require",
    ];

    protected $message = [
        'name.require'  =>  '自定义属性名称不能为空',
        'name.length'   =>  '自定义属性名称长度在1-10之间',
        'name.unique'   =>  '该自定义属性已经存在',
        'value.require'  =>  '取值不能为空',
    ];

    protected $scene = [
        'name'  =>  ['name'],
        'thumb' =>  ['thumb']
    ];
}
