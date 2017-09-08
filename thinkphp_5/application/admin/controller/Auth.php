<?php
    //后台权限控制器
    
    
    namespace app\admin\controller;
    use think\Controller;
    use app\admin\Model;

    
    class Auth extends Controller
    {
        //权限列表展示
        public function showlist()
        {
            $this->model('Auth')->select();
            
            $this-> assign('info', '$info');
            $this-> fetch();
        }

    }
