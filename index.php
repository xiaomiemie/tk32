<?php
//制作一个输出调试函数
function show_bug($msg){
   echo '<pre>';
      var_dump($msg);
            echo '<pre>';
}
define('APP_NAME','Apps');
define('APP_PATH','./Apps/');
define('APP_DEBUG',TRUE);
require('./ThinkPHP/ThinkPHP.php');
?>