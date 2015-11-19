<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

class PersonalController extends Controller {
    public function index(){
      
  // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
      $this->display('personal');
    }
    
    public function update(){
          
         
      $goods = M('goods');
      // // $goods->realname = I(goodname);
      // if(!empty($_POST)){
     
        if(!empty($_FILES)){
          // $update=new Upload();
          $upload = new \Think\Upload();// 实例化上传类
         
          
          // $upload->maxSize   =     3145728 ;// 设置附件上传大小
    // $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
    $upload->savePath  =     ''; // 设置附件上传（子）目录
    // 上传文件 
    $info   =   $upload->upload();
    if(!$info) {// 上传错误提示错误信息
        // $this->error($upload->getError());
        
          $data['status'] = 1;
      $data['info'] = 'info';
      $data['content'] = $_FILES['imgupdate1'];
     
      $this->ajaxReturn('error','JSON');
    }else{// 上传成功
        // $this->success('上传成功！');
      // $data['photo'] = $info[0]['savename'];
      $this->ajaxReturn($info,'JSON');
    }
    
          
          
        
          // $this->success();
        }
        // $this->ajaxReturn('1',"新增成功！",1);
        // $goods->create();//收集post表单数据
        // $z = $goods->add();
        // $this->ajaxReturn('ass',"新增成功！",1);
      
      
    }
}