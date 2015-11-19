define(['jquery', 'validate'], function($, validateForm) {

  var v = new validateForm.validateForm();
  var flag1, flag2, flag3, flag4, flag5, flag6, flag7, flag8;
  $('[name=nickName]').on('blur', function() {
    var el = $(this);
    var value = el.val();
    if (value != '') {
      $.ajax({
        type: 'GET',
        url: 'Register/nickCheck',
        data:{
          nickName:value
        }
      }).success(function(data) {
        // console.log(data);
        if (data.data == false) { //被占用
          el.next().show();
          flag6 = false;
        } else {
          el.next().hide();
          flag6 = true;
        }
      }).fail(function() {
        alert('异常')
      })
    }
  });
  // v.requireText($('[name=realname]'))
  $('[type=button]').on('click', function() {

    flag1 = v.requireText($('[name=realname]'));

    flag2 = v.regex({
      el: $('[name=password]'),
      reg: /^[\w]{6,20}$/
    });
    flag3 = v.regex({
      el: $('[name=passwordOK]'),
      reg: /^[\w]{6,20}$/
    });

    flag7 = v.regex({
      el: $("[name='nickName']"),
      reg: /^[\w]{6,20}$/
    });
    // 手机号
    flag8 = v.regex({
      el:$('[name=phoneNum]'),
      reg: /^[\d]{11}$/
    });


    flag4 = v.checkEqual($('[name=password]'), $('[name=passwordOK]'));
    flag5 = v.requireCheck($('[name=isAgree]'));
    if (flag1 && flag2 && flag3 && flag4 && flag5 && flag6 && flag7 && flag8) {
      $(this).prop('disabled', true);
      // console.log($('[name=registerform]').serializeArray())
      $.ajax({
        url: 'Register/register',
        data: $('[name=registerform]').serializeArray(),
        // data:{
        //   'realname':'xiaoming'
        // },
        type: 'POST'
      }).success(function(data) {
        console.log(data);
        alert('注册成功');
      }).fail(function() {
        alert('出现异常')
      });
    }
  })
})