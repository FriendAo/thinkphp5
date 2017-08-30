<?php
namespace app\admin\controller;

use think\Controller;
    
class Insert extends Controller
{
    public function littlePaper()
    {
        return $this -> fetch();
    }
}
