<? if(!defined('IN_ASK2')) exit('Access Denied'); ?>
<div style="background-color:  <?=$setting['banner_color']?>"  class="  banner hidden-sm hidden-xs ">


    <div class="container">
        <img src="<?=$setting['banner_img']?>" class="img-responsive banner_img">

        <div class="row">
            <!-- banner左边部分-->
            <div class="col-sm-8 left-content">
             <? $newtopiclist=$this->fromcache('topiclist'); ?>            <? if($newtopiclist) { ?>                <p class="iknow-daily-date">
                    今日最新资讯&nbsp;</p>

 
<? if(is_array($newtopiclist)) { foreach($newtopiclist as $index => $topic) { ?>
   <? if($index==0 ) { ?>                <p class="banner-daily-info" onclick="window.location.href='<?=SITE_URL?>article-<?=$topic['id']?>.html';">
<span class="banner-title">
<?=$topic['title']?>
</span>
<span class="banner-author">
来自：<?=$topic['author']?>
</span>

 </p>
  <? } ?>               
                  
<? } } ?>
                <div class="iknow-daily-collection line">
                    <ul class="daily-colletion-list line">
                    
                      
<? if(is_array($newtopiclist)) { foreach($newtopiclist as $index => $topic) { ?>
                      
                        <? if($index>0&&$index<4) { ?>                        <li class="daily-colletion-item line daily-colletion-item-<?=$index?>">
                            <a class="colletion-item-link" href="<?=SITE_URL?>article-<?=$topic['id']?>.html"
                               target="_blank" log="page:home,pos:daily,area:img,index:0">
                                <? $index=strpos($topic['image'],'http'); ?>                       <? if($index==0 ) { ?>                            
                             <img src="<?=$topic['image']?>"  class="colletion-item-pic" alt="<?=$topic['title']?>">
                            <? } else { ?>                            <img src="<?=SITE_URL?><?=$topic['image']?>"  class="colletion-item-pic" alt="<?=$topic['title']?>">
                            
                            <? } ?>                               
                            </a>
<span class="item-title-layout">
<span class="colletion-item-title">
<a class="text-value" href="<?=SITE_URL?>article-<?=$topic['id']?>.html" target="_blank" title="<?=$topic['title']?>"
   log="page:home,pos:daily,area:title,index:0"><? echo cutstr($topic['title'],29,'...'); ?></a>
</span>
</span>
                        </li>
                <? } ?> 
             
<? } } ?>
                        
                        
                    </ul>
                    <a class="more-daily" href="<?=SITE_URL?>topic/default.html" target="_blank" title="进入文章首页"
                       log="page:home,pos:more-daily">
                    </a>
                </div>
   <? } ?>            </div>

            <!--banner右边部分-->
            <div class="col-sm-3 col-sm-offset-9 ">
               
                  <? if(0!=$user['uid']) { ?>                <div class="user_card mar-t-2 bg-white">


                    <div class="bt-card-title">
                        问答用户
                    </div>
                    <hr>
                    <p class="bt-card-word text-success">
                        总有一个人知道你问题的答案
                    </p>

                    <div class="avatar-container text-center">
                        <img src="<?=$user['avatar']?>"
                             class="avatar-image ">

                        <div class="avatar-mask"></div>
                    </div>
                    <p class="text-center user-info mar-t-05">
        <span class="user-name">
           <?=$user['username']?>
        </span>
                        <span class="mar-ly-05">|</span>
        <span class="user-grade">
             <?=$user['grouptitle']?>
        </span>
                    </p>

                    <div class="answer-question-section  line">
                        <a href="<?=SITE_URL?>user/ask/1.html" target="_blank" class="user-button-item question-button">
                            <span class="item-num"><?=$user['questions']?></span>
                            <span class="item-title mar-t-06">我的提问</span>
                        </a>
                        <a href="<?=SITE_URL?>user/answer/1.html" target="_blank" class="user-button-item answer-button">
                            <span class="item-num"><?=$user['answers']?></span>
                            <span class="item-title mar-t-06">我的回答</span>
                        </a>
                    </div>
                </div>
                
                  <? } else { ?>                     <div class="user_card mar-t-2 bg-white">


                    <div class="bt-card-title">
                        问答用户
                    </div>
                    <hr>
                    <p class="bt-card-word text-success">
                        总有一个人知道你问题的答案
                    </p>

                  
                <p class="text-center user-info mar-t-05">
                          已有  <span class="font-20 text-danger"><?=$statistics['solves']?></span>位网友得到了帮助
                    </p>

                    <div class="answer-question-section  line" style="margin-top:80px;">
                        <a href="<?=SITE_URL?>question/add.html" target="_blank" class="user-button-item question-button">
                 
                            <span class="item-title font-18 mar-t-1">          
                            我要提问  <i class="icon icon-question text-center mar-auto font-18 "></i></span>
                        </a>
                        <a href="<?=SITE_URL?>c-all.html" target="_blank" class="user-button-item answer-button">
                           
                            <span class="item-title font-18 mar-t-1">     
                             
                               我来回答  <i class="icon icon-edit text-center font-18"></i></span>
                        </a>
                    </div>
                </div>
                     <? } ?>                
                
            </div>
        </div>
    </div>

</div>