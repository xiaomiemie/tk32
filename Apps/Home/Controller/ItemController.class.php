<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class ItemController extends Controller {
    public function index(){
      $id=$_GET['id'];
      $good=M('goods');
      $user=M('User');
      $res = $good->where("good_id='$id'")->select();
      $r=$res[0];
      $nickname=$r['nickname'];
      $u=$user->where("nickname='$nickname'")->select();
      $info['content']=$r;
      $info['user']=$u[0];
      for($i=1;$i<6;$i++){
        if($r['goodimg'.$i]){
          $imgs[$i]=$r['goodimg'.$i];
        }else{
          break;
        }
      }
      $info['imgs']=$imgs;
      if($info){
        // show_bug($info);
        // $this->assign('res',$res);
        $this->assign('res',$info);
        $this->display('item');
      }
      
    }
    
}