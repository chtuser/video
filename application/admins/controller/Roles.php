<?php

namespace app\admins\controller;

use app\admins\controller\BaseAdmin;

/**
 *菜单管理
 */
class Roles extends BaseAdmin
{
    //菜单列表
    public function index()
    {
        $data['roles']=$this->db->table('admin_groups')->lists();
        dump($data);

    }
}