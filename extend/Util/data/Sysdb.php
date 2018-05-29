<?php
/**
 * Created by PhpStorm.
 * User: cht
 * Date: 2018/5/18
 * Time: 11:05
 */
namespace Util\data;
use think\Db;

class Sysdb{
    //指定表名git
    public function table($table){
        $this->where=array();
        $this->field='*';
        $this->table=$table;
        return $this;
    }
    //指定查询条件
    public function  where($where=array()){
        $this->where=$where;
        return $this;
    }
    //返回一条记录
    public function item(){
      $item=Db::name($this->table)->field($this->field)->where($this->where)->find();
      return $item ? $item : false;
    }

    //指定查询字段
    public function field($field='*'){
        $this->field=$field;
        return $this;
    }

    //查询列表
    public function lists(){
        $lists=Db::name($this->table)->field($this->field)->where($this->where)->select();
        return $lists ? $lists : false;
    }
    //添加
    public function  insert($data){
        $res=Db::name($this->table)->insert($data);
        return $res;
    }


}