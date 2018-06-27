<?php
namespace app\index\controller;
use \think\Controller;
class Login extends Controller
{
    public function index()
    {
        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }

    // 用户注册界面显示
    public function register()
    {
        return view();
    }

    // 用户注册时验证用户名
    public function checkNameAjax()
    {
        if (request()->isAjax()) {
            $post = input("post.");
            $validate = validate("Member");
            return $validate->scene('member_name')->check($post);
        } else {
            $this->redirect('index/login/register');
        }

    }

    public function checkCode()
    {
        if (request()->isAjax()) {
            $code = input("post.checkcode");
            return ($code==cookie('checkcode'));
        } else {
            $this->redirect('index/login/register');
        }
    }

    public function checkMobileNumberAjax(){
        if (request()->isAjax()) {
            $post = input("post.");
            $validate = validate("Member");
            return $validate->scene('mobile_number')->check($post);
        } else {
            $this->redirect('index/login/register');
        }
    }

    public function senMessage()
    {
        if (request()->isAjax()) {
            $mobile_number = input("post.mobile_number");
            SmsDemo::sendSms($mobile_number);
        } else {
            $this->redirect('index/login/register');
        }

        // $this->redirect('index/login/bb');
    }

    // 登录界面显示
    public function login()
    {
        return view();
    }

    // 验证登录信息
    public function checklogin()
    {
        if (request()->isPost()) {
            $post = input('post.');
            $member_name_find = db("member")
            ->where("member_name",input("post.member_name"))
            ->find();
            if (!$member_name_find) {
                $this->error("该用户不存在,请重新登录","index/login/login");
            }
            if ($member_name_find['member_password']==md5(input("post.member_password"))) {
                cookie("member",$member_name_find);
                $this->success("登录成功","index/member/membercenter");
            } else {
               $this->error("密码错误,请重新登录","index/login/login");
            }

        } else{
            $this->redirect('index/login/register');
        }
    }

    // 判断用户是否存在
    public function isNameAjax()
    {
        if (request()->isAjax()) {
            $db = db("member")->where("member_name",input("post.member_name"))->find();
            return empty($db)?false:true;
        } else {
            $this->redirect('index/login/login');
        }

    }

    public function registerhanddle()
    {
        if (request()->isPost()) {
            $post = input("post.");
            unset($post['member_password1']);
            unset($post['checkcode']);
            $post['register_time'] = strtotime('now');
            $validate = validate("Member");
            if (!$validate->check($post)) {
                $this->error($validate->getError());
            }
            $post['member_password'] = md5($post['member_password']);
            $member_add_result = db("member")->insert($post);
            if ($member_add_result) {
                $this->success("注册成功");
            } else {
                $this->error("注册失败，请重新注册",'index/login/register');
            }
        } else {
            $this->redirect('index/login/register');
        }

    }

    public function verify()
    {
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    15,
            // 验证码位数
            'length'      =>    3,
            // 关闭验证码杂点
            'useNoise'    =>    false,
            'imageH'    =>  30,
            'reset' =>  false
        ];
        $captcha = new \think\captcha\Captcha($config);
        return $captcha->entry();
    }

    public function checkcapcha()
    {
        $captcha = new \think\captcha\Captcha();
        if( !$captcha->check(input('post.captcha')))
        {
        	return false;
        }else{
            return true;
        }
    }


}
