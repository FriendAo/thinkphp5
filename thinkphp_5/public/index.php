<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//设定字符集
//   head("content-type:text/html;charset=utf-8");
// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
    
// 给静态资源文件设置路径
//home分组:
define('CSS_URL','/../home/public/css/');
define('IMG_URL','/../home/public/images/');
define('JS_URL','/../home/public/js/');
    
//admin分组
define('ADMIN_CSS_URL', __DIR__ .'/../admin/public/css/');
define('ADMIN_IMG_URL', __DIR__ .'/../admin/public/images/');
    
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
    
   
    
//执行一次创建build创建d需要注释掉
//$build = include '../build.php';
//运行自动生成
//\think\Build::run($build);
