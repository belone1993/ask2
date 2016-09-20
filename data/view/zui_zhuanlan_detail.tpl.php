<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('public_zhuanlan_header'); ?>
<div class="main receptacle post-view ">
    <article class="entry" ui-lightbox="">

        <header>
         <div class="entry-title-image " >
           <? $_tp=strstr($topicone['image'],'http'); ?>                       <? if($_tp ) { ?>                            

                            
  <div  class="img " style="height: 405px;">
  <img src="<?=$topicone['image']?>" width="600px" height="400px" />
  </div>

                            <? } else { ?>                        
  <div  class="img " style="height: 405px;">
  <img src="<?=SITE_URL?><?=$topicone['image']?>" width="600px" height="400px" />
  </div>
                            

                            <? } ?>                            
         
        </div>

            <div class="placeholder"></div>

            <h1 class="multiline1 entry-title"><?=$topicone['title']?></h1>

            <div class="user-entry-meta">
                <a target="_blank" href="<?=SITE_URL?>?ut-<?=$topicone['authorid']?>.html" class="author name ">
                    <img alt="" class="avatar-small" src="<?=$member['avatar']?>">&nbsp;&nbsp;<?=$topicone['author']?>
                </a>

                <span class="bull">·</span>
                <time class="published   hover-title"><?=$topicone['viewtime']?></time>
            </div>
        </header>

        <section class="entry-content">
 <? echo replacewords($topicone['describtion']);     ?>        </section>

        <footer>
            <div class="entry-exinfo clearfix " >


               <p class="tags full-screen" >
               
                 <? if($topicone['tags']) { ?>  


                        
<? if(is_array($topicone['tags'])) { foreach($topicone['tags'] as $tag) { if($tag!='') { ?>  <span class="tag" ><?=$tag?></span><? } ?>                

                
<? } } } else { } ?>                
             
                  
            </p>

            </div>
        </footer>
        </article>


<div class="art-share receptacle"><? if($setting['question_share']) { ?><?=$setting['question_share']?><? } else { ?> <div class="bshare-custom"> <p class="mod-tips"><span class="tag" style="display:inline-block">分享</span>

                <span style="display:inline-block"> 



     <a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="  bshare-more"></a>

     <a title="分享到QQ空间" class="bshare-qzone">QQ空间</a>

     <a title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a>

     <a title="分享到人人网" class="bshare-renren">人人网</a>

     <a title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a>

     <a title="分享到网易微博" class="bshare-neteasemb">网易微博</a>

     <a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis">

     </a>

     <span class="BSHARE_COUNT bshare-share-count">0</span>

     



     <script src="http://static.bshare.cn/b/buttonLite.js#style=-1&uuid=&pophcol=2&lang=zh" type="text/javascript"></script><script src="http://static.bshare.cn/b/bshareC0.js" type="text/javascript"></script>

 

   

    </span>

         

        </div><? } ?></div>


<div class="art-comments receptacle">

<!-- 多说评论框 start -->

<div class="ds-thread" data-thread-key="<?=$topicone['id']?>" data-title="<?=$topicone['title']?>" data-url="<?=SITE_URL?>?article-<?=$topicone['id']?>.html"></div>

<!-- 多说评论框 end -->

<!-- 多说公共JS代码 start (一个网页只需插入一次) -->

<script type="text/javascript"><? if($setting['site_name']==''||$setting['duoshuoname']==null) { ?>var duoshuoQuery = {short_name:"ask2"};<? } else { ?>var duoshuoQuery = {short_name:"<?=$setting['duoshuoname']?>"};<? } ?>(function() {

var ds = document.createElement('script');

ds.type = 'text/javascript';ds.async = true;

ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';

ds.charset = 'UTF-8';

(document.getElementsByTagName('head')[0] 

 || document.getElementsByTagName('body')[0]).appendChild(ds);

})();

</script>

<!-- 多说公共JS代码 end -->

</div>


<div class="recommend-posts">

    <div class="receptacle">
<div class="block-title ">

    <span><span >推荐阅读</span></span>
</div>

        <ul class="items" >
  
<? if(is_array($ctopiclist)) { foreach($ctopiclist as $index => $topic) { ?>
      
              <li class="item ng-isolate-scope item-with-title-img" >
        <article class="hentry">
            <a href="<?=SITE_URL?>?article-<?=$topic['id']?>.html" class="entry-link">
                <h1 class="entry-title ng-binding"><?=$topic['title']?></h1>

              <div class="title-img-container " >
                <div class="title-img-preview" >
                
                 <? $index=strstr($topic['image'],'http'); ?>                       <? if($index ) { ?>                            

                            
 <img src="<?=$topic['image']?>" class="img-rounded" width="240px" height="153px">
                            <? } else { ?>                        
 <img src="<?=SITE_URL?><?=$topic['image']?>" class="img-rounded" width="240px" height="153px">
                            

                            <? } ?>                   
                    
                    
                    
                    
                </div>
            </div>



                <section class="entry-summary">
                    <p class="ng-isolate-scope"><? echo cutstr(strip_tags(str_replace('&nbsp;','',$topic['describtion'])),110,'...'); ?>                        <span class="read-all">查看全文<i class="icon-ic_unfold"></i></span>
                    </p>
                </section>
            </a>

            <footer>
                <div class="entry-meta">
                  
                    <time    class="published ng-binding ng-isolate-scope hover-title"><?=$topic['viewtime']?></time>

                </div>

              <div class="entry-func ng-scope">
                <a href="<?=SITE_URL?>?article-<?=$topic['id']?>.html" class="vote-num ng-binding" ><?=$topic['views']?><span> 浏览</span></a>

            </div>


            </footer>


        </article>
    </li>
            
            
<? } } ?>
            </ul>


    </div>

</div>

</div>
<script>
var isfollower='<?=$is_followed?>';
/*关注用户*/
function attentto_user(uid) {
    if (g_uid == 0) {
        login();
    }
    $.post(g_site_url + "index.php?user/attentto", {uid: uid}, function(msg) {
        if (msg == 'ok') {
            if ($("#attenttouser_"+uid).hasClass("button_attention")) {
                $("#attenttouser_"+uid).removeClass("button_attention");
                $("#attenttouser_"+uid).addClass("button_followed");
                $("#attenttouser_"+uid).html("取消关注");
            } else {
                $("#attenttouser_"+uid).removeClass("button_followed");
                $("#attenttouser_"+uid).addClass("button_attention");
                $("#attenttouser_"+uid).html("关注作者");
            }
        }
    });
}
</script>
<? include template('public_zhuanlan_footer'); ?>
