<?php
namespace app\admin\controller;
use think\Controller;
    
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
        // dump(get_defined_constants(true));
        return $this -> fetch();
    }
    
    //商品展示
    public function show()
    {
        return $this -> fetch();
    }
    //添加商品
    public function add()
    {
        return $this -> fetch();
    }
    //修改商品
    public function update()
    {
        return $this -> fetch();
    }
    
}
