<?php
namespace app\admin\validate;
use think\Validate;

class Article extends Validate{
    protected $rule = [
        'title' => 'require|max:25',
        'cateid' => 'require'
    ];

    //编辑出错提示
    protected $message = [
        'title.require'  => '文章名称必须填写',
        'title.max'      => '文章名称长度不得大于25位',
        'cateid.require'  => '请选择文章所述栏目',
    ];

    //验证场景
    protected $scene = [
        'edit' => ['title','cateid'],
        'add' => ['title','cateid']
    ];
}
