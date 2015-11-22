define(['jquery', 'bootstrap', 'validate', 'loadlist', 'mygoodlist', 'ajaxfileupload'], function($, b, validate, loadlist, mygoodlist, ajaxfileupload) {

  //基本信息
  var v = new validate.validateForm();
  $('#myTabs a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });
  var flag1, flag2, flag3, flag4, flag5;
   var mygoods;
  $('[name=saveBasicInfo]').on('click', function() {
    // 手机号
    flag3 = v.regex({
      el: $("[name='phoneNum']"),
      reg: /^[\d]{11}$/
    });
    if (flag3) {
      $(this).prop('disabled', true);
      $.ajax({
        url: 'Personal/changePhoneNum',
        data: {
          "phonenum": $("[name='phoneNum']").val()
        },
        type: 'POST'
      }).success(function(data) {
        $('[name=saveBasicInfo]').prop('disabled', false);
        // console.log(data)
        alert(data);
      }).fail(function() {
        alert('出现异常')
      });
    }

  });
 
  //我的货单
  $('[href="#myGoods"]').on('click', function() {
    mygoods = new mygoodlist.myGoodList({
      el: $('#myGoods .goodlist'),
      url: 'Personal/myGoodList',
      clearList: true
    });
  });

  //重新上架ok
  $('#myGoods .goodlist').on('click', '.reupdate', function() {
    var that = this;
    var parentli = $(this).parents('li');
    var id = $(this).data('id');
    $.ajax({
      data: {
        id: id,
        status: 1
      },
      url: 'Personal/upGood',
      type: 'POST'
    }).success(function(data) {
      if (data) {
        var x = mygoods.renderOne(data[0]);
        parentli.replaceWith(x);
      } else {
        alert('操作异常')
      }
    }).fail(function() {
      alert('异常');
    })
  });

  //暂时下架OK
  $('#myGoods .goodlist').on('click', '.temporary', function() {
    var that = this;
    var parentli = $(this).parents('li');
    var id = $(this).data('id');
    $.ajax({
      data: {
        id: id,
        status: 0
      },
      url: 'Personal/underGood',
      type: 'POST'
    }).success(function(data) {
      if (data) {
        var x = mygoods.renderOne(data[0]);
        parentli.replaceWith(x);
      } else {
        alert('操作异常')
      }
    }).fail(function() {
      alert('异常');
    })
  });

  //删除
  $('#myGoods .goodlist').on('click', '.permanent', function() {
    var parentli = $(this).parents('li');
    var id = $(this).data('id');
    $.ajax({
      data: {
        id: id
      },
      url: 'Personal/delGood',
      type: 'POST'
    }).success(function(data) {
      if (data) {
       parentli.remove();
      } else {
        alert('操作异常')
      }
    }).fail(function() {
      alert('异常');
    })
  })

  //我的收藏
  $('[href="#myCollection"]').on('click', function() {
    var mycollection = new loadlist.loadList({
      el: $('#myCollection .goodlist'),
      url: 'Personal/myCollection',
      clearList: true
    })
  });
  
  
  //上传新货
  var flag6, flag7;
  v.keyupLimit({
    el1: $('[name=gooddetail]'),
    el2: $('.remainnum'),
    len: 160
  });

  $('[name=updateButton]').on('click', function() {
    flag6 = v.lenlimit({
      len: 10,
      el: $('[name=goodname]')
    });
    flag7 = v.lenlimit({
      len: 10,
      el: $('[name=goodprice]')
    });
    if (flag6 && flag7) {
      var r;
      if ($('[name=changeprice]').is(':checked')) {
        r = 1;
      } else {
        r = 0;
      }

      $.ajaxFileUpload({
        url: 'Personal/update', //你处理上传文件的服务端
        secureuri: false,
        fileElementId: ['img1', 'img2', 'img3', 'img4', 'img5'],
        data: {
          'goodname': $('[name=goodname]').val(),
          'goodprice': $('[name=goodprice]').val(),
          'changeprice': r,
          'businesstype': $('[name=businesstype]:checked').val(),
          'goodtype': $('[name=goodtype]:checked').val(),
          'gooddetail': $('[name=gooddetail]').val()
        },
        dataType: 'json',
        type: 'POST',
        success: function(data) {
          console.log(JSON.parse(data));
        },
        error: function(data) {
          console.log(data)
        }
      })
    }
    // console.log($('#updateGood form').serialize())



  });

})