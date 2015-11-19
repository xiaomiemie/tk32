define(['jquery', 'validate'], function($, validateForm) {

  var v = new validateForm.validateForm();
  // v.requireText($('[name=username]'))
  $('[type=button]').on('click', function() {
    var flag1, flag2;
    flag1 = v.requireText($('[name=nickName]'));
    flag2 = v.regex({
      el: $('[name=password]'),
      reg: /^[\w]{6,20}$/
    });
    if (flag1 && flag2) {
      $(this).prop('disabled', true);
      $.ajax({
        url: 'Login/login',
        data: {
          'nickname':$('[name=nickName]').val(),
          'password':$('[name=password]').val()
        },
        type: 'POST'
      }).success(function(data){
        console.log(data);
        window.location.href="/tk32/index.php/Home/personal";
      }).fail(function() {
        alert('登陆异常')
      });
    }
  })
})