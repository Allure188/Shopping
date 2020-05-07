<?php


namespace app\blog\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\blog\model\Commodity as CommodityModel;
class Commodity extends Controller
{
    protected $request;
    protected $commodity;
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->request=Request::instance();
        $this->commodity=new CommodityModel();
    }
    //显示商品页
    public function commodity(){
        $arr=$this->commodity->selectAll();
        $this->assign('arr',$arr);
        return $this->fetch();
    }
    //添加商品
    public function add(){
        $is=$this->request->isPost();
        if($is){
            //获取以所有post方法获取的数据
            $arr=$this->request->post();
            //把数据添加倒库
            $res=$this->commodity->add1($arr);
            if($res){
                $this->success('添加成功','admin');
            }
        }
        //连表查询
        $arr=Db::table("commodity")
                ->alias("com")
                ->join('category cate','com.cid=cate.classid')
                ->field('com.name,com.price,com.number,cate.classid')
                ->select();
        $this->assign('arr',$arr);
        return $this->fetch();
    }
    //删除商品
    public function del(){
        $id=input('id');
        $res=$this->commodity->delete1(['id'=>$id]);
        if($res){
            return json([
                'static'=>'1',
                'msg'=>'删除成功'
            ]);
        }
    }
    //修改商品
    public function update(){
        $id=input('id');
        //判断是否为post请求
        $is=$this->request->isPost();
        if($is){
            //获取所有以post方式发过来的请求
            $arr=$this->request->post();
            $res=$this->commodity->update1(['id'=>$id],$arr);
            if($res){
                $this->success('修改成功','admin');
            }
        }
        $arr=$this->commodity->selectOne(['id'=>$id]);
        $this->assign('arr',$arr);
        return $this->fetch();
    }
}