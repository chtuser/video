<?php

namespace app\admins\controller;

use think\Controller;
use Util\data\Sysdb;

/**
 *后台首页
 */
class Home extends BaseAdmin
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        return $this->fetch();
    }
}
