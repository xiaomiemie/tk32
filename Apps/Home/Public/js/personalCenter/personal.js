define(['jquery', 'bootstrap', 'validate', 'loadlist', 'mygoodlist', 'ajaxfileupload'], function($, b, validate, loadlist, mygoodlist, ajaxfileupload) {

  //基本信息
  var v = new validate.validateForm();
  $('#myTabs a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

  var flag1, flag2, flag3, flag4, flag5;
  ////
  $('[name=saveBasicInfo]').on('click', function() {
    //昵称
  
    // 手机号
    flag3 = v.regex({
      el: $("[name='phoneNum']"),
      reg: /^[\d]{11}$/
    });
    

    if (flag3 ) {
      $(this).prop('disabled', true);
      $.ajax({
        url: 'data/nickName.json',
        // data: {},
        type: 'POST'
      }).success(function(data) {
        alert('注册成功');
      }).fail(function() {
        alert('出现异常')
      });
    }

  });

  //我的货单
  $('[href="#myGoods"]').on('click', function() {
    var mygoods = new mygoodlist.myGoodList({
      el: $('#myGoods .goodlist'),
      url: 'data/goodlist.json',
      clearList: true
    });
  });

  $('#myGoods .goodlist').on('click', '.reupdate', function() {
    var id = $(this).data('id');
    $.ajax({
      data: {
        id: id,
        status: 0
      },
      url: 'data/nickName.json',
      type: 'GET'
    }).success(function(data) {
      console.log('重新上架');
      $('[href="#myGoods"]').trigger('click');
    }).fail(function() {
      alert('异常');
    })
  });
  $('#myGoods .goodlist').on('click', '.temporary', function() {
    var id = $(this).data('id');
    $.ajax({
      data: {
        id: id,
        status: 1
      },
      url: 'data/nickName.json',
      type: 'GET'
    }).success(function(data) {
      console.log('暂时下架');
      $('[href="#myGoods"]').trigger('click');
    }).fail(function() {
      alert('异常');
    })
  });
  $('#myGoods .goodlist').on('click', '.permanent', function() {
    var id = $(this).data('id');
    $.ajax({
      data: {
        id: id
          // status: 1
      },
      url: 'data/nickName.json',
      type: 'GET'
    }).success(function(data) {
      console.log('永久删除');
      $('[href="#myGoods"]').trigger('click');
    }).fail(function() {
      alert('异常');
    })
  })

  //我的收藏
  $('[href="#myCollection"]').on('click', function() {
    var mygoods = new loadlist.loadList({
      el: $('#myCollection .goodlist'),
      url: 'data/goodlist.json',
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
    if (1 || (flag6 && flag7)) {
      // console.log()
      var r ;
      if($('[name=changeprice]').is(':checked')){
         r = 1;
      }else{
        r = 0;
      }
      
      $.ajaxFileUpload({
        url: 'Personal/update', //你处理上传文件的服务端
        secureuri: false,
        fileElementId: ['img1','img2','img3','img4','img5'],
        data:{
          'goodname':$('[name=goodname]').val(),
          'goodprice':$('[name=goodprice]').val(),
          'changeprice':r,
          'businesstype':$('[name=businesstype]:checked').val(),
          'goodtype':$('[name=goodtype]:checked').val(),
          'gooddetail':$('[name=gooddetail]').val(),
          'owner':'xiaomie',
        },
        dataType: 'json',
        type:'POST',
        success: function(data) {
          console.log(JSON.parse(data));
        },
        error:function(data){
          console.log(data)
        }
      })
    }
    // console.log($('#updateGood form').serialize())



  });

})