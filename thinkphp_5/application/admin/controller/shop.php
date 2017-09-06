<?php
    namespace app\admin\controller;
    use think\Controller;
//    use app\admin\Model;
    use think\Request;
    //use think\image;
    //引入自定义类,extend下
    use tools\Page;
    use image\Image;

    class Shop extends Controller
    {
        public function show()
        {
            $obj = model('abc');
           
            //实现数据分页
            //1获得数据总条数
            $total = $obj -> count();//select count(*) from abc;另有max(),min(),sum()方法
            $per = 7;//每页显示7条
            
            //2实例化分页类对象
            $page_obj = new page($total, $per);
            
            //3拼装sql语句获得每页信息
            $sql = "select * from abc order by id desc " . $page_obj->limit;
            $info = $obj -> query($sql);
            
            //4获得页码列表
            $pagelist = $page_obj -> fpage([3,4,5,6,7,8]);
            //商品展示
//            $info = $obj ->order('id desc')->select();
            $this -> assign('pagelist',$pagelist);
            $this -> assign('info',$info);
           // dump($this);
            return $this -> fetch();
        }
        //添加商品
        public function add()
        {
            $obj = model('abc');
            
            if(!empty($_POST['text'])&&!empty($_POST['num'])&&$_FILES['iterm']['error']==0){
           // if(request::instance()->isPost()){
                //获取表单上传文件
                $file = request()->file('iterm');
                //移动到根目录/public/uploads/目录下,并以日期建立文件夹,以微秒时间的 md5 编码为文件名
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                if($info){
                    //上传成功后获取上传信息
//                    //输出图片类型
//                    echo $info->getExtension();
//                    //返回的是文件的服务器地址
//                    echo $info->getSaveName();
//                    //返回的是文件在服务器中的名字
//                    echo $info->getFilename();
//                    //返回的是文件的完整路径
//                    echo $info->getPathName();
                    
                    //把文件地址存入数据库iterm字段中
                    $_POST['iterm'] = $info->getSaveName();

                    //给上传的图片做缩略图
//                    $imgSrc = ROOT_PATH . 'public' . DS . 'uploads' . DS . $info->getSaveName();
//                    $imgSrc = $info->getPathName();
//                    $img = Image::open($imgSrc);
                    $img = Image::open($info->getPathName());
                    $img->thumb(150,150,\image\Image::THUMB_CENTER);//设置缩略图效果
//                    $small_iterm = $file->move(ROOT_PATH . 'public' . DS . 'uploads_small');
//                    echo $file->getError();
//                    dump($small_iterm);
                    //save必须要绝对地址
                    $imgSrc = ROOT_PATH . 'public' . DS . 'uploads_small' . DS . md5(time()) . '.jepg';
                    $img->save($imgSrc);
                    
                    //以/为界分割字符串
                    $imgSrcE = explode('/',$imgSrc);
                    //合并字符串以/连接
                    $imgSrcI = implode('/',[$imgSrcE[7],$imgSrcE[8]]);
                    //数据库存入等于getName的服务器地址
                    $_POST['small_iterm'] = $imgSrcI;
                }else{
                    //上传失败获取错误信息
                    echo $file->getError();
                }
                //处理上传的图片
                //dump($_FILES);
                $z = $obj->insert($_POST);
                if($z){
                    return $this ->success('成功','show','',2);
                }else{
                    return $this ->error('失败','','',2);
                }
            }else{
                return $this -> fetch();
            }
        }
        //修改商品
        public function update($id)
        {
            $obj = model('abc');
            if(!empty($_POST)){
                $id = input('post.id');
//                $a = input('post.num');
//                $b = input('post.text');
                $z = $obj->allowField(['num','text'])->save($_POST,['id'=>$id]);
//                dump($_POST);
                
                //修改图片
                $file = request()->file('iterm');
                //链式查询查找id为$id的iterm字段的数据
                $old = $obj-> field('iterm')->find($id);
//                dump($old);
                
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                
                if($z){
                    return $this ->success('成功','show','',2);
//                     return $this ->redirect('show',array(),2,'chenggong');
                }else{
                    return $this ->error('失败');
//                    return $this ->redirect('update',['id'=> $id]);
                }
            }else{
                $info = $obj ->find($id);
                //dump($info);
                $this ->assign('info',$info);
                return $this -> fetch();
            }
        }
        
    }
