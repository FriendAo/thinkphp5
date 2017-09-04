<?php
    namespace app\admin\controller;
    use think\Controller;
    use app\admin\Model;
    use think\Request;
  
   
    class Shop extends Controller
    {
        
        
        //商品展示
        public function show()
        {
            $info = model('abc') ->order('id desc')->select();
            $this -> assign('info',$info);
           // dump($this);
            return $this -> fetch();
        }
        //添加商品
        public function add()
        {
            $obj = model('abc');
            
            if(!empty($_POST['text'])||!empty($_POST['num'])){
           // if(request::instance()->isPost()){
                $z = $obj->insert($_POST);
                if($z){
                    return $this ->success('成功','show','',2);
                }else{
                    return $this ->error('失败','','',2);
                }
            }else{
                return $this -> fetch();
            }
        }
        //修改商品
        public function update($id)
        {
            $obj = model('abc');
            if(!empty($_POST)){
                $id = input('post.id');
//                $a = input('post.num');
//                $b = input('post.text');
                $z = $obj->allowField(['num','text'])->save($_POST,['id'=>$id]);
//                dump($_POST);
                if($z){
                    return $this ->success('成功','show','',1);
//                     return $this ->redirect('show',array(),2,'chenggong');
                }else{
                    return $this ->error('失败');
//                    return $this ->redirect('update',['id'=> $id]);
                }
            }else{
                $info = $obj ->find($id);
                //dump($info);
                $this ->assign('info',$info);
                return $this -> fetch();
            }
        }
        
    }
