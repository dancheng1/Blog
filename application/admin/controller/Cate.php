<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\Loader;
use think\Validate;
use app\admin\model\Cate as CateModel;

class Cate extends Base{
    public function lst(){
        $list = CateModel::paginate(3);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=[
                'catename'=>input('catename'),
            ];

            $validate = Loader::validate('Cate');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }

            if(db('cate')->insert($data)){
                return $this->success("添加栏目成功！", 'lst');
            } else {
                return $this->error("添加栏目失败！");
            }
            return;
        }
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $cate = db('cate')->find($id);
        if(request()->isPost()){
            $data = [
                'id' => input('id'),
                'catename' => input('catename'),
            ];

            $validate = Loader::validate('Cate');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $save = db('cate')->update($data);
            if($save !== false){
                $this->success('修改栏目信息成功！', 'lst');
            } else {
                $this->error('修改栏目失败！');
            }
            return;
        }
        $this->assign('cate', $cate);
        return $this->fetch();
    }

    public function del(){
        if(db('cate')->delete(input('id'))){
            $this->success('删除栏目成功！', 'lst');
        } else {
            $this->error('删除栏目失败！');
        }
    }
}
