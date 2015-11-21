<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <title>注册</title>
  <meta charset='utf-8'>
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/tk32/Apps/Home/Public/css/common/header.css">
  <script type="text/javascript" src="/tk32/Apps/Home/Public/framework/require.js" data-main='/tk32/Apps/Home/Public/js/register/registerapp'></script>
</head>
<body>
  <header class="topbar">
    <a href='<?php echo U('Index/index');?>' class="logo-link">
      <!-- <img src=''/>
      -->
    川大租赁买卖信息共享网
    </a>
    <div class="login-link">
      <span>我已注册，现在就&nbsp;</span>
      <a class="btn btn-default" href='<?php echo U("Index/index");?>'>返回主页</a>
    </div>
  </header>

  <div class="main-reg">
    <form class="form-horizontal" name="registerform">
      <div class="form-group has-feedback">
        <label  class="col-sm-2 control-label">姓名</label>
        <div class="col-sm-10">
          <input type="text" name="realname" class="form-control" placeholder="确保填写真实姓名"></div>
      </div>

      <div class="form-group  has-feedback">
        <label class="col-sm-2 control-label">昵称</label>
        <div class="col-sm-10">
          <input type="text" name='nickName' class="form-control" placeholder='数字字母下划线(6-20位)'>
          <span class='isUsed' style="font-size: 12px;color: red;display: none;">已被占用</span>
        </div>
      </div>

      <div class="form-group  has-feedback">
        <label class="col-sm-2 control-label">密码</label>
        <div class="col-sm-10">
          <input type="password" name='password' class="form-control" placeholder="密码"></div>
      </div>

      <div class="form-group  has-feedback">
        <label class="col-sm-2 control-label">密码确认</label>
        <div class="col-sm-10">
          <input type="password" name='passwordOK' class="form-control" placeholder="密码确认"></div>
      </div>

      <div class="form-group  has-feedback">
        <label class="col-sm-2 control-label">手机号</label>
        <div class="col-sm-10">
          <input type="text" name='phoneNum' class="form-control" placeholder="与您沟通的必要方式"></div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
            <label>
              <input type="checkbox" name="isAgree">
              阅读并接受
              <a href=''>《租赁买卖协议》</a>
            </label>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="button" class="btn btn-primary" style='width:200px;font-size:20px;'>注册</button>
        </div>
      </div>
    </form>

  </div>

  <footer style="text-align: center;font-size: 12px;color:#ccc;margin-top:50px;">2015©租赁买卖网</footer>

</body>
</html>