<?php
    namespace app\admin\model;
    
    use think\Model;
    
    class Manager extends Model
    {
//        // 设置当前模型对应的完整数据表名称
//        protected $table = 'user';
//        //默认自动查询主键，可单独设定主键
//        protected $pk = 'uid';
        //校验用户名和密码
        function checkNamePwd($name,$pwd)
        {
            //实现select * from user where name = $name and pwd = $pwd;
            //1.根据$name查询是否存在记录
            $z = $this ->  where('mg_name' , $name) -> find();
//            $z = $this -> where('name' , $name) ->field('pwd')-> find();
//            dump($z);//匹配成功是$z为pwd的值,失败为null
//            exit;
            if($z){
                //2.将查询到记录中的pwd和$pwd比较
                if($z['mg_pwd'] == $pwd){
                    return $z;
                }
            }
            return null;
        }
    }
