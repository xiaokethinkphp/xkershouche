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
        $list = db("newsfenlei")->select();
        $news = $news_model->getNews($list);
        $this->assign("news",$news);
        return view();
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
}
