<?php
namespace app\admin\model;
use \think\Model;
/**
 * 规则表模型
 */
class AuthRule extends Model
{
    public function getAuthList()
    {
        $list = db('authRule')->select();
        return getChildren($list);
    }

    public function delAuth($id)
    {
        $list = db('authRule')->select();
        $ids = array_column(getChildren($list=db('authRule')->select(),$id), 'id');
        $ids[] = $id;
        return $auth_del_reslt = AuthRule::destroy($ids);
    }
}
