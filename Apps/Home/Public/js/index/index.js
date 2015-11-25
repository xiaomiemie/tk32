define(['jquery', 'loadlist', 'scrollto', 'leftscroll', 'typeclick', 'message'], function($, loadList, scrollto, leftScroll, typeClick, Message) {

  var scrollto = new scrollto.scrollTo({
    el: $('.toolbar .toolbar-item')
  });
  scrollto.move();


  //左边菜单栏
  var leftscroll = new leftScroll.leftScroll({
    el: $('.leftlist')
  });
  leftscroll.bindEvent();

  var typeclick = new typeClick.typeClick({
    el: $('.leftlist .list-group')
  });
  typeclick.bindEvent();
  typeclick.clickEvent();

  //搜索框
  $('#searchbutton').on('click', function() {
    $('.list-group a').removeClass('active');
    var type = $('#searchtype').val();
    var keyvalue = $('#searchinput').val();
    var load = new loadList.loadList({
      url: 'search',
      el: $('.rightlist .goodlist'),
      clearList:true,
      data:{
        type:type,
        keyvalue:keyvalue,
        pageSize:3
      } //传入的是ul
    });
  })
})