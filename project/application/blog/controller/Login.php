<?php


namespace app\blog\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Db;

class Login extends Controller
{
    //显示登录页
    public function index(){
        return $this->fetch();
    }
    //验证码
    public function verify(){
        $config=array(
            'codeSet'=>'1234567890',
            'length'=>4,
            'imageW'=>220,
            'imageH'=>50
        );
        $captcha=new Captcha($config);
        return $captcha->entry();
    }
    //登录功能
    public function login(){
        $username=input('username');
        $password=input('password');
        $card=input('card');
        //三个数据是否为空
        if(empty($username)||empty($password)||empty($card)){
            //返回错误信息
            return json([
                'static'=>0,
                'msg'=>'账号或密码为空'
            ]);
        }
        //验证码是否正确
        $captcha=new Captcha();
        $res=$captcha->check($card);
        if(!$res){
            //返回错误信息
            return json([
                'static'=>0,
                'msg'=>'验证码错误'
            ]);
        }
        //根据用户名查询信息
        $data=Db::table('admin')->where('username',$username)->find();
        //判断密码是否相同
        if($data['password']==$password){
            return json([
                'static'=>1,
                'msg'=>'登录成功'
            ]);
        }else{
            return json([
                'static'=>0,
                'msg'=>'登录失败'
            ]);
        }
    }
}