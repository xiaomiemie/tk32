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
      $user = D('User');
      $flag = $user->checkSession();
      if($flag){
        $nickname = session('nickname');
      $data['phonenum']=I('phonenum');
      $res = $user->where("nickname='$nickname'")->save($data); // 根据条件更新记录
      if($res!== false){
        $info='1';
      }else{
        $info='0';
      }
    }else{
      $info='err';
    }
      
      $this->ajaxReturn($info,'JSON');
    }
    
    //2.我的货单
    public function myGoodList(){
      $user = D('User');
      $flag = $user->checkSession();
      if($flag){
        $goods = M('goods');
        $nickname = session('nickname');
        $list = $goods->where("nickname='$nickname'")->order('good_id desc')->page(I('pageNum'),I('pageSize'))->select();
        $count = $goods->where("nickname='$nickname'")->count();
        $res['list']=$list;
        $res['totalCount']=$count;
        if($res){
          $this->ajaxReturn($res,'JSON');
        }else{
          $this->ajaxReturn('0','JSON');//异常数据库操作
        }
      }else{
        $this->ajaxReturn('1','JSON');//未登录
      }
     
    }
    //2.1 下架商品
    public function underGood(){
      $user = D('User');
      $flag = $user->checkSession();
       if($flag){
          $goods = M('goods');
          $data['status']=I('status');
          $id=I('id');
          $res = $goods->where("good_id='$id'")->save($data);
          if($res!==false){
            $info=$goods->where("good_id='$id'")->select();
            $this->ajaxReturn($info,'JSON');
          }else{
            $this->ajaxReturn('0','JSON');
          }
       }else{
         $this->ajaxReturn('err','JSON');
       }

    }
    // 2.2 商品上架
    public function upGood(){
       $user = D('User');
      $flag = $user->checkSession();
       if($flag){
          $goods = M('goods');
          $data['status']=I('status');
          $id=I('id');
          $res = $goods->where("good_id='$id'")->save($data);
          if($res!==false){
            $info=$goods->where("good_id='$id'")->select();
            $this->ajaxReturn($info,'JSON');
          }else{
            $this->ajaxReturn('0','JSON');
          }
      }else{
        $this->ajaxReturn('err','JSON');
      }

    }
    //2.3 删除商品
    public function delGood(){
       $user = D('User');
      $flag = $user->checkSession();
       if($flag){
          $goods = M('goods');
      $id=I('id');
      $res = $goods->where("good_id='$id'")->delete();
       if($res){
        $this->ajaxReturn($res,'JSON');
      }else{
        $this->ajaxReturn('0','JSON');
      }
       }else{
        $this->ajaxReturn('err','JSON');
       }
     
    }
    
   //3.上传新货 
    public function update(){
       $user = D('User');
      $flag = $user->checkSession();
       if($flag){
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
              $data['goodimg'.$i]=strstr($info['imgupdate1']['savepath'], "Uploads").$info['imgupdate'.$i]['savename'];
            }
            $res = $goods->add($data);
            if($res){
              $this->ajaxReturn('1','JSON');//成功
            }else{
              $this->ajaxReturn('0','JSON');//失败
            }                         
          }   
        }else{
          $this->ajaxReturn('3','JSON');//至少传一张图
        }
      }else{
        $this->ajaxReturn('2','JSON');//没登陆
      }
      
    }
    
    //4 我的收藏
    public function myCollection(){
       $user = D('User');
      $flag = $user->checkSession();
       if($flag){
          $Model =  D();
      $pageNum=I('pageNum');
      $pageSize=I('pageSize');
       $goods = M('Goods');
       $col = M('collection');
       $nickname=session('nickname');
        $datares = $col->where("nickname = '$nickname'")->order('good_id desc')->page(I('pageNum'),I('pageSize'))->field('good_id')->select();      
        $count=count($col->where("nickname = '$nickname'")->select());
        $info['totalCount']=$count;
        if($datares!==null){ //我的收藏不为空
          $datares['_logic']='OR'; 
          $res = $goods->where($datares)->select();
           if($res!==false){ //查询具体商品没错
            $info['data']=$res;
            $this->ajaxReturn($info,'JSON');
          }        
        }else{  //为空
          $info['data']=null;
          $this->ajaxReturn($info,'JSON');
        }
      }else{
        $this->ajaxReturn('1','JSON');
      }
     
        
    }
}