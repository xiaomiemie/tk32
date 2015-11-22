<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>个人中心</title>
  <meta charset='utf-8'>
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/index.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/personal/personal.css">
  <script type="text/javascript" src="/tk32/Apps/Home/Public/framework/require.js" data-main='/tk32/Apps/Home/Public/js/personalCenter/personalapp'></script>
</head>
<body>
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
  <div class="personal">
    <div class="nav-tool">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
          <a href="#basicInfo" role="tab" data-toggle="tab">基本信息</a>
        </li>
        <li role="presentation">
          <a href="#myGoods"  role="tab" data-toggle="tab">我的货单</a>
        </li>
        <li role="presentation">
          <a href="#updateGood" role="tab" data-toggle="tab">上传新货</a>
        </li>
        <li role="presentation">
          <a href="#myCollection" role="tab" data-toggle="tab">我的收藏</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <!-- 基本信息 -->
        <div role="tabpanel" class="tab-pane active" id="basicInfo">
          <form class="form-horizontal">
            <div class="form-group">
              <label  class="col-sm-2 control-label">姓名</label>
              <div class="col-sm-10">
                <input type="text" name="username" disabled class="form-control" value="<?php echo (session('realname')); ?>"></div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">密码</label>
              <div class="col-sm-10">
                <input type="password" name='password' disabled class="form-control" value="<?php echo (session('password')); ?>"></div>
            </div>

            <div class="form-group  has-feedback">
              <label class="col-sm-2 control-label">昵称</label>
              <div class="col-sm-10">
                <input type="text" name='nickName' disabled class="form-control" value="<?php echo (session('nickname')); ?>"></div>
            </div>

            <div class="form-group  has-feedback">
              <label class="col-sm-2 control-label">手机号</label>
              <div class="col-sm-10">
                <input type="text" name='phoneNum' class="form-control"  value="<?php echo (session('phonenum')); ?>"></div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="button" name='saveBasicInfo' class="btn btn-primary" style='width:200px;font-size:20px;'>保存</button>
              </div>
            </div>
          </form>
        </div>
        <!-- 我的货单 -->
        <div role="tabpanel" class="tab-pane clearfloat" id="myGoods">
          <ul class="goodlist"></ul>
        </div>
        <!-- 我的收藏 -->
        <div role="tabpanel" class="tab-pane clearfloat" id="myCollection">
          <ul class="goodlist"></ul>
        </div>
        <!-- 上传新货 -->
        <div role="tabpanel" class="tab-pane" id="updateGood">
          <form class="form-horizontal" name="updateGoods" enctype='multipart/form-data'>
            <div class="form-group has-feedback">
              <label  class="col-sm-2 control-label">物品名称</label>
              <div class="col-sm-10">
                <input type="text" name="goodname" class="form-control" placeholder="物品名称(少于10字符)"></div>
            </div>
            <div class="form-group has-feedback">
              <label class="col-sm-2 control-label">价格</label>
              <div class="col-sm-10">
                <input type="text" name='goodprice' class="form-control" placeholder="文字描述(少于10字符) eg:5元/斤"></div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <label class="checkbox-inline" style="margin-right:30px;">
                  <input type="checkbox" name="changeprice" checked value='1'/>
                  可议价
                </label>

                <label class="radio-inline">
                  <input type="radio" name="businesstype"  value="0" >转租</label>
                <label class="radio-inline">
                  <input type="radio" name="businesstype"  value="1">出售</label>
                <label class="radio-inline">
                  <input type="radio" name="businesstype" value="2" checked='true'>可租可卖</label>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">物品分类</label>
              <div class="col-sm-10">
                <label class="radio-inline">
                  <input type="radio" name="goodtype" value="0" >服装饰品</label>
                <label class="radio-inline">
                  <input type="radio" name="goodtype" value="1" >零食水果</label>
                <label class="radio-inline">
                  <input type="radio" name="goodtype" value="2" >生活娱乐</label>
                <label class="radio-inline">
                  <input type="radio" name="goodtype" value="3" >学习用品</label>
                <label class="radio-inline">
                  <input type="radio" name="goodtype" value="4" >电子产品</label>
                <label class="radio-inline">
                  <input type="radio" name="goodtype" value="5" checked>其他</label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">物品描述</label>
              <div class="col-sm-10">
                <textarea name='gooddetail'></textarea>
                <span class='remain text-muted'>
                  还剩
                  <span class="remainnum">160</span>
                  个字
                </span>
              </div>
            </div>

            <div class="form-group ">
              <label class="col-sm-2 control-label">图片上传</label>
              <div class="col-sm-10">
                <input type="file" id='img1' name='imgupdate1' class="form-control"></div>
            </div>
            <div class="form-group ">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="file" id='img2' name='imgupdate2' class="form-control"></div>
            </div>
            <div class="form-group ">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="file" id='img3' name='imgupdate3' class="form-control"></div>
            </div>
            <div class="form-group ">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="file" id='img4' name='imgupdate4' class="form-control"></div>
            </div>
            <div class="form-group ">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="file" id='img5' name='imgupdate5' class="form-control"></div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-5">
                <button type="button" name='updateButton' class="btn btn-primary" style='width:200px;font-size:20px;'>上传</button>
              </div>
              <div class=" col-sm-5">
                <button type="reset"  class="btn btn-primary" style='width:200px;font-size:20px;'>重置</button>
              </div>
            </div>
          </form>
        </div>

      </div>
      <!-- aaa --> </div>

  </div>
  <div class="loading"></div>
  

  <footer style="text-align: center;font-size: 12px;color:#ccc;margin-top:50px;">2015©租赁买卖网</footer>

</body>
</html>