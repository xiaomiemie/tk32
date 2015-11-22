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
    <div class="favorite"><span class="glyphicon glyphicon-star"></span>
    <div class="floatWord">点击收藏</div></div>
    
  <h2 class="name">牛仔布鞋</h2>
  <p class="price text-primary">¥20<span>可议价</span><span>出售</span></p>
  <p class="owner text-primary"><span>杨</span>同学</p>
  <p class="connect text-primary">联系方式：<span>15682566795</span></p>
  <p class="detail text-primary">2015春秋冬新款韩版淑女中长款大衣小香风修身百搭毛呢裙摆风衣潮</p>

  <p class="imgp"><img src="image/cloth1.jpg"></p>
  <p class="imgp"><img src="image/cloth2.jpg"></p>
  <p class="imgp"><img src="image/cloth1.jpg"></p>
  <p class="imgp"><img src="image/cloth3.jpg"></p>
  <p class="imgp"><img src="image/cloth4.jpg"></p>
  <p class="imgp"><img src="image/cloth5.jpg"></p>
</div>





  <!-- 头部信息 -->
   <header class="header">
    <span class="logo-name">租赁买卖信息网</span>
    <ul class='nav-ul'>

      <?php if($_SESSION['nickname']!= ''): ?><li class='loginnickName'>
          <?php echo (session('nickname')); ?>
          <ul class="menu-ul">
          
            <li >
              <a href="<?php echo U('Personal/index');?>">个人中心</a>
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