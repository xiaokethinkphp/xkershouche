<?php
namespace app\admin\controller;
use \think\Controller;
/**
 *
 */
class News extends Controller
{
    public function cate()
    {
        $news_model = model("Newsfenlei");
        if (request()->isAjax()) {
            $post = input('post.');
            foreach ($post as $key => $value) {
                db("newsfenlei")->where('id',$key)->update(['order'=>$value]);
            }
            $list = db("newsfenlei")->order('order desc')->select();
            $news = $news_model->getNews($list);
            $this->assign("news",$news);
            return view('cateajaxpage');
        } else {
            $list = db("newsfenlei")->order('order desc')->select();
            $news = $news_model->getNews($list);
            $this->assign("news",$news);
            return view();
        }

    }

    public function cateadd($id='')
    {
        $cate_find = db('newsfenlei')->find($id);
        $this->assign('cate',$cate_find);
        return view();
    }

    public function cateaddhanddle()
    {
        db('newsfenlei')->insert(input('post.'));
        $this->redirect('admin/news/cate');
    }

    public function checkNameCateAjax()
    {
        if (request()->isAjax()) {
            $validate = validate("NewsCate");
            return $validate->check(input('post.'));
        } else {
            $this->redirect('admin/news/cate');
        }

    }

    public function del($id='')
    {
        $new_model = model("Newsfenlei");
        $newscate_del_result = $new_model->newsCateDel($id);
        if ($newscate_del_result) {
            $this->success("分类删除成功",'admin/news/cate');
        } else {
            $this->error("分类删除失败",'admin/news/cate');
        }

    }

    public function cateupd($id='')
    {
        $cate_find = db("newsfenlei")->find($id);
        if (empty($cate_find)) {
            $this->error("该分类不存在",'admin/news/cate');
        }
        // if ($cate_find['pid']!=0) {
            $cate_parent = db("newsfenlei")->find($cate_find['pid']);
            $cate_find['pname'] = $cate_parent['name'];
        // }
        $this->assign("cate",$cate_find);
        // dump($cate_find);
        return view();
    }

    public function cateupdhanddle()
    {
        if (!request()->isPost()) {
            $this->redirect('admin/news/cate');
        }
        $cate_upd_result = db("newsfenlei")->update(input('post.'));
        if ($cate_upd_result) {
            $this->success('分类修改成功',"admin/news/cate");
        } else {
            $this->error('分类修改失败','admin/news/cate');
        }

    }

    public function lst()
    {
        $news_select = db('news')->paginate(2);
        $this->assign('news',$news_select);
        return view();
    }

    public function add()
    {
        $news_model = model("Newsfenlei");
        $list = db("newsfenlei")->order('order desc')->select();
        $cate = $news_model->getNews($list);
        $this->assign("cate",$cate);
        return view();
    }

    public function addhanddle()
    {
        if (!request()->isPost()) {
            $this->redirect('admin/news/lst');
        }
        $data = input('post.');
        $data['addtime'] = strtotime('now');
        $data['updtime'] = strtotime('now');
        $news_add_result = db('news')->insert($data);
        if ($news_add_result) {
            $this->success("新闻添加成功",'admin/news/lst');
        } else {
            $this->error("新闻添加失败",'admin/news/lst');
        }

    }
}
