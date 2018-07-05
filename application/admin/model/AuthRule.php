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
        $this->delGroup($ids);
        return $auth_del_reslt = AuthRule::destroy($ids);
    }

    private function delGroup($ids='')
    {
        $group_all = AuthGroup::all();
        foreach ($group_all as $key => $value) {
            $arr = explode(',', $value['rules']);
            if (!array_intersect($arr, $ids)) {
                continue;
            }
            $arr_diff  = array_diff($arr, $ids);
            $authRuleGet = AuthGroup::get($value['id']);
            $authRuleGet->save([
                'rules' =>  implode(',', $arr_diff)
            ]);
        }
    }
}
