<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*由父类得到全部子类，得到一个多维数组*/
function getChildren($list,$pid=0)
{
    $arr = array();
    foreach ($list as $key => $value) {
        if ($value['pid'] == $pid) {
            $value['children'] = getChildren($list,$value['id']);
            $arr[] = $value;
        }
    }
    return $arr;
}
