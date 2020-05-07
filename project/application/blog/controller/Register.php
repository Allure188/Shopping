<?php

namespace app\blog\controller;

use think\Controller;
use think\Db;

class Register extends Controller
{
    public function index(){
        return $this->fetch();
    }
    public function register(){
        $username=input('username');
        $password=input('password');
        $confirm=input('confirm');
        //验证三个数据是否为空
        if(empty($username)||empty($password)||empty($confirm)){
            return json([
                'static'=>0,
                'msg'=>'账号或密码或确认密码为空'
            ]);
        }
        //验证密码和确认密码是否一致
        if($password!==$confirm){
            return json([
                'static'=>0,
                'msg'=>'密码和确认密码不一致'
            ]);
        }
        $arr=array(
            'id'=>'',
            'username'=>$username,
            'password'=>$password
        );
        //把数据放到库中
        $res=Db::table('admin')->insert($arr);
        if($res){
            return json([
                'static'=>1,
                'msg'=>'注册成功'
            ]);
        }else{
            return json([
                'static'=>0,
                'msg'=>'注册失败'
            ]);
        }
    }
}