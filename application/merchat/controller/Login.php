<?php
/*
|--------------------------------------------------------------------------
| Author:whlphper 2018/8/19 13:41
|--------------------------------------------------------------------------
| Description:
|
*/
namespace app\merchat\controller;
use think\Controller;
use think\Request;

class Login extends Controller{

    private $model = [];

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->model['users'] = model('Users');
    }

    public function login()
    {
        return view();
    }

    public function checkAuth()
    {
        $data = $this->request->only(['name','password']);
        $user = $this->model['users']->findData('id,username,password,merchat_id',['username'=>$data['name']]);
        if($user['errcode'] != '0'){
            $user['errmsg'] = '用户不存在';
            return $user;
        }
        if($user['data']['password'] !== md5($data['password'])){
            return ['errcode'=>'1005','errmsg'=>'密码错误'];
        }
        session('merchatId',$user['data']['merchat_id']);
        session('merchatInfo',$user['data']);
        session('userId',$user['data']['id']);
        return ['errcode'=>'0','errmsg'=>'登陆成功','url'=>url('/merchat/Index/index')];
    }

    public function logout()
    {
        session('merchatId',null);
        session('merchatInfo',null);
        session('userId',null);
        $this->redirect(url('login'));
    }
}