<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 品牌验证器
 */
class Level extends Validate
{
    protected $rule = [
        'name'  =>  "require|length:1,10|unique:level",
        'thumb'  =>  "require|unique:level",
    ];

    protected $message = [
        'name.require'  =>  '级别名称不能为空',
        'name.length'   =>  '名称长度在1-10之间',
        'name.unique'   =>  '该级别已经存在',
        'thumb.require'  =>  '级别图标不能为空',
        'thumb.unique'   =>  '该图标已经存在'
    ];

    protected $scene = [
        'name'  =>  ['name'],
        'thumb' =>  ['thumb']
    ];
}
