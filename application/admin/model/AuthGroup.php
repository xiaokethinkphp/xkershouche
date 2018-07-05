<?php
namespace app\admin\model;
use \think\Model;
/**
 *
 */
class AuthGroup extends Model
{
    public function getAuthGroupList($where='status=1 OR status=0')
    {
        $auth_group_all = AuthGroup::where($where)->select();
        foreach ($auth_group_all as $key => $value) {
            $value['rule_array'] = $this->getAuthRuleList($value['rules'],$where);
        }
        return $auth_group_all;
    }

    private function getAuthRuleList($rules='',$where='status=1 OR status=0')
    {
        $arr = explode(',', $rules);
        $rules_array = array();
        foreach ($arr as $key => $value) {
            $authRule_find = db('authRule')->where($where)->find($value);
            if(!$authRule_find){
                continue;
            }
            $rules_array[] = $authRule_find;
        }
        return $rules_array;
    }

    public function getAuth($id='')
    {
        $auth_group_get = AuthGroup::get($id);
        // $auth_group_get['rule_array'] = $this->getAuthRuleList($auth_group_get['rules']);
        return $auth_group_get;
    }

    public function admin()
    {
        return $this->belongsToMany('Admin','auth_group_access','uid','group_id');
    }
}
