define(['jquery', 'validate', 'message'], function($, validateForm, Message) {

  var v = new validateForm.validateForm();
  var flag1, flag2, flag3, flag4, flag5, flag6, flag7, flag8;
  $('[name=nickName]').on('blur', function() {
    var el = $(this);
    var value = el.val();
    if (value != '') {
      $.ajax({
        type: 'GET',
        url: 'nickCheck',
        data: {
          nickName: value
        }
      }).success(function(data) {
        console.log(data);
        if (data == false) { //被占用
          el.next().show();
          flag6 = false;
        } else {
          console.log(data)
          el.next().hide();
          flag6 = true;
        }
      }).fail(function() {
        var mes = new Message.Message({
          data: '出现异常',
          type:'alert-danger'
        });
      })
    }
  });
  // v.requireText($('[name=realname]'))
  $('[type=button]').on('click', function() {
    flag1 = v.requireText($('[name=realname]'));
    flag7 = v.requireText($('[name=nickName]'));
    flag2 = v.regex({
      el: $('[name=password]'),
      reg: /^[\w]{6,20}$/
    });
    flag3 = v.regex({
      el: $('[name=passwordOK]'),
      reg: /^[\w]{6,20}$/
    });

    // flag7 = v.regex({
    //   el: $("[name='nickName']"),
    //   reg: /^[\w]{6,20}$/
    // });
    // 手机号
    flag8 = v.regex({
      el: $('[name=phoneNum]'),
      reg: /^[\d]{11}$/
    });
    flag4 = v.checkEqual($('[name=password]'), $('[name=passwordOK]'));
    flag5 = v.requireCheck($('[name=isAgree]'));
    if (flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8) {
      $(this).prop('disabled', true);
      $.ajax({
        url: 'Register/register',
        // data: $('[name=registerform]').serializeArray(),
        data: {
          'realname': $('[name=realname]').val(),
          'nickname': $('[name=nickName]').val(),
          'password': $('[name=password]').val(),
          'phonenum': $('[name=phoneNum]').val()
        },
        type: 'POST'
      }).success(function(data) {
        var mes = new Message.Message({
          data: '注册成功',
          type:'alert-success'
        });
      }).fail(function() {
       var mes = new Message.Message({
          data: '操作异常',
          type:'alert-danger'
        });
      });
    }
  })
})