<?php
namespace app\admin\model;
use \think\Model;
/**
 *
 */
class Admin extends Model
{
    public function group()
    {
        return $this->belongsToMany('AuthGroup','auth_group_access','group_id','uid');
    }

    public function adminAdd($post)
    {
        return \think\Db::transaction(function() use($post){
            $groups = $post['groups'];
            unset($post['groups']);
            unset($post['repassword']);
            $post['password'] = md5($post['password']);
            $post['last_login_time'] = strtotime('now');
            $post['last_login_ip'] = request()->ip();
            $id = db("admin")->insertGetId($post);
            $admin_get = Admin::get($id);
            $admin_get->group()->save($groups);
        });
    }
}
