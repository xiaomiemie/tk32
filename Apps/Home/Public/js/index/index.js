define(['jquery', 'loadlist', 'scrollto', 'leftscroll', 'typeclick'], function($, loadList, scrollto, leftScroll, typeClick) {
  
  var scrollto = new scrollto.scrollTo({
    el: $('.toolbar .toolbar-item')
  });
  scrollto.move();
  // var load = new loadList.loadList({
  //   url:'data/goodlist.json',
  //   el:$('.rightlist .goodlist')//传入的是ul
  // });

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
})