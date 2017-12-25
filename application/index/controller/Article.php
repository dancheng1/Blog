<?php
/**
 * Created by PhpStorm.
 * User: dancheng
 * Date: 2017/12/20
 * Time: 16:32
 */
namespace app\index\controller;
use app\index\controller\Base;

class Article extends Base{
    public function index(){
        $arid = input('arid');
        $articles = db('article')->find($arid);
        //访问量自增 1
        db('article')->where('id', '=', $arid)->setInc('click');
        $cates = db('cate')->find($articles['cateid']);

        $recres = db('article')->where(array('cateid'=>$cates['id'], 'state'=>1))->limit(8)->select();

        $this->assign(array(
            'articles'=>$articles,
            'cates'=>$cates,
            'recres'=>$recres,
            'ralateres'=>$this->ralat($articles['keywords'], $articles['id'])
        ));
        return $this->fetch('article');
    }

    public function ralat($keywords,$id){
        $arr = explode(',', $keywords);
        static $ralateres = array();
        foreach ($arr as $k => $v){
            $map['keywords'] = ['like', '%' . $v . '%'];
            $map['id'] = ['neq', $id];
            $artres = db('article')->where($map)->order('id desc')->limit(8)->select();
            $ralateres = array_merge($ralateres, $artres);
        }
        return $ralateres;
    }
}