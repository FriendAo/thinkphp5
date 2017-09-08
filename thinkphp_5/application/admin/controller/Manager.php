<?php
namespace app\admin\controller;
use think\Controller;
//use app\admin\validate;
//use think\captcha\captcha;

//引入自定义类,extend下
use captcha\captcha\Captcha;
    
class Manager extends Controller
{
    public function login()
    {
        if(!empty($_POST)){
            //验证码的校验
            //if($_POST['captcha'] == $_SESSION['verify_code'])
            $vry = new captcha();
            if(!$vry -> check($_POST['captcha'])){
                //验证用户名$_POST[admin_user]和密码$_POST[admin_pwd]
                $manager = model('Manager');
                $info = $manager -> checkNamePwd($_POST['admin_user'],$_POST['admin_pwd']);
                if($info){
//                    echo '用户信息OK';
                    //给用户信息session持久化操作(名字和id)
                    session('admin_name',$info['mg_name']);
                    session('admin_id',$info['mg_id']);
//                    Session::set(name,$info['name'];
//                    Session::get(admin_name)
                    //页面跳转后台
                    $this -> redirect('index/index');
                }else{
                    echo '用户名或者密码错误';
                }
                echo '验证码正确';                
            }else{
                echo '验证码错误';
            }
        }
           return $this -> fetch();        
    }
    
    function logout()
    {
        session(null);
        $this -> redirect('login');
    }
    
    public function verifyImg()
    {
        $cfg = [
            // 验证码字体大小(px)
            'fontSize' => 18,
             // 验证码图片高度
            'imageH'   => 40,
            // 验证码图片宽度
            'imageW'   => 120,
            // 验证码位数
            'length'   => 4,
            // 验证码字体，不设置随机获取
            'fontttf'  => '4.ttf',
        ];
        //实例化verify对象
        $very = new captcha($cfg);
        return $very->entry();
    }
    
    public function insert()
    {
        $obj = model('abc');
        //        $result = $this ->validate(
        //                                   [
        //                                   'num' => input('post.num'),
        //                                   'text'=> input('post.text'),
        //                                   ],
        //                                   [
        //                                   'num' => 'alphaNum',
        //                                   'text'=> 'max:2',
        //                                   ]);
        //        if(true !== $result){
        //            dump($result);
        //
        //        }
        
        $t = input('post.text');
        $d = input('post.num');
        $data = ['text' => $t, 'num' => $d];
        
        //使用命名空间引入后可以用new实例化
        //        $validate =new User();
        $validate = validate('User');
        if(!$validate->check($data)){
            dump($validate->getError());
        }
        //
        //        $validate->User::checkName(function ($value,$rule){
        //            return  $rule == $value ? 'OK' : '名字不一样';
        //        });
        
        $obj -> insert($data);
        
        //模糊查询
        $map['text'] = array('like','a%');
        $info1 = $obj -> where($map) ->select();
        
        
        
        //条件查询
        //         $info = $obj -> where('text','aaa') ->select();
        $info = $obj -> select();
        $this -> assign('info',$info);
        return $this -> fetch('insert');
    }
}
