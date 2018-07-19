<?php
namespace app\index\controller;
use \think\Controller;
class Index extends Controller
{
    public function index()
    {
        $brand_select = db('brand')->where('pid',0)->order('order desc')->select();

        $cars_model = model('\app\admin\model\Cars');
        foreach ($brand_select as $key => $value) {
            $cars_select = $cars_model->where('brand_level1',$value['id'])->select();
            foreach ($cars_select as $key1 => $value1) {
                $value1->carsimg;
            }
            $cars_select = $cars_select->toArray();
            $brand_select[$key]['children'] = $cars_select;

        }

        $this->assign('brand_select',$brand_select);
        // dump($brand_select);
        $list = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O',
        'P','Q','R','S','T','U','V','W','X','Y','Z'];
        $arr = array();
        foreach ($list as $key => $value) {
            foreach ($brand_select as $key1 => $value1) {
                if($value1['initial']==$value){
                    $arr[$value][] = $value1;
                }
            }
        }
        $this->assign('brand_list',$arr);

        $level_select = db('level')->select();
        $this->assign('level',$level_select);

        $current_year = date('Y',time());
        $arr = array();
        for ($i=0; $i < 10; $i++) {
            $arr[$i] = $current_year-$i;
        }
        $this->assign('years',$arr);

        $news_fenlei = db('newsfenlei')->select();
        $array = array();
        foreach ($news_fenlei as $key => $value) {
            if($value['pid']==0){
                $children = getChildren($news_fenlei,$value['id']);
                array_unshift($children, $value);
                $ids = array_column($children, 'id');
                $news = db('news')->where('pid','in',$ids)->select();
                $array[$key] = $children[0];
                $array[$key]['children'] = $news;
            }
        }
        $this->assign('news',$array);
        // dump($array);
        return view();
    }

}
