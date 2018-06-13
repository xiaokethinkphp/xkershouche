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
/*由父类得到全部子类，得到一个二维数组*/
function getChildren2($list,$pid)
{
    static $arr = array();
    foreach ($list as $key => $value) {
        if ($value['pid']==$pid) {
            $arr[] = $value;
            getChildren2($list,$value['id']);
        }
    }

    return $arr;
}

/*无线级分类由子类得到全部父类*/
// function getParents($list,$pid)
// {
//     static $arr = array();
//     foreach ($list as $key => $value) {
//         if ($value['id']==$pid) {
//             array_unshift($arr,$value);
//             getParents($list,$value['pid']);
//         }
//     }
//     return $arr;
// }
function explode2($str)
{
    return explode('|',$str);
}

function getfiles($dir)
{
    $files = array();
    if ($handdle = opendir($dir)) {
        while (($file = readdir($handdle))!==false) {
            if($file !='.'&&$file != '..'){
                if (is_dir($dir.'/'.$file)) {
                    $files[$file] = getfiles($dir.'/'.$file);
                } else {
                    $files[] = $file;
                }
            }
        }
    }
    closedir($handdle);
    return $files;
}

function getfiles2($dir)
{
    static $files = array();
    if ($handdle = opendir($dir)) {
        while (($file = readdir($handdle))!==false) {
            if($file !='.'&&$file != '..'){
                if (is_dir($dir.'/'.$file)) {
                    getfiles2($dir.'/'.$file);
                } else {
                    $files[] = $dir.'/'.$file;
                }
            }
        }
    }
    closedir($handdle);
    return $files;
}
