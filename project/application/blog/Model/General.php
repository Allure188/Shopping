<?php

namespace app\blog\Model;
use think\Model;
use think\Db;

class General extends Model
{
    //设置变量表,让其他模型类继承并赋值
    protected $table;
    //增加
    public function add1($date=array()){
        Db::table($this->table)->insert($date);
    }
    ////删除
    public function delete1($where=array()){
        return Db::table($this->table)->where($where)->delete();
    }
    //更新
    public function update1($where=array(),$date=array()){
        return Db::table($this->table)->where($where)->update($date);
    }
    //查询单条
    public function selectOne($where=array(),$field="*"){
        return Db::table($this->table)->where($where)->field($field)->find();
    }
    //查询多条
    public function selectAll($where=array(),$field="*"){
        return Db::table($this->table)->where($where)->field($field)->select();
    }
}