<?php
namespace app\home\controller;

use think\Controller;
use app\com\Model;
    
class LittlePaper extends Controller
{
    //小票录入
    public function insert()
    {
        $result = $this ->validate(
            [
                'num' => input('post.num'),
                'text'=> input('post.text'),
            ],
            [
                'num' => 'alphaNum',
                'text'=> 'num',
            ]);
        if(true !== $result){
            dump($result);
        }
        $obj = model('abc');
        $t = input('post.text');
        $d = input('post.num');
        $data = ['text' => $t, 'num' => $d];
        $obj -> insert($data);
        dump($result);
        return $this -> fetch();
    }
    
    //小票查询
    public function check()
    {
        return $this -> fetch();
    }

}
