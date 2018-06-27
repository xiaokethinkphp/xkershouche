<?php
namespace app\admin\model;
use \think\Model;
/**
 *
 */
class Newsfenlei extends Model
{
    public function getNews($list='')
    {
        return getChildren($list);
    }

    public function newsCateDel($id='')
    {
        $list = db("newsfenlei")->select();
        $pids = getChildren2($list,$id);
        $pids =array_column($pids,'id');
        $pids[] = (int)$id;
        $result = Newsfenlei::destroy($pids);
        return $result;
    }

    public function newsCategetParents($id='')
    {
        $list = db("newsfenlei")->select();
        $pids = getParents($list,$id);
        return $pids;
    }

}
