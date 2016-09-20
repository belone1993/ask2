<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); include template('banner'); ?>
<!--内容部分--->
<div class="content-body">
<div class="container  ">

<div class="row">

<!--左侧分类-->
<div class="col-sm-2">
    <ul class="sliderNav_list nav nav-primary mar-t-05">
    
      <? $categorylist=$this->fromcache('categorylist'); ?>                
<? if(is_array($categorylist)) { foreach($categorylist as $findex => $category1) { ?>
                 <? if($findex<5) { ?>                
        <li>
        <div class="row">
            <div class="nav_title clearfix col-sm-12">

                <i class="icon icon-list pull-left text-success"> 
                <span>
             <a target="_blank" title="<?=$category1['name']?>" href="<?=SITE_URL?>c-<?=$category1['id']?>.html"><?=$category1['name']?></a>
                </span></i> 
                <i class="text-success icon icon-arrow-right text-right pull-right"></i>
            </div>
        
       
        </div>
       
            <div class="nav_middle clearfix">

  
<? if(is_array($category1['sublist'])) { foreach($category1['sublist'] as $index => $category2) { ?>
                            <? if($index<6) { ?>                             <span> <a href="<?=SITE_URL?>c-<?=$category2['id']?>.html"><?=$category2['name']?></a></span>
                           
                            <? } ?>                            
<? } } ?>
               

            </div>
            <div class="nav_footer hide clearfix">

 
<? if(is_array($category1['sublist'])) { foreach($category1['sublist'] as $index => $category2) { ?>
                            <? if($index>6) { ?>                             <span> <a href="<?=SITE_URL?>c-<?=$category2['id']?>.html"><?=$category2['name']?></a></span>
                           
                            <? } ?>                            
<? } } ?>
               
               
              


            </div>
            <hr>
        </li>
          <? } ?>        
<? } } ?>
 
<li>

  <div class="row">
            <div class="nav_title clearfix col-sm-12">

                <i class="icon icon-list pull-left text-success"> 
                <span>
             <a target="_blank" title="更多分类" href="<?=SITE_URL?>c-all.html">更多</a>
                </span></i> 
                <i class="text-success icon icon-arrow-right text-right pull-right"></i>
            </div>
        
       
        </div>
</li>
    </ul>

</div>
<!--最新提问--->
<div class="col-sm-7 mar-t-05">
  
<h2 class="pull-left">等你解答</h2>
<a href="<?=SITE_URL?>c-all/1.html" class="pull-right">
更多</a>
    <hr class="clear">
    <ul class="main_con_qiangda_list clearfix">
     <? $nosolvelist=$this->fromcache('nosolvelist'); ?>                
<? if(is_array($nosolvelist)) { foreach($nosolvelist as $index => $question) { ?>
                
        <li>
            <a target="_blank" href="<?=SITE_URL?>q-<?=$question['id']?>.html" title="<?=$question['title']?>">
                <div class="left"><?=$question['answers']?><br>回答</div>
                <div class="right">
                    <p class="otw text-nowrap "><?=$question['title']?></p>
                    <span><?=$question['format_time']?></span>
                </div>
            </a>
        </li>
         
<? } } ?>
      

    </ul>
    
    <!-- 高悬赏 -->

<h2 class="pull-left">重金求解</h2>
<a href="<?=SITE_URL?>c-all/4.html" class="pull-right">
更多</a>
    <hr class="clear">
    <ul class="main_con_qiangda_list clearfix">
    <? $nosolvelist=$this->fromcache('rewardlist'); ?>                
<? if(is_array($nosolvelist)) { foreach($nosolvelist as $index => $question) { ?>
                
        <li>
            <a target="_blank" href="<?=SITE_URL?>q-<?=$question['id']?>.html" title="<?=$question['title']?>">
                <div class="left"><?=$question['answers']?><br>回答</div>
                <div class="right">
                    <p class="otw text-nowrap "> <i class="icon icon-dollar text-danger mar-r-03"><?=$question['price']?></i><?=$question['title']?></p>
                    <span><?=$question['format_time']?></span>
                </div>
            </a>
        </li>
         
<? } } ?>
      

    </ul>
</div>
<!--右侧栏目-->
<div class="col-lg-3">
    <!--最新通知公告-->
    <div class="panel panel-success mar-t-05">
        <div class="panel-heading"><i class="icon icon-bell-alt text-success"></i><span class="mar-ly-1">最新通知</span>
            <a href="<?=SITE_URL?>note/list.html" class="pull-right">
                更多
            </a>
        </div>
        <div class="panel-body">
            <ul class="nav right-ul">
                <? $notelist=$this->fromcache('notelist'); ?> 
