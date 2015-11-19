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
        url: '',
        // data: {},
        type: 'POST'
      }).success(function(data) {
        alert('登陆成功');
      }).fail(function() {
        alert('登陆异常')
      });
    }
  })
})