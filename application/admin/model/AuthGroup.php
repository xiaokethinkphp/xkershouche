<?php
namespace app\admin\model;
use \think\Model;
/**
 *
 */
class AuthGroup extends Model
{
    public function getAuthGroupList()
    {
        $auth_group_all = AuthGroup::all();
        foreach ($auth_group_all as $key => $value) {
            $value['rule_array'] = $this->getAuthRuleList($value['rules']);
        }
        return $auth_group_all;
    }

    private function getAuthRuleList($rules='')
    {
        $arr = explode(',', $rules);
        $rules_array = array();
        foreach ($arr as $key => $value) {
            $rules_array[] = db('authRule')->find($value);
        }
        return $rules_array;
    }
}
