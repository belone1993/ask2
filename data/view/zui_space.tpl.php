<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); ?>
<!--用户中心大背景--->
<div class="row nopadding nomargin">
<? include template('user_banner'); ?>
</div>


<!--用户中心大背景结束标记-->

<!--用户中心-->

<div class="user-home bg-white">
    <div class="container">

        <div class="row ">
            <div class="col-sm-9">
              <!-- 用户title部分导航 -->
              
<? include template('space_title'); ?>
             <!-- title结束标记 -->
            <!-- 内容页面 --> 
    <div class="row">
                 <div class="col-sm-12">
                     <div class="dongtai">
                         <p>
                             <strong class="font-18"><?=$member['username']?>的动态</strong>
                         </p>
                         <hr>
                         <div class="answer_contents">
                         
                           <ul class="nav">
            
  
<? if(is_array($doinglist)) { foreach($doinglist as $doing) { ?>
        <li>
            <div class="row">
                <div class="col-sm-1">
                    <a class="aw-user-name hidden-xs" data-id="7300"
                       href="<?=SITE_URL?>u-<?=$doing['authorid']?>.html" rel="nofollow"><img
                            src="<?=$doing['avatar']?>" alt="<?=$doing['author']?>"></a>

                </div>
                <div class="col-sm-9">
                    <h4>
                        <a href="<?=SITE_URL?>q-<?=$doing['questionid']?>.html"><?=$doing['title']?></a>
                    </h4>

                    <p>
                        <a href="<?=SITE_URL?>u-<?=$doing['authorid']?>.html" class="aw-user-name"
                           data-id="26025"><?=$doing['author']?></a> <span
                            class="text-color-999"><?=$doing['actiondesc']?> • <?=$doing['attentions']?>人关注 • <?=$doing['answers']?>  个回复 • <?=$doing['views']?> 次浏览 • <?=$doing['question_time']?>			</span>
                        <span class="text-color-999 related-topic collapse"> • 来自相关话题</span>
                    </p>

                   
                </div>
                <div class="col-sm-2">

                    <p>贡献</p>

                    <div>
                      
<? if(is_array($doing['followerlist'])) { foreach($doing['followerlist'] as $follow) { ?>
                        <a class="ms_username" data-id="8609" href="<?=SITE_URL?>u-<?=$follow['followerid']?>.html"
                           rel="nofollow"><img width="32px" height="32px" class="mar-lr-03 mar-b-05 img-rounded" src="<?=$follow['avatar']?>" alt="<?=$follow['follower']?>"></a>
                      
                                                
<? } } ?>
                    </div>

                </div>
            </div>
            <hr>

        </li>

   
<? } } ?>
        </ul>


                         </div>
                     </div>
                 </div>


             </div>
            </div>
           
            <!--右侧栏目-->
            <div class="col-sm-3 mar-t-2">


                

                <!--导航列表-->

               
<? include template('space_menu'); ?>
                <!--结束导航标记-->


                <div>

                </div>


            </div>

        </div>

    </div>

</div>


<!--用户中心结束-->
<? include template('footer'); ?>
