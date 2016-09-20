<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); $adlist = $this->fromcache("adlist"); include template('banner'); ?>
<div class="container bg-white mar-b-05 mar-t-05">
<div class="row">
  <div class="col-sm-8">
   <ol class="breadcrumb">
  <li> <a class="first" href="<?=SITE_URL?>?c-all.html">全部分类</a></li>
  
   
<? if(is_array($navlist)) { foreach($navlist as $nav) { ?>
    <li> <a href="<?=SITE_URL?>?c-<?=$nav['id']?>.html"><?=$nav['name']?></a> </li>
    
    
<? } } ?>
    <? if($cid!='all') { ?><li class="active"><?=$category['name']?></li> <? } ?>    
    
 
  
</ol>
<hr>
<h3 class=" mar-l-1 font-15">
 <? if($cid!='all') { ?>                <?=$category['name']?>
                <? } else { ?>                全部分类
                <? } ?></h3>

  <ul class="nav navbar-nav clearfix">
                
<? if(is_array($sublist)) { foreach($sublist as $index => $sub) { ?>
                <? if($sub['id']==$cid) { ?>                <li>
                <a  href="<?=SITE_URL?>?c-<?=$sub['id']?>.html">
                 <span class="text-danger bold"> <? echo cutstr($sub['name'],10,''); ?></span>

                <span class="label  label-danger"><?=$sub['questions']?></span>
                
                </a>
               </li>
                <? } else { ?>                <li><a href="<?=SITE_URL?>?c-<?=$sub['id']?>.html">
                <? echo cutstr($sub['name'],10,''); ?> <span class="label  "><?=$sub['questions']?></span></a>
         
                 
                </li>
                <? } ?>                
<? } } ?>
            </ul>
            
             <!--广告位1-->
        <? if((isset($adlist['category']['left1']) && trim($adlist['category']['left1']))) { ?>        <div class="clearfix mar-t-05" ><?=$adlist['category']['left1']?></div>
        <? } ?>        
        <ul class="nav nav-secondary clearfix" >
         <li <? if(all==$status) { ?>class="active"<? } ?> >
        <a href="<?=SITE_URL?>?c-<?=$cid?>/all.html">全部问题</a>
        </li>
          <li <? if(6==$status) { ?>class="active"<? } ?> >
     <a class="recommand" href="<?=SITE_URL?>?c-<?=$cid?>/6.html">推荐问题</a>
        </li>
          <li <? if(4==$status) { ?>class="active"<? } ?> >
       <a href="<?=SITE_URL?>?c-<?=$cid?>/4.html">悬赏问题</a>
        </li>
          <li <? if(1==$status) { ?>class="active"<? } ?> >
      <a href="<?=SITE_URL?>?c-<?=$cid?>/1.html"><i class="icon icon-question-sign text-danger"></i>待解决</a>
        </li>
          <li <? if(2==$status) { ?>class="active"<? } ?> >
       <a href="<?=SITE_URL?>?c-<?=$cid?>/2.html"><i class="icon icon-check-circle text-danger"></i>已解决</a>
        </li>
        
                  
                </ul>   
        <hr class="clear">
           <table class="table table-hover ">
                        <tbody>
                            <tr class=""><th class="s0 b-b-line">标题</th><th class="s1 b-b-line">回答/浏览</th><th class="s2">时间</th></tr>
                            
<? if(is_array($questionlist)) { foreach($questionlist as $question) { ?>
                            <tr>
                                <td class="title b-b-line">
                                    <div class="tit-full">
                                        <div class="wrap">
                                            <span class="gold">                
                                                <? if($question['price'] > 0) { ?>                                                 <i class="quan"></i>
                                                <? } ?>                                            </span>
                                            <a href="<?=SITE_URL?>?q-<?=$question['id']?>.html" target="_blank" title="<?=$question['title']?>">
                                            <? echo cutstr($question['title'],50); ?>                                            </a>&nbsp;<span class="cate">[<a target="_blank" href="<?=SITE_URL?>?c-<?=$question['cid']?>.html" title="<?=$question['category_name']?>" class="lei"><? echo cutstr($question['category_name'],14,''); ?></a>]</span>
                                        </div>
                                    </div>
                                </td>
                                <td><?=$question['answers']?>/<?=$question['views']?></td>
                                <td><?=$question['format_time']?></td>
                            </tr>
                            
<? } } ?>
                        </tbody>
                    </table>        
                
                 <div class="pages"><?=$departstr?></div>
            
  </div>
  
   <div class="col-sm-4 b-l-line">
  
  <h3 class="font-15 mar-t-05">
