<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 新闻分类验证器
 */
class NewsCate extends Validate
{
    protected $rule = [
        'name'  =>  "require|length:1,10|unique:newsfenlei",
    ];

    protected $message = [
        'name.require'  =>  '分类名称不能为空',
        'name.length'   =>  '名称长度在1-10之间',
        'name.unique'   =>  '该分类已经存在',
    ];

    protected $scene = [
        'name'  =>  ['name'],
    ];
}
