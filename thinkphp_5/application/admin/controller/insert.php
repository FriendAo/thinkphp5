<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;

    
class Insert extends Controller

{
    public function littlePaper()
    {
        //$result = Db::table('DATA')->where('id',1)->find();
        $result = db('data')->where('id',1)->select();
        dump($result);

        return $this -> fetch();
    }
}
