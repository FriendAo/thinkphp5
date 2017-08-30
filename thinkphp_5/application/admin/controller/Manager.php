<?php
namespace app\admin\controller;
use think\Controller;
    
class Manager extends Controller
{
    public function login()
    {
        return $this -> fetch();
    }
}
