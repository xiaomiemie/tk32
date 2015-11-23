<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>详细图文</title>
  <meta charset='utf-8'>
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/index.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/item/item.css">
  <script type="text/javascript" src="/tk32/Apps/Home/Public/framework/require.js" data-main='/tk32/Apps/Home/Public/js/item/itemapp'></script>
</head>
<body>

<div class="main-item">
    <div class="favorite">
    <?php if($res['collection']){ ?>
    <span class="glyphicon glyphicon-star starspan2" data-id="<?php echo ($res['content']['good_id']); ?>"></span>
    <div class="floatWord">取消收藏</div>
    <?php }else{ ?>
    <span class="glyphicon glyphicon-star starspan1" data-id="<?php echo ($res['content']['good_id']); ?>"></span>
    <div class="floatWord">点击收藏</div>
    <?php } ?>
    
    </div>
    
  <h2 class="name"><?php echo ($res['content']['goodname']); ?></h2>
  <p class="price text-primary"><?php echo ($res['content']['goodprice']); ?>
  <span>
    <?php if($res['content']['changeprice']){ ?>
    可议价
  <?php }else{ ?>
  不接受议价<?php } ?>
  </span>
  <span>
      <?php  $type = $res['content']['businesstype']; if($type==0){ ?>
   转租
  <?php }else if($type == 1){ ?>
  出售<?php }else{ ?>
  可转租可出售
  <?php } ?>
  </span>
  </p>
  <p class="owner text-primary"><span><?php echo substr($res['user']['realname'],0,3) ?></span>同学</p>
  <p class="connect text-primary">联系方式：<span><?php echo ($res['user']['phonenum']); ?></span></p>
  <p class="detail text-primary"><?php echo ($res['content']['gooddetail']); ?></p>
<?php
$len = count($res['imgs']); for($i=1;$i<=$len;$i++){ ?>
  <p class="imgp"><img src="/tk32/Apps/Home/Public/<?php echo ($res['imgs'][$i]); ?>"></p>
<?php } ?>
  

</div>

  <!-- 头部信息 -->
   <header class="header">
    <span class="logo-name">租赁买卖信息网</span>
    <ul class='nav-ul'>

      <?php if($_SESSION['nickname']!= ''): ?><li class='loginnickName'>
          <?php echo (session('nickname')); ?>
          <ul class="menu-ul">
          
            <li >
              <a target="_blank" href="<?php echo U('Personal/index');?>">个人中心</a>
            </li>
            <li class="logoutbutton"><a href="<?php echo U('Login/logout');?>">退出</a></li>
          </ul>
        </li>
        <?php elseif(1): ?>  
        <li style="width:50px">
          <a href=" <?php echo U('Login/index');?>">登录</a>
        </li>

        <?php else: ?>  
        <a href="<?php echo U('Login/index');?>">登录1</a><?php endif; ?>

      <li style="width:30px">
        <a href="<?php echo U('Register/index');?>">注册</a>
      </li>
    </ul>
  </header>
  
  <footer style="text-align: center;font-size: 12px;color:#ccc;margin-top:50px;">2015©租赁买卖网</footer>
</body>
</html>