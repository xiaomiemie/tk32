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
        if(!empty($_FILES)){
          $upload = new \Think\Upload();// 实例化上传类
          // $upload->maxSize   =     3145728 ;// 设置附件上传大小
          // $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
          $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
          $upload->savePath  =''; // 设置附件上传（子）目录
          // 上传文件 
          $info   =   $upload->upload();
          
          if(!$info) {// 上传错误提示错误信息
            $this->ajaxReturn('至少上传一张图片','JSON');
          }else{// 上传成功
            $data['goodname'] = I(goodname);              
            $data['goodprice'] = I(goodprice);              
            $data['changeprice'] = I(changeprice);              
            $data['businesstype'] = I(businesstype);              
            $data['goodtype'] = I(goodtype);
            $data['owner']=I(owner);
            $data['gooddetail']=I(gooddetail);
           $data['status'] ='1';
            $count = count($info);
            for($i=1;$i<=$count;$i++){
              $data['goodimg'.$i]=$info['imgupdate'.$i]['savepath'].$info['imgupdate'.$i]['savename'];
            }
            // $goods->goodimg1 = 
            $res = $goods->add($data);
            if($res){
              $this->ajaxReturn('success','JSON');
              // $this->ajaxReturn($_FILES,'JSON');
            }else{
              $this->ajaxReturn('数据库错误','JSON');
            }              
            
          }
    
        }
      
      
    }
}