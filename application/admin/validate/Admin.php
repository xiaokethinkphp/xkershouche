<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 品牌验证器
 */
class Admin extends Validate
{
    protected $rule = [
        'name'  =>  "require|length:1,10|unique:admin",
        'password'  =>  "require|length:6,10",
    ];

    protected $message = [
        'name.require'  =>  '管理员名称不能为空',
        'name.length'   =>  '名称长度在1-10之间',
        'name.unique'   =>  '该管理员已经存在',
        'password.require'  =>  '密码不能为空',
        'password.length'   =>  '密码长度在6-10位之间'
    ];

    protected $scene = [
        'name'  =>  ['name'],
        'thumb' =>  ['thumb']
    ];
}
