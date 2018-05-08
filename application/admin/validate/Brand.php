<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 品牌验证器
 */
class Brand extends Validate
{
    protected $rule = [
        'name'  =>  "require|length:1,10|unique:brand"
    ];

    protected $message = [
        'name.require'  =>  '品牌名称不能为空',
        'name.length'   =>  '名称长度在1-10之间',
        'name.unique'   =>  '该品牌已经存在'
    ];
}
