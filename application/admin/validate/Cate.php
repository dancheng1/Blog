<?php
namespace app\admin\validate;
use think\Validate;

class Cate extends Validate{
    protected $rule = [
        'catename' => 'require|max:25'
    ];

    //编辑出错提示
    protected $message = [
        'catename.require'  => '栏目名称必须填写',
        'catename.max'      => '栏目名称长度不得大于25位'
    ];

    //验证场景
    protected $scene = [
        'edit' => ['catename'],
        'add' => ['catename']
    ];
}
