define(['jquery'], function($) {
  $('.favorite span').on('click', function() {
    var id = $(this).data('id');
    console.log(id)
    if ($(this).css('color') == 'rgb(238, 238, 238)') {
      //添加收藏
      $.ajax({
        type: 'POST',
        url: 'addCollection',
        data: {
          id: id
        }
      }).success(function(data) {
        console.log(data)
        if (data == 1) {
          $('.favorite span').css('color', '#F3B502');
          $('.floatWord').stop().animate({
            'opacity': '0'
          }, 400, function() {
            $('.floatWord').css('opacity', '1').html('取消收藏')
          })
        } else if (data == 2) {
          alert('您已收藏过该商品');
        } else {
          alert('添加失败')
        }

      }).fail(function() {
        alert('异常')
      })
    } else {
      //取消收藏
      $.ajax({
        type: 'POST',
        url: 'delCollection',
        data: {
          id: id
        }
      }).success(function(data) {
        if (data == 1) {
          $('.favorite span').css('color', '#eee');
          $('.floatWord').stop().animate({
            'opacity': '0'
          }, 400, function() {
            $('.floatWord').css('opacity', '1').html('点击收藏')
          })
        }else if(data ==2){
          alert('请先登录');
        }else{
          alert('出现异常');
        }

      }).fail(function() {
        alert('异常')
      })
    }
  })
})