<? if(is_array($notelist)) { foreach($notelist as $nindex => $note) { ?>
       <li class="b-b-line">   <a target="_blank" title="<?=$note['title']?>" <? if($note['url']) { ?>href="<?=$note['url']?>"<? } else { ?>href="<?=SITE_URL?>note/view/<?=$note['id']?>.html"<? } ?>>
      <i class="quan"></i>  <? echo cutstr($note['title'],40,''); ?>       </a></li>
        
       
       
        
<? } } ?>
               


            </ul>

        </div>


    </div>
    <!--公告结束-->

    <!--热门问题一周热点-->

    <div class="panel panel-success ">
        <div class="panel-heading"><i class="icon icon-shield text-success"></i><span class="mar-ly-1">热门问题</span>
            <a href="<?=SITE_URL?>c-all.html" class="pull-right">
                更多
            </a>
        </div>
        <div class="panel-body">
            <ul class="nav right-ul">

  <? $attentionlist=$this->fromcache('attentionlist'); ?>                    
<? if(is_array($attentionlist)) { foreach($attentionlist as $index => $question) { ?>
                    
                    <li class="b-b-line">
                       <i class="quan"></i>
                        <a  title="<?=$question['title']?>" target="_blank" href="<?=SITE_URL?>q-<?=$question['id']?>.html"><? echo cutstr($question['title'],40,''); ?><i class="icon icon-question text-success"></i></a>
                    </li>
                    
<? } } ?>
               

            </ul>

        </div>


    </div>
    <!--一周热点结束-->

  


</div>
</div>
</div>
</div>


<!--专家和积分排行-->
<div class="expert-panel mar-b-1">
    <div class="container">
        <div class="row bg-silver">
            <div class="col-sm-9 expert-list mar-t-05">
              <div class="title font-18">
                        <i class="icon icon-user text-danger mar-y-05 font-18"></i> 专家推荐
                      <span class="mar-l-05 text-danger">以团队之力，帮助更多人</span>
                    </div>
                 <div class="row mar-t-1">
                   <? $expertlist=$this->fromcache('expertlist'); ?>                    
<? if(is_array($expertlist)) { foreach($expertlist as $expert) { ?>
                       <div class="col-sm-3 text-center user-info">
                        <div class="">
                            <img width="100" height="100" class="hand img-circle experter" src="<?=$expert['avatar']?>">
                            <a href="<?=SITE_URL?>question/add/<?=$expert['uid']?>.html" class="btnask  btn btn-danger">对Ta提问</a>
                        </div>
                         
                           <p class="bold font-18 mar-t-1"><?=$expert['username']?><img class="mar-l-05" src="<?=SITE_URL?>css/dist/css/images/vgr.png" ></p>
                                 <p>推荐/回答:<?=$expert['answers']?></p>
                                 <p>擅长 : 
                                
<? if(is_array($expert['category'])) { foreach($expert['category'] as $category) { ?>
             <a target="_blank" href="<?=SITE_URL?>c-<?=$category['cid']?>.html"><?=$category['categoryname']?></a>
                
<? } } ?>
                                 </p>
                       </div>
                           
<? } } ?>
                       
                 </div>
            </div>
            <div class="col-sm-3 ">
                <!--财富榜-->
                <div class="panel-caifuban">
                    <div class="title">
                        <i class="icon icon-yen text-success mar-ly-05"></i> 财富榜
                        <hr>
                    </div>
                    
                    <ol class="widget-top10">
                     <? $weekuserlist=$this->fromcache('alluserlist'); ?>                
<? if(is_array($weekuserlist)) { foreach($weekuserlist as $index => $alluser) { ?>
                        <li class="text-muted b-b-line">
                            <img onmouseover="pop_user_on(this, '<?=$alluser['uid']?>', 'img');"  onmouseout="pop_user_out();"  class="avatar-32 img-circle hand" src="<?=$alluser['avatar']?>">
                            <a href="<?=SITE_URL?>u-<?=$alluser['uid']?>.html" class="ellipsis"><?=$alluser['username']?></a>
                            <span class="text-muted pull-right"><?=$alluser['credit2']?> 金币</span>
                        </li>
                       
  
<? } } ?>
                    </ol>
                </div>
            </div>
        </div>



    </div>
