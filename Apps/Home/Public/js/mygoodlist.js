/*
url
clearList
data:{
  pageSize:
}
*/
define(['jquery', 'loadingImg'], function($, loadingImg) {
  function myGoodList(opts) {
    window.classname = Math.ceil(Math.random() * 100000);
    this.publicUrl = '/tk32/Apps/Home/Public/';
    this.c = 'class' + window.classname;
    this.opts = $.extend({}, myGoodList.DEFAULTS, opts);
    this.$el = this.opts.el;
    this.opts.data.pageNum =1;
    this.bindEvent();
    $('.' + this.c).trigger('click');
    if (this.opts.clearList) {
      this.clearList();
    }
  };

  myGoodList.prototype.loadData = function() {

    var that = this;
    var loading = new loadingImg.loadingImg({
      el: $('.loading'),
      width: '100%',
      height: '100%',
      top: '0%',
      left: '0%'
    });
    loading.setPosition();
      $.ajax({
        type: 'GET',
        data:that.opts.data,
        url: that.opts.url
      }).success(function(data) {
        that.opts.data.pageNum++;
        loading.hide();
        that.render(data.list);
        that.loadNext(data.totalCount);
      }).fail(function() {
        loading.hide();
      })
  };

  myGoodList.prototype.render = function(data) {
    var that = this;
    var publicUrl=that.publicUrl;
    var len = data.length;
    var arr = [];
    if (len > 0) {
      for (var i = 0; i < len; i++) {
        var str = ' <li><div class="thumbnail"><img style="height:185px;" class="goodpicsmall" src="'+publicUrl+data[i].goodimg1+'"><div class="caption">' +
          '<h4 class="goodname"><a href="{:U}">' + data[i].goodname;
        if (data[i].status == 0) {
          str = str + '</a><small>暂时下架</small>'
        }else{
          str = str + '</a>';
        }
        str = str + '</h4><p class="gooddetail">' + data[i].gooddetail + '</p><p> ';
        if (data[i].status == 0) {
          str = str + ' <a href="#" class="btn btn-info reupdate" role="button" data-status="' + data[i].status + '" data-id="' + data[i].good_id + '">重新上架</a>&nbsp;';
        } else {
          str = str + ' <a href="#" class="btn btn-info temporary" role="button" data-status="' + data[i].status + '" data-id="' + data[i].good_id + '">暂时下架</a>&nbsp;';

        }
        str = str + '<a href="#" class="btn btn-danger permanent" role="button" data-id="' + data[i].good_id + '">永久下架</a></p></div></div></li>';
        arr.push(str);
      }
    } else {
      var str = '<p>对不起，没有你想要的结果</p>';
      arr.push(str);
    }
    that.$el.append(arr.join(''))
  };

  myGoodList.prototype.loadNext = function(num) {
    if (Math.ceil(num / (this.opts.data.pageSize)) >= this.opts.data.pageNum) {
      $('.' + this.c).show();
    } else {
      $('.' + this.c).hide();
    }
  };
  
  myGoodList.prototype.renderOne=function(info){
        var publicUrl=this.publicUrl;
     var str = ' <li><div class="thumbnail"><img style="height:185px;" class="goodpicsmall" src="'+publicUrl+info.goodimg1+'"><div class="caption">' +
          '<h4 class="goodname"><a href="#">' + info.goodname;
        if (info.status == 0) {
          str = str + '</a><small>暂时下架</small>'
        }else{
          str = str + '</a>';
        }
        str = str + '</h4><p class="gooddetail">' + info.gooddetail + '</p><p> ';
        if (info.status == 0) {
          str = str + ' <a href="#" class="btn btn-info reupdate" role="button" data-status="' + info.status + '" data-id="' + info.good_id + '">重新上架</a>&nbsp;';
        } else {
          str = str + ' <a href="#" class="btn btn-info temporary" role="button" data-status="' + info.status + '" data-id="' + info.good_id + '">暂时下架</a>&nbsp;';

        }
        str = str + '<a href="#" class="btn btn-danger permanent" role="button" data-id="' + info.good_id + '">永久下架</a></p></div></div></li>';
        
        return str;
  }

  myGoodList.prototype.bindEvent = function() {
    var that = this;
    $('.loadnext').hide();
    this.$el.parent().append('<div class= "loadnext ' + that.c + '">继续加载</div>')
    $('.' + that.c).on('click', function() {
      that.loadData();
    })
  };
  myGoodList.prototype.clearList = function() {
    this.$el.empty();
  }

  myGoodList.DEFAULTS = {
    clearList: false,
    data: {
      pageSize: '3'
    }
  };

  return {
    myGoodList: myGoodList
  }
})