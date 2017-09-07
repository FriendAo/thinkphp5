<?php
    namespace app\admin\controller;
    use think\Controller;
    use app\admin\Model;
    use think\Request;
    
    class Role extends Controller
    {
        public function showlist(){
            $info = model('role');
            
            $this->fetch();
        }
    
    
    }
