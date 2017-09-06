<?php
    namespace app\admin\validate;
    use think\validate;
    
    class User extends validate
    {
        //定义方式一,合并规则和提示
//        protected $rule = [
//             ['num','max:2','名字不超过2个滋滋滋滋'],
//            ['text','num','只能是数组子']
        
        //定义方式二,分开规则和提示,并使用自定义方法
        protected $rule = [
        'num' => 'checkName:2',
        'text' => 'number',
        ];
        protected $message = [
        'num' => '不一样长哦',
        'text' => '要数字',
        ];
        protected function checkName($value,$rule,$date)
        {
            return $rule == $value ? true : '名字不一样';
        }
        
        
    }
