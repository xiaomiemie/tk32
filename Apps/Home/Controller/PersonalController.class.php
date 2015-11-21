<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;

class PersonalController extends Controller {
  //1基本信息
    public function index(){
      if(session('?nickname')){
        $this->display('personal');
      }else{
        $this->show('<a href="{:U("Login/index")}">請先登錄</a>');
      }      
    }
    //1、改变手机号
    public function changePhoneNum(){
      $user = M('User');
      $nickname = session('nickname');
      $data['phonenum']=I('phonenum');
      $res = $user->where("nickname='$nickname'")->save($data); // 根据条件更新记录
      if($res!== false){
        $info='修改成功';
      }else{
        $info='修改失败';
      }
      $this->ajaxReturn($info,'JSON');
    }
    
   //3.上传新货 
    public function update(){
      $goods = M('goods');     
        if(!empty($_FILES)){

          $config = array(
            'rootPath' => 'Uploads',
            'savePath' => '/../Apps/Home/Public/Uploads/',          
            'exts' => array('jpg', 'gif', 'png', 'jpeg'),
            );          
          $upload = new \Think\Upload($config);// 实例化上传类
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
            $data['nickname']=session('nickname');
            $data['gooddetail']=I(gooddetail);
           $data['status'] =1;
            $count = count($info);
            for($i=1;$i<=$count;$i++){
              $data['goodimg'.$i]='__PUBLIC__/'.strstr($info['imgupdate1']['savepath'], "Uploads").$info['imgupdate'.$i]['savename'];
              // $data['goodimg'.$i]='Uploads/'.$info['imgupdate'.$i]['savename'];
            }
            $res = $goods->add($data);
            if($res){
              $this->ajaxReturn(session('nickname'),'JSON');
              // $this->ajaxReturn($_FILES,'JSON');
            }else{
              $this->ajaxReturn('数据库错误','JSON');
            }              
            
          }
    
        }
      
      
    }
}