<?php

namespace app\admins\controller;

use think\Controller;
use Util\data\Sysdb;


class Test extends Controller
{
    public function index()
    {
        $this->db = new Sysdb;
        $res = $this->db->table('admins')->field('id,username')->where(array('id' => 1))->lists();
        dump($res);
    }
}