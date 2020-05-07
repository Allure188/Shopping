<?php


namespace app\blog\controller;

use think\Controller;
use think\Request;
use app\blog\model\Category as CategoryModel;

class Category extends Controller
{
    protected $request;
    protected $category;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->request=Request::instance();
        $this->category=new CategoryModel();
    }
    //显示商品类别页
    public function category(){
        $arr=$this->category->selectAll();
        $this->assign('arr',$arr);
        return $this->fetch();
    }
    //添加商品类别页
    public function add(){
        $is=$this->request->isPost();
        if($is){
            //获取以所有post方法获取的数据
            $arr=$this->request->post();
            //把数据添加倒库
            $res=$this->category->add1($arr);
            if($res){
                $this->success('添加成功','admin');
            }
        }
        return $this->fetch();
    }
    //删除商品类别
    public function del(){
        $id=input('id');
        $res=$this->category->delete1(['id'=>$id]);
        if($res){
            return json([
                'static'=>'1',
                'msg'=>'删除成功'
            ]);
        }
    }
    //修改商品类别
    public function update(){
        $id=input('id');
        //判断是否为post请求
        $is=$this->request->isPost();
        if($is){
            //获取所有以post方式发过来的请求
            $arr=$this->request->post();
            $res=$this->category->update1(['id'=>$id],$arr);
            if($res){
                $this->success('修改成功','admin');
            }
        }
        $arr=$this->category->selectOne(['id'=>$id]);
        $this->assign('arr',$arr);
        return $this->fetch();
    }
}