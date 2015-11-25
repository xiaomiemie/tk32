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
          var mes = new Message.Message({
            data: '请先登录',
            type: 'alert-warning'
          });
        } else {
          var mes = new Message.Message({
            data: '出现异常',
            type: 'alert-danger'
          });
        }

      }).fail(function() {
        var mes = new Message.Message({
          data: '出现异常',
          type: 'alert-danger'
        });
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
        } else if (data == 2) {
          var mes = new Message.Message({
            data: '请先登录',
            type: 'alert-warning'
          });
        } else {
          var mes = new Message.Message({
            data: '出现异常',
            type: 'alert-danger'
          });
        }

      }).fail(function() {
        var mes = new Message.Message({
          data: '出现异常',
          type: 'alert-danger'
        });
      })
    }
  })
})