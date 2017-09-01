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
        $obj = model('abc');
        $t = input('post.text');
        $d = input('post.id');
        $data = ['text' => $t, 'id' => $d];
        $obj -> insert($data);
        
        //模糊查询
        $map['text'] = array('like','a%');
        $info1 = $obj -> where($map) ->select();
        
        //条件查询
         $info = $obj -> where('text','aaa') ->select();
        //$info = $obj -> select();
        $this -> assign('info',$info);
        return $this -> fetch('insert');
    }
}
