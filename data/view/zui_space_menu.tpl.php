<? if(!defined('IN_ASK2')) exit('Access Denied'); ?>
 
   <!--分享-->
                <div class="row">
                    <div class="col-sm-3 font-20">
                        分享
                    </div>
                    <div class="col-sm-9 mar-t-05">
                       <a href="javascript:window.open('http://v.t.sina.com.cn/share/share.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark');" title="新浪微博分享">
                    <i class="icon icon-weibo text-danger font-20 mar-r-03 hand"></i></a>
                        <i class="icon icon-weixin text-danger font-20 mar-ly-1 hand"></i>
                    </div>
                </div>
 <div class="operation-list operationList mar-t-2">


                  <a class="btn-block" href="<?=SITE_URL?>u-<?=$member['uid']?>.html">
                      <i class="icon icon-home text-danger">TA的首页</i>
                  </a>
                    <a class="btn-block" href="<?=SITE_URL?>uask-<?=$member['uid']?>/1.html">
                        <i class="icon icon-question-sign text-danger">TA的提问</i>
                    </a>
                      <a class="btn-block" href="<?=SITE_URL?>ua-<?=$member['uid']?>.html">
                        <i class="icon icon-comments text-danger">TA的回答</i>
                    </a>
                   


                </div>