<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model;
    
class Manager extends Controller
{
    public function login()
    {
        return $this -> fetch();
    }
    
    public function insert()
    {
        $obj =model('abc');
      //  $obj->save();
        $info = $obj -> select();
        $this -> assign('info',$info);
        return $this -> fetch('insert');
    }
}
