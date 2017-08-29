<?php
namespace app\home\controller;

use think\Controller;

class LittlePaper extends Controller
{
    //小票录入
    public function insert()
    {
        return $this -> fetch();
    }
    
    //小票查询
    public function check()
    {
        return $this -> fetch();
    }

}