推荐专家
</h3>
<hr>
 <? if($expertlist) { ?>      
      
            <ul class="nav mar-b-1">
                
<? if(is_array($expertlist)) { foreach($expertlist as $expert) { ?>
             
                
                     <li class="b-b-line">
                <div class="row">
                <div class="col-sm-2">
                 <div class="pic"><a title="<?=$expert['name']?>" target="_blank" href="<?=SITE_URL?>?u-<?=$expert['uid']?>.html"><img width="50" height="50" class="img-rounded" alt="<?=$expert['username']?>" src="<?=$expert['avatar']?>"  onmouseover="pop_user_on(this, '<?=$expert['uid']?>', '');"  onmouseout="pop_user_out();"/></a></div>
                </div>
                <div class="col-sm-10 ">
                 <h4 class="pull-left"><a title="<?=$expert['name']?>" target="_blank" href="<?=SITE_URL?>?u-<?=$expert['uid']?>.html" onmouseover="pop_user_on(this, '<?=$expert['uid']?>', 'text');"  onmouseout="pop_user_out();"><?=$expert['username']?></a></h4>
                    <p class="pull-right mar-t-05"><a href="<?=SITE_URL?>?question/add/<?=$expert['uid']?>.html" class="text-danger">向TA求助</a></p>
                   <p class="clear mar-t-05" >
                    <span><?=$expert['answers']?>回答</span>
                    <span><?=$expert['supports']?>赞同</span>
                  </p>
                   
                </div>
                
                </div>
                   
                   
                   
                </li>
                
                
<? } } ?>
            </ul>

        <? } ?>        
            
 <!--广告位2-->
        <? if((isset($adlist['category']['right1']) && trim($adlist['category']['right1']))) { ?>        <div><?=$adlist['category']['right1']?></div>
        <? } ?>          <!-- 关注问题排行榜 -->
           <h3 class="font-15 mar-t-1">
一周热点问题
</h3>
<hr>
     <ul class="nav clearfix">
                <? $attentionlist=$this->fromcache('attentionlist'); ?>                
<? if(is_array($attentionlist)) { foreach($attentionlist as $index => $question) { ?>
                <? $index++; ?>                <li class="b-b-line">
                     <i class="quan"></i>
                    <a  title="<?=$question['title']?>" target="_blank" href="<?=SITE_URL?>?q-<?=$question['id']?>.html"><?=$question['title']?></a>
                </li>
                
<? } } ?>
            </ul>
            
            
            <!-- 相关文章 -->
             <h3 class="font-15 mar-t-05 pull-left">
相关文章
</h3>
<a class="pull-right mar-t-05" target="_blank" href="<?=SITE_URL?>?cat-<?=$category['id']?>.html" text="查看更多关于<?=$category['name']?>">查看更多</a>
<hr class="clearfix mar-t-05">

        <ul class="nav">
                  
<? if(is_array($topiclist)) { foreach($topiclist as $index => $article) { ?>
                                            <li class=" b-b-line clearfix">
                    <a href="<?=SITE_URL?>?article-<?=$article['id']?>.html" target="_blank" class="title" title="<?=$article['title']?>">
                     
                     <span class="label label-badge label-danger"><?=$index?></span> <?=$article['title']?>
                    </a>
                  
                </li>
                       
<? } } ?>
                      
                    </ul>
  </div>
</div>
</div>
<? include template('footer'); ?>
