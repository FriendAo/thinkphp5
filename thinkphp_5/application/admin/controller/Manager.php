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

        $t = input('post.text');
        $d = input('post.id');
        $data = ['text' => $t, 'id' => $d];
        $obj -> insert($data);
        
        
        $info = $obj -> select();
        $this -> assign('info',$info);
        return $this -> fetch('insert');
    }
}
