<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 权限验证器
 */
class Group extends Validate
{
    protected $rule = [
        'title'  =>  "require|unique:authGroup",
    ];

    protected $message = [
        'title.require'  =>  '管理员名称不能为空',
        'title.unique'   =>  '该管理员已经存在',
    ];

    protected $scene = [
        'title'  =>  ['name'],
    ];
}
