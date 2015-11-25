<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>首页</title>
  <meta charset='utf-8'>
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/index.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/form.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/content.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/toolbar.css">
  <script type="text/javascript" src="/tk32/Apps/Home/Public/framework/require.js" data-main='/tk32/Apps/Home/Public/js/index/indexapp'></script>
  <!-- // <script type="text/javascript" src="framework/bootstrap.min.js"></script>
-->
</head>
<body>

<div class="main">
  <!-- search -->
  <div class="search">
    <select class="form-control select-radius" id='searchtype'>
      <option value='3' selected>全部</option>
      <option value='0'>转租</option>
      <option value='1'>出售</option>
      <option value='2'>可租可售</option>
    </select>
    <input type="text" id='searchinput' class="form-control input-radius" placeholder="关键词" />
    <button type="submit" class="btn btn-info" id="searchbutton" style="width:80px">搜索</button>
  </div>
  <!-- content -->
  <div class="content">

    <div class="leftlist">
      <div class="panel panel-info">
        <!-- Default panel contents -->
        <div class="panel-heading heading-text">快速入口</div>
        <div class="panel-body">
          <div class="list-group">
            <a href="#" class="list-group-item" data-type="0">服装饰品</a>
            <a href="#" class="list-group-item" data-type='1'>零食水果</a>
            <a href="#" class="list-group-item" data-type='2'>生活娱乐</a>
            <a href="#" class="list-group-item" data-type='3'>学习用品</a>
            <a href="#" class="list-group-item" data-type='4'>电子产品</a>
            <a href="#" class="list-group-item" data-type='5'>其他</a>
          </div>
        </div>
      </div>
    </div>

    <div class="rightlist clearfloat">

      <ul class="goodlist"></ul>
      <!-- <div class="loadnext">继续加载</div>
    -->
  </div>

</div>
<!-- main end -->
</div>

<div class="loading">
<img src="/tk32/Apps/Home/Public/image/loading2.jpg"></div>
<!--工具条-->
<div class="toolbar">
<span class="toolbar-item"></span>
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