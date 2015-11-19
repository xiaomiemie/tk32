define(['jquery'],function($){
  $('.favorite span').on('click',function(){
    if($(this).css('color')=='rgb(238, 238, 238)'){
      
      $.ajax({
        type:'GET',
        url:'data/nickName.json'
        // data:{}
      }).success(function(data){
        $('.favorite span').css('color','#F3B502');
        $('.floatWord').stop().animate({
          'opacity':'0'
        },400,function(){
          $('.floatWord').css('opacity','1').html('取消收藏')
        })
      }).fail(function(){
        alert('异常')
      })
    }else{
      $.ajax({
        type:'GET',
        url:'data/nickName.json'
        // data:{}
      }).success(function(data){
        $('.favorite span').css('color','#eee');
        $('.floatWord').stop().animate({
          'opacity':'0'
        },400,function(){
          $('.floatWord').css('opacity','1').html('点击收藏')
        })
      }).fail(function(){
        alert('异常')
      })
    }
  })
})