<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
    
class Insert extends Controller
{
    public function littlePaper()
    {
        $result = Db::table('DATA')->where('id',1)->find();
        return $this -> fetch();
    }
}
