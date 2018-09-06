<?php
// +----------------------------------------------------------------------
// | IUBO    PHP
// +----------------------------------------------------------------------
// | Time  : 16:46  2018/9/6/006
// +----------------------------------------------------------------------
// | Author: whlphper  备注:
// +----------------------------------------------------------------------
namespace app\manager\controller\shop;
use app\manager\controller\ManagerBase;
class Config extends ManagerBase{

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->model = model('ShopConfig');
    }

    public function index()
    {
        $conf = $this->model->getHashConf(1);
        return view('',['conf'=>$conf]);
    }

    public function saveConf()
    {
        $data = $this->request->post();
        $type = $data['config_id'];
        unset($data['config_id']);
        $model = $this->model;
        foreach ($data as $k => $v) {
            if ($cur = $model->where('name', $k)->where('config_id', $type)->field('id')->find()) {
                $model->save(['value' => $v], ['id' => $cur['id']]);
            } else {
                $model->insert(['name' => $k, 'value' => $v, 'config_id' => $type]);
            }
        }
        return ['errcode'=>'0','errmsg'=>'配置成功'];
    }
}