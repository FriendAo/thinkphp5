<?php
    //后台"权限"控制器
    
    
    namespace app\admin\controller;
    use think\Controller;
    
    class Auth extends Controller
    {
        //权限列表展示
        public function showlist()
        {
            $info = model('Auth')->order('auth_path')->select();
            
            $this->assign('info', $info);
            return $this-> fetch();
        }
        
        public function add()
        {
            $auth = model('Auth');
            //两个逻辑:展示和手机
            if(!empty($_POST)){
                
            }else{
                //获得被选取的上级权限
                $auth_infoA = $auth-> where('auth_level=0')-> select();
                $this->assign('auth_infoA',$auth_infoA);
                return $this->fetch();
            }
        }

    }
