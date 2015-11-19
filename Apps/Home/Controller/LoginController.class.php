<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){      
      $this->display('login');
    }
   
    //登录
    public function login(){
      $user = D('User');
      // $user = new \Home\Model\UserModel();  //这个也可以
      $res = $user->checkNamePwd(I(nickname),I(password));
      if($res==false){
        $this->ajaxReturn('用户名或密码错误','JSON');
      }else{
        session('nickname',$res['nickname']);
        $this->ajaxReturn($res,'JSON');
        //跳转页面 redirect();
       
      }
    }
    
    //退出
    public function logout(){
      session(null);
      $this->redirect('Login/index');
    }
}