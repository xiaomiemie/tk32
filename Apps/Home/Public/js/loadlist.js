/*
url
clearList
data:{
  pageSize:
}
*/
define(['jquery', 'loadingImg'], function($, loadingImg) {
  function loadList(opts) {
    window.classname = Math.ceil(Math.random() * 10000)
    this.c = 'class' + window.classname;
    this.opts = $.extend({}, loadList.DEFAULTS, opts);
    this.$el = this.opts.el;
    this.pageNow = 0;
    this.opts.data.pageNum = this.pageNow;
    this.bindEvent();
    $('.' + this.c).trigger('click');
    if (this.opts.clearList) {
      this.clearList();
    }
  };

  loadList.prototype.loadData = function() {
    this.pageNow++;
    var that = this;
    var loading = new loadingImg.loadingImg({
      el: $('.loading'),
      width: '100%',
      height: '100%',
      top: '0%',
      left: '0%'
    });
    loading.setPosition();
    setTimeout(function() {
      $.ajax({
        type: 'GET',
        // data:that.opts.data,
        url: that.opts.url
      }).success(function(data) {
        loading.hide();
        that.render(data.data);
        that.loadNext(data.totalCount);
      }).fail(function() {
        loading.hide();
      })
    }, 800)
  };

  loadList.prototype.render = function(data) {
    var that = this;
    var len = data.length;
    var arr = [];
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        var str = ' <li><div class="thumbnail"><img style="height:185px;" class="goodpicsmall" src="' + data[i].src + '"><div class="caption">' +
          '<h4 class="goodname">' + data[i].name  ;
          if(data[i].status==1){
            str=str+'<small>暂时下架</small>'
          }
          
          str=str+'</h4><p class="gooddetail">' + data[i].detail + '</p></div></div></li>';
        arr.push(str);
      }
    } else {
      var str = '<p>对不起，没有你想要的结果</p>';
      arr.push(str);
    }
    that.$el.append(arr.join(''))
  };

  loadList.prototype.loadNext = function(num) {
    if (Math.ceil(num / (this.opts.data.pageSize)) > this.pageNow) {
      $('.' + this.c).show();
    } else {
      $('.' + this.c).hide();
    }
  };

  loadList.prototype.bindEvent = function() {
    var that = this;
    $('.loadnext').hide();
    this.$el.parent().append('<div class= "loadnext ' + that.c + '">继续加载</div>')
    $('.' + that.c).on('click', function() {
      that.loadData();
    })
  };
  loadList.prototype.clearList = function() {
    this.$el.empty();
  }

  loadList.DEFAULTS = {
    clearList: false,
    data: {
      pageSize: '20'
    }
  };

  return {
    loadList: loadList
  }
})