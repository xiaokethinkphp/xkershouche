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

    public function login()
    {
        dump(input('post.'));
    }

    public function registerhanddle()
    {
        if (request()->isPost()) {
            $post = input("post.");
            unset($post['member_password1']);
            unset($post['checkcode']);
            $validate = validate("Member");
            if (!$validate->check($post)) {
                $this->error($validate->getError());
            }
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
}
