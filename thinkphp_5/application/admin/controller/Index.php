<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\Model;
    
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
        $info = model('abc') ->order('id desc')->select();
        $this -> assign('info',$info);
        return $this -> fetch('show');
    }
    //添加商品
    public function add()
    {
        $obj = model('abc');
        if(!empty($_POST['text'])){
            $z = $obj->insert($_POST);
            if($z){
                $this ->success('成功','show');
               // $this ->redirect('show','',2,'成功');
            }else{
                $this ->error('失败');
               // $this ->redirect('add','',2,'失败');
            }
        }else{
            return $this -> fetch();
        }
    }
    //修改商品
    public function update()
    {
        return $this -> fetch();
    }
    
}
