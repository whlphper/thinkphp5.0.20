<?php
// +----------------------------------------------------------------------
// | IUBO    PHP
// +----------------------------------------------------------------------
// | Time  : 19:43  2018/9/6/006
// +----------------------------------------------------------------------
// | Author: whlphper  备注:
// +----------------------------------------------------------------------
namespace app\blog\controller;
use app\common\controller\Base;
class BlogBase extends Base{

    public $models = [];
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        // 获取导航
        $nav = model('BlogCategory')->field('id,parent_id,name')->where('is_menu',1)->order('sort desc')->select()->toArray();
        $nav = list_to_tree($nav,'id','parent_id','subNav');
        $this->assign('nav',$nav);
        $this->models['article'] = model('BlogArticle');
        $this->models['catgeory'] = model('BlogCategory');
    }
}