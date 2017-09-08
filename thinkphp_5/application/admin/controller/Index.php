<?php
namespace app\admin\controller;
use think\Controller;
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
        //战略:admin_id--->role_id--->auth_ids
        //获得管理员的session持久化登录信息
        $admin_id = session('admin_id');
        $admin_name = session('admin_name');
        
        //1.管理员信息
        $admin_info = model('Manager') -> find($admin_id);
        $role_id = $admin_info['mg_role_id'];
        //2_角色信息
        $role_info = model('Role') -> find($role_id);
        $auth_ids = $role_info['role_auth_ids'];//权限的ids信息
        //3.全部权限信息
        //超级管理员admin显示全部权限
        if($admin_name == 'admin'){
            $auth_infoA  = model('Auth') -> where("auth_level=0") -> select();//顶级权限
            $auth_infoB  = model('Auth') -> where("auth_level=1") -> select();//次顶级权限
        }else{
            $auth_infoA  = model('Auth') -> where("auth_level=0 and auth_id in ($auth_ids)") -> select();//顶级权限
            $auth_infoB  = model('Auth') -> where("auth_level=1 and auth_id in ($auth_ids)") -> select();//次顶级权限
        }

//        dump($auth_info);
        $this -> assign('auth_infoA', $auth_infoA);
        $this -> assign('auth_infoB', $auth_infoB);
        return $this -> fetch();
    }
    //右侧
    public function right()
    {
         //dump(get_defined_constants(true));
        return $this -> fetch();
    }
    

    
}
