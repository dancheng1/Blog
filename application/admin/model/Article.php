<?php
/**
 * Created by PhpStorm.
 * User: dancheng
 * Date: 2017/12/23
 * Time: 15:27
 */
namespace app\admin\model;
use think\Model;
class Article extends Model{
    public function cate(){
        return $this->belongsTo('cate','cateid');
    }
}