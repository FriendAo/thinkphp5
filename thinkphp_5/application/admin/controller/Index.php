<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model;
use think\Request;
    
class Index extends Controller
{
    public function index()
    {
        return $this -> fetch();
    }
    //头部组成
    public function head()
    {
        return $this -> fetch();
    }
    //左侧
    public function left()
    {
        return $this -> fetch();
    }
    //右侧
    public function right()
    {
         //dump(get_defined_constants(true));
        return $this -> fetch();
    }
    

    
}
