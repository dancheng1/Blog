<?php
/**
 * Created by PhpStorm.
 * User: dancheng
 * Date: 2017/12/23
 * Time: 19:32
 */
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;

class Login extends Controller{
    public function index(){
        if(request()->isPost()){
            $admin = new Admin();
            $data = input('post.');
            $pd = $admin->login($data);
            if($pd == 3){
                $this->success('信息正确，正在跳转', 'index/index');
            } elseif($pd == 4) {
                $this->error('验证码错误');
            } else {
                $this->error('用户名或密码错误');
            }
        }
        return $this->fetch('login');
    }
}