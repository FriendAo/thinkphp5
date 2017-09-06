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
        $auth_info  = model('Auth') -> select($auth_ids);
//        dump($auth_info);
        $this -> assign('auth_info', $auth_info);
        return $this -> fetch();
    }
    //右侧
    public function right()
    {
         //dump(get_defined_constants(true));
        return $this -> fetch();
    }
    

    
}
