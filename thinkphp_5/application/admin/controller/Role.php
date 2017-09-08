<?php
    namespace app\admin\controller;
    use think\Controller;
    use app\admin\Model;
    use think\Request;
    
    class Role extends Controller
    {
        public function showlist()
        {
            $info = model('Role')->select();
            
            
            $this->assign('info',$info);
            return $this->fetch();
        }
        
        public function fenpei($role_id)
        {
            //根据$role_id获得被分配权限的角色信息
            $role_info = model('Role')->find($role_id);
            
            //获得被分配的全部权限,并传递给模板使用
            $auth_infoA = model('Auth') -> where('auth_level=0')->select();
            $auth_infoB = model('Auth') -> where('auth_level=1')->select();
            
            $this-> assign('auth_infoA', $auth_infoA);
            $this-> assign('auth_infoB', $auth_infoB);
            $this-> assign('role_info', $role_info);
            return $this->fetch();
        }
    }
