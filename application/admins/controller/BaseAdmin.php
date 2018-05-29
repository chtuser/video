<?php
namespace app\admins\controller;
use think\Controller;
use Util\data\Sysdb;
/**
 *
 */
class BaseAdmin extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->_admin=session('admin');

        //未登陆用户不允许访问
        if(!$this->_admin){
            header('Location: /admins.php/admins/Account/login');
            exit;
        }
        //判断用户是否有权限访问
        $this->db=new Sysdb;
    }

}