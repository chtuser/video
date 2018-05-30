<?php

namespace app\admins\controller;

use app\admins\controller\BaseAdmin;

/**
 *菜单管理
 */
class Menu extends BaseAdmin
{
    //菜单列表
    public function index()
    {
        $pid = (int)input('get.pid');
        $data['lists'] = $this->db->table('admin_menus')->where(array('pid' => $pid))->lists();

        //返回上级菜单
        $backid = 0;
        if ($pid > 0) {
            $parent = $this->db->table('admin_menus')->where(array('mid' => $pid))->item();
            $backid = $parent['pid'];
        }
        $this->assign('pid', $pid);
        $this->assign('backid', $backid);
        $this->assign('data', $data);
        return $this->fetch();
    }

    //保存菜单
    public function save(){
        $ords=input('post.ords/a');
        $titles=input('post.titles/a');
        $controllers=input('post.controllers/a');
        $methods=input('post.methods/a');
        $ishiddens=input('post.ishiddens/a');
        $status=input('post.status/a');

        foreach ($ords as $key=>$value){
            //新增
            $data['ord']=$value;
            $data['title']=$titles[$key];
            $data['controller']=$controllers[$key];
            $data['method']=$methods[$key];
            $data['ishidden']=isset($ishiddens[$key]) ? 1 : 0;
            $data['status']=isset($status[$key]) ? 1 :0 ;
            dump($data);
        }
    }
}