</div>
<!--专家和排行榜结束标记--->
<!---最新动态和采纳回答--->
<div class="answer-section bg-white ">

    <div class="container">

        <div class="row">
        <!---网站动态--->
        <div class="col-sm-6 mar-t-05 doing">
        <div class=" mar-b-1 doing-title">
            <i class="text-success icon icon-info-sign">
                <span class=" f-weight">最新动态</span>
            </i>

        </div>
        <hr class="clearfix">
        <div class="clearfix">
        <ul class="nav">
             <? $doinglist=$this->fromcache('doinglist'); ?>  
<? if(is_array($doinglist)) { foreach($doinglist as $doing) { ?>
        <li>
            <div class="row">
                <div class="col-sm-1">
                    <a class="aw-user-name hidden-xs" data-id="7300"
                       href="<?=SITE_URL?>u-<?=$doing['authorid']?>.html" rel="nofollow"><img
                        onmouseover="pop_user_on(this, '<?=$doing['authorid']?>', 'img');"  onmouseout="pop_user_out();"    src="<?=$doing['avatar']?>" alt="<?=$doing['author']?>"></a>

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
                           rel="nofollow"><img class="mar-b-05" onmouseover="pop_user_on(this, '<?=$follow['followerid']?>', 'img');"  onmouseout="pop_user_out();" src="<?=$follow['avatar']?>" alt="<?=$follow['follower']?>"></a>
                      
                                                
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


        <!--已经解决的问题-->

        <div class="col-sm-6 mar-t-05">
                <h2>最新已解决</h2>
  <hr class="clear">
            <ul class="main_con_qiangda_list clearfix">
               
                 <? $solvelist=$this->fromcache('solvelist'); ?>                
<? if(is_array($solvelist)) { foreach($solvelist as $index => $question) { ?>
                <li>
                    <a target="_blank" href="<?=SITE_URL?>q-<?=$question['id']?>.html" title="<?=$question['title']?>">
                        <div class="left"><?=$question['answers']?><br>回答</div>
                        <div class="right">
                            <p class="otw text-nowrap "><?=$question['title']?></p>
                            <span><?=$question['format_time']?></span>
                        </div>
                    </a>
                </li>

                
<? } } ?>
            </ul>
            </div>
        </div>
    </div>

</div>






<!---最新回答和采纳回答结束标记--->

 <? if(1==$setting['hot_on'] ) { ?><!--热门文章-->
 <? $hottopiclist=$this->fromcache('hottopiclist'); ?>            <? if($hottopiclist) { ?>            
<div class="section-hot-article ">
<div class="container  clearfix " >
    <h3 class="pull-left mar-t-03" >
        热门文章
    </h3>
   
    <a class="pull-right mar-t-05" href="<?=SITE_URL?>topic/hotlist.html">
        更多<i class="icon icon-link text-success mar-ly-05"></i>
    </a>
     <hr class="clearfix">
    <div class="cards clearfix">
 
<? if(is_array($hottopiclist)) { foreach($hottopiclist as $index => $hottopic) { ?>
        <div class="col-md-4 col-sm-6 col-lg-3">
            <div class="card">
               <? $index=strpos($hottopic['image'],'http'); ?>                       <? if($index==0 ) { ?>                            
                             <img src="<?=$hottopic['image']?>" class="hotimg" alt="<?=$hottopic['title']?>">
                            <? } else { ?>                            <img src="<?=SITE_URL?><?=$hottopic['image']?>"  class="hotimg"  alt="<?=$hottopic['title']?>">
                            
                            <? } ?>                <span class="caption"><? echo cutstr(str_replace("&nbsp;","",strip_tags($hottopic['describtion'])),60,'...'); ?></span>
                <a href="<?=SITE_URL?>article-<?=$hottopic['id']?>.html" class="card-heading"><strong><?=$hottopic['title']?></strong></a>
                <div class="card-actions">
                    <a href="javascript:void(0);"><i class="icon icon-eye-open text-danger"></i> <?=$hottopic['views']?></a>
                    <span class="text-muted pull-right">&nbsp;&nbsp;<?=$hottopic['viewtime']?></span>
                </div>
            </div>
        </div>
       
        
<? } } ?>
    </div>
</div>
</div>
  <? } ?><!---热门文章结束标记--><? } include template('footer'); ?>
