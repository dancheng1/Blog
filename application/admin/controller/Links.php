<?php
/**
 * Created by PhpStorm.
 * User: dancheng
 * Date: 2017/12/23
 * Time: 19:32
 */
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Loader;
use think\Validate;
use app\admin\model\Links as LinksModel;
class Links extends Base{
    public function lst(){
        $list = LinksModel::paginate(3);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'url'=>input('url'),
                'desc' => input('desc')
            ];

            $validate = Loader::validate('Links');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }

            if(db('links')->insert($data)){
                return $this->success("添加链接成功！", 'lst');
            } else {
                return $this->error("添加链接失败！");
            }
            return;
        }
        return $this->fetch();
    }

    public function edit(){
        if(request()->isPost()){
            $data = [
                'id' => input('id'),
                'title' => input('title'),
                'url' => input('url'),
                'desc' => input('desc')
            ];

            $validate = Loader::validate('Links');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            if(db('links')->update($data)){
                $this->success('修改链接信息成功！', 'lst');
            } else {
                $this->error('修改链接信息失败！');
            }
            return;
        }
        $id = input('id');
        $link = db('links')->find($id);
        $this->assign('link', $link);
        return $this->fetch();
    }

    public function del(){
        if(db('links')->delete(input('id'))){
            $this->success('删除链接成功！', 'lst');
        } else {
            $this->error('删除链接失败！');
        }
    }
}