<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\helper\hash\Md5;
use think\Loader;
use think\Validate;
use app\admin\model\Admin as AdminModel;

class Admin extends Base{
    public function lst(){
        $list = AdminModel::paginate(3);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=[
                'username'=>input('username'),
                'password'=>md5(input('password')),
            ];

            $validate = Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }

            if(db('admin')->insert($data)){
                return $this->success("添加管理员成功！", 'lst');
            } else {
                return $this->error("添加管理员失败！");
            }
            return;
        }
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $admin = db('admin')->find($id);
        if(request()->isPost()){
            $data = [
                'id' => input('id'),
                'username' => input('username'),
            ];
            if(input('password')){
                $data['password'] = md5(input('password'));
            } else {
                $data['password'] = $admin['password'];
            }

            $validate = Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $save = db('admin')->update($data);
            if($save !== false){
                $this->success('修改管理员信息成功！', 'lst');
            } else {
                $this->error('修改管理员失败！');
            }
            return;
        }
        $this->assign('admin', $admin);
        return $this->fetch();
    }

    public function del(){
        $id = input('id');
        if($id != 1){
            if(db('admin')->delete(input('id'))){
                $this->success('删除管理员成功！', 'lst');
            } else {
                $this->error('删除管理员失败！');
            }
        } else {
            $this->error('初始化管理员不能删除！');
        }
    }

    public function logout(){
        session(null);
        $this->success('退出成功', 'login/index');
    }
}
