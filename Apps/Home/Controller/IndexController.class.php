<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
	// $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    $this->display();
    }
    
    //type搜索
    public function typeSelect(){
      $good = M('goods');
      $type=I('type');
      $pageSize=I('pageSize');
      $pageNum=I('pageNum');
      $res = $good->where("goodtype='$type'")->order('good_id desc')->page($pageNum,$pageSize)->select();
      $r=$good->where("goodtype='$type'")->select();
      $info['totalCount']=count($r);    
       if($res!==false){
          $info['data']=$res;
          $this->ajaxReturn($info,'JSON');
       }else{
        $this->ajaxReturn(0,'JSON');
       }
    }
    //此处采用模糊查询 两个或和一个与条件
    public function search(){
      $good = M('goods');
      $type=I('type');
      $keyvalue=I('keyvalue');
      $pageSize=I('pageSize');
      $pageNum=I('pageNum');
      $where['gooddetail']=array('like',"%$keyvalue%");
      $where['goodname']=array('like',"%$keyvalue%");
      $where['_logic']='OR'; 
      $map['_complex'] = $where;
      if($type!=3){
        $map['businesstype']=array('eq',"$type");
      }     
      $res=$good->where($map)->order('good_id desc')->page($pageNum,$pageSize)->select();
      $r=$good->where($map)->select();
      $info['totalCount']=count($r);
      if($res!==false){
          $info['data']=$res;
          $this->ajaxReturn($info,'JSON');
       }else{
        $this->ajaxReturn(0,'JSON');
       }
    }
}