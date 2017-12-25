<?php
namespace app\admin\controller;
use app\admin\controller\Base;
use think\helper\hash\Md5;
use think\Loader;
use think\Validate;
use app\admin\model\Article as ArticleModel;

class Article extends Base{
    public function lst(){
        $list = ArticleModel::paginate(3);
        $this->assign('list', $list);
        return $this->fetch();
    }

    public function add(){
        if(request()->isPost()){
            $data=[
                'title'=>input('title'),
                'author'=>input('author'),
                'keywords'=>str_replace('，', ',', input('keywords')),
                'desc'=>input('desc'),
                'cateid'=>input('cateid'),
                'content'=>input('content'),
                'time' => time()
            ];
            if(input('state' == 'on')){
                $data['state'] = 1;
            } else {
                $data['state'] = 0;
            }

            //缩略图上传
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic'] = '/uploads/'.$info->getSaveName();
            }


            $validate = Loader::validate('Article');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }

            if(db('article')->insert($data)){
                return $this->success("添加文章成功！", 'lst');
            } else {
                return $this->error("添加文章失败！");
            }
            return;
        }
        $cateres = db('cate')->select();
        $this->assign('cateres', $cateres);
        return $this->fetch();
    }

    public function edit(){
        $id = input('id');
        $article = db('article')->find($id);

        if(request()->isPost()){
            $data = [
                'id' => input('id'),
                'title'=>input('title'),
                'author'=>input('author'),
                'keywords'=>input('keywords'),
                'desc'=>input('desc'),
                'cateid'=>input('cateid'),
                'content'=>input('content')
            ];

            if(input('state' == 'on')){
                $data['state'] = 1;
            } else {
                $data['state'] = 0;
            }

            //缩略图上传
            if($_FILES['pic']['tmp_name']){
                $file = request()->file('pic');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'static/uploads');
                $data['pic'] = '/uploads/'.$info->getSaveName();
            }

            $validate = Loader::validate('Article');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            if(db('article')->update($data)){
                $this->success('修改文章信息成功！', 'lst');
            } else {
                $this->error('修改文章失败！');
            }
            return;
        }

        $cateres = db('cate')->select();
        $this->assign('cateres', $cateres);
        $this->assign('article', $article);
        return $this->fetch();
    }

    public function del(){
        if(db('article')->delete(input('id'))){
            $this->success('删除文章成功！', 'lst');
        } else {
            $this->error('删除文章失败！');
        }
    }
}
