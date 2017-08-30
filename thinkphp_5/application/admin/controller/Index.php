<?php
namespace app\admin\controller;
use think\Controller;
    
class Index extends Controller
{
    public function index()
    {
        return $this -> fetch();
    }
    public function head()
    {
       
        return $this -> fetch();
    }
    public function left()
    {
        return $this -> fetch();
    }
    public function right()
    {
        // dump(get_defined_constants(true));
        return $this -> fetch();
    }
    public function head2()
    {
        return $this -> fetch();
    }
    
}
