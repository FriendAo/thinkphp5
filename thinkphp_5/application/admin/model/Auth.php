<?php
    namespace app\admin\model;
    
    use think\Model;
    
    class Auth extends Model
    {
        //实现path和level的制作,并完善信息记录的全部字段并写入数据表
        public function saveData($four){
            //1.根据已有的4个字段生成新纪录
            $newId = $this -> insertGetId($four);
           
            //2.根据新纪录制作path和level
            //A.制作path
            if($four['auth_pid'] == 0 ){
                //2.1顶级权限:全路径 = 新记录id值
                $path = $newId;
            }else{
                //2.2非顶级权限:全路径 = 父级全路径 - 本身id值
                $pinfo = $this -> find($four['auth_pid']);
                $p_path = $pinfo['auth_path'];//父级全路径
                $path = $p_path ."-". $newId;
            }
            //B.制作level
            //规则:等级 = 全路劲里"-"的个数
            $level = substr_count($path,'-');
            
            //把path和level更新到新纪录
            $sql = "update auth set auth_path='$path',auth_level='$level' where auth_id='$newId'";
            return $this -> execute($sql);
        }
    }
