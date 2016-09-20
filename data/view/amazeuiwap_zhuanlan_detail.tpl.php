<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('public_zhuanlan_header'); ?>
<div class="main receptacle post-view ">

<article class="entry">

<header>

    <div class="entry-title-image ">
 <? $index=strstr($topicone['image'],'http'); ?>                       <? if($index ) { ?>                            

 
                   <div  class="img " style="height: 237.3px; background-image: url(<?=$topicone['image']?>);"></div>
 
                            <? } else { ?>                        

                   <div  class="img " style="height: 237.3px; background-image: url(<?=SITE_URL?><?=$topicone['image']?>);"></div>
 
            

                            <? } ?>      
 
 
    </div>
    <h1 class="multiline1 entry-title"><?=$topicone['title']?></h1>


    <div class="entry-meta">
        <a target="_blank" href="javascript:void(0)" class="author name ng-binding">
            <img  alt="" class="avatar-small" src="<?=$member['avatar']?>"><?=$topicone['author']?>
        </a>

          <span  class="ng-scope">

  <a href="javascript:void(0)" target="_blank"  class="ico ico-badge ico-badge-best_answerer hover-title--nowrap ng-scope hover-title" ></a>
</span>
        <span class="bull">·</span>
        <time    class="published ng-binding ng-isolate-scope hover-title"><?=$topicone['viewtime']?></time>
    </div>


</header>


    <section class="entry-content  " style="padding-top:0px">

       <? echo replacewords($topicone['describtion']);     ?>    </section>

</article>


<div class="art-comments" style="padding-right:5px;padding-left:5px">

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

<div class="recommend-posts ng-scope">

<div class="receptacle">
    <div class="block-title " >
        <span ><span >推荐阅读</span></span>

    </div>

<ul class="recommend-post-list ">
  
<? if(is_array($ctopiclist)) { foreach($ctopiclist as $index => $topic) { ?>
   
<li class="item  item-with-narrow-img">

    <article class="hentry">
        <a href="<?=SITE_URL?>?article-<?=$topic['id']?>.html" class="entry-link">
            <h1 class="entry-title ng-binding"><?=$topic['title']?></h1>

         <div class="title-img-container ng-scope" ng-if="titleImageShow">
         
         
           
             <? $index=strstr($topic['image'],'http'); ?>                       <? if($index ) { ?>                            
 <div class="title-img-preview" style="background-image: url(<?=$topic['image']?>);">
            </div>
            
                            

                            <? } else { ?> <div class="title-img-preview" style="background-image: url(<?=SITE_URL?><?=$topic['image']?>);">
            </div>
                        
                       

                            <? } ?>            
            
        </div>




        </a>

        <footer>




          <div class="entry-source ng-scope">

           <a href="javascript:void(0)" ><?=$topic['viewtime']?></a>
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
$(".entry-content *").css("max-width","100%");

</script>
<? include template('public_zhuanlan_footer'); ?>
