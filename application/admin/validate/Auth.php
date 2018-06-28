<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 权限验证器
 */
class Auth extends Validate
{
    protected $rule = [
        'name'  =>  "require|unique:authRule",
    ];

    protected $message = [
        'name.require'  =>  '管理员名称不能为空',
        'name.unique'   =>  '该管理员已经存在',
    ];

    protected $scene = [
        'name'  =>  ['name'],
    ];
}
