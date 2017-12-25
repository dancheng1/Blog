<?php
namespace app\admin\validate;
use think\Validate;

class Admin extends Validate{
    protected $rule = [
        'username' => 'require|max:25',
        'password' => 'require|max:32'
    ];

    //编辑出错提示
    protected $message = [
        'username.require'  => '管理员名称必须填写',
        'username.max'      => '管理员名称长度不得大于25位',
        'password.require'  => '管理员密码必须填写',
    ];

    //验证场景
    protected $scene = [
        'edit' => ['username'=>'require','password'],
        'add' => ['username','password']
    ];
}
