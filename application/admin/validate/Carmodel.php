<?php
namespace app\admin\validate;
use \think\Validate;
/**
 * 品牌验证器
 */
class Carmodel extends Validate
{
    protected $rule = [
        'carid'  =>  "require|unique:carmodel,carid^style^edition",
        'style' =>  "require|unique:carmodel,carid^style^edition",
        'edition' =>  "require|unique:carmodel,carid^style^edition",
    ];

    protected $message = [
        'carid.require'  =>  '车品牌不能为空',
        'carid.unique'   =>  '该车型已经存在',
        'style.require'  =>  '车品牌不能为空',
        'style.unique'   =>  '该车型已经存在',
        'edition.require'  =>  '车品牌不能为空',
        'edition.unique'   =>  '该车型已经存在'
    ];
}
