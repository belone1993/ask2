<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); include template('banner'); $adlist = $this->fromcache("adlist"); ?><script src="<?=SITE_URL?>js/neweditor/ueditor.config.js" type="text/javascript"></script> 
<script src="<?=SITE_URL?>js/neweditor/ueditor.all.js" type="text/javascript"></script> 

<!---中间主体部分---开始--->
<div class="container bg-white mar-b-05">
<!--导航碎片--->
<ol class="breadcrumb">
    <li><a href="<?=SITE_URL?>"><i class="icon icon-home"></i> 首页</a></li>
    <li> <a class="first" href="<?=SITE_URL?>?c-all.html">全部分类</a></li>
   
 
    
<? if(is_array($navlist)) { foreach($navlist as $nav) { ?>
    
     <li><a href="<?=SITE_URL?>?c-<?=$nav['id']?>.html"><?=$nav['name']?></a> </li>
    
<? } } ?>
</ol>

<div class="row">

<!--左侧展示-->
<div class="col-sm-2  hidden-md hidden-lg">
    <div class="card border_none">
        <p> 微信公众平台：搜索“正影微赚”或扫描下面的二维码：</p>

        <img data-caption="扫一扫图片中的二维码"
             src="http://www.ask2.cn/upload/code.jpg" width="200px" height="200px" class="img-responsive" alt="响应式图片测试">
    </div>

</div>

<!--结束标记-->

<!--中间区域展示-->
<div class="col-sm-7 col-md-9 col-lg-9 b-l-line b-r-line">

<div class="container questiondetail">
<!--问题标题和按钮-->
<div class="row">
    <div class="col-sm-9">
        <h1 class="title">
           <?=$question['title']?> 
        </h1>
    </div>
    <div class="col-sm-3">

  <? if($is_followed) { ?>   <a href="javascript:void(0);" class="button_followed mar-r-05 pull-right" id="attenttoquestion" onclick="attentto_question(<?=$question['id']?>)">
            <i class="icon icon-heart text-success">取消关注</i>
        </a>
                   
                    <? } else { ?>                     <a href="javascript:void(0);"  class="button_attention mar-r-05 pull-right" id="attenttoquestion" onclick="attentto_question(<?=$question['id']?>)">
            <i class="icon icon-heart text-success">关注</i>
        </a>
                   
                    <? } ?>       

        <a class="mar-ly-1 pull-right" href="<?=SITE_URL?>?favorite/add/<?=$question['id']?>.html" >
            <i class="icon icon-star text-success mar-l-05">收藏</i>
        </a>
    </div>


</div>
<!--相关问题链接-->


<ol class="breadcrumb title_list mar-t-1 clear">
    <li><i class="icon icon-user text-success"></i> 
   
        <? if($question['hidden']) { ?>                    <span>匿名</span>
                    <? } elseif($question['authorid']==0) { ?>                    <span><? if($question['ip']) { ?><?=$question['ip']?><? } else { ?>游客<? } ?></span>
                    <? } else { ?>                    <span><a  href="<?=SITE_URL?>?u-<?=$question['authorid']?>.html" target="_blank" onmouseover="pop_user_on(this, '<?=$question['authorid']?>', 'text');"  onmouseout="pop_user_out();"><?=$question['author']?></a></span>
                    <? } ?>    
  </li>
    <li>浏览<?=$question['views']?>次</li>
    <li class="text-success"> 悬赏：<b><?=$question['price']?></b></li>

    <li><?=$question['format_time']?></li>
</ol>

             
                        <!-- 标签 --><? if($taglist) { ?> 
                      
       <ol class="breadcrumb title_list mar-t-1 clear">  
       <li> 标签：</li>               
<? if(is_array($taglist)) { foreach($taglist as $tag) { ?>
 <li><a target="_blank" title="<?=$tag?>" href="<?=SITE_URL?>?tag-<?=$tag?>.html"><?=$tag?></a></li>
                
                
<? } } } else { } ?>                   </ol>   
                        <!-- 标签 -->
                        
              <hr>          
<!--问题描述-->
<div class="row question-des">
    <div class="col-sm-12">
         <span class="text-default bold"> 咨询描述:</span>      <? echo replacewords($question['description']);     ?>    </div>
     <div class="col-sm-12">
     <ul class="nav">
                    
<? if(is_array($supplylist)) { foreach($supplylist as $supply) { ?>
                    <li><span class="time">问题补充 : <?=$supply['format_time']?></span>
                      <? echo replacewords($supply['content']);     ?>                
                    
                    </li>
                    
<? } } ?>
                </ul>
                
                </div>
</div>
<script>

$(".question-des").find("img").attr("data-group","image-group-question");
$(".question-des").find("img").attr("data-toggle","lightbox");
$(".question-des").find("img").attr("data-caption","<?=$question['title']?>");

</script>
<!--问题描述结束-->
  <? if($question['authorid']!=$user['uid']) { ?><!--问题回答提示积分-->
<div class="tishi mar-t-05">
<div class="score_tip">回答该问题即可获得 <b class="text-danger"><?=$setting['credit1_answer']?></b> 经验值<? if($setting['credit2_answer']) { ?> + <b class="text-danger"><?=$setting['credit2_answer']?></b> 财富值<? } ?>，问题被采纳即可获得 <b class="text-danger"><?=$setting['credit1_adopt']?></b> 经验值<? if($setting['credit2_adopt'] || $question['price']) { ?> + <b class="text-danger"><? echo ($setting['credit2_adopt']+$question['price']) ?></b> 财富值<? } ?>！</div>
</div>

<!--结束标记-->

   <? } ?>   
     <? if(0!=$question['authorid'] && ($question['authorid']==$user['uid'])) { ?>   <!-- 操作 -->
    <div class="row mt10">
    <div class="col-sm-12 mar-t-1">
    
    
                <h3  class="font-18">处理问题：</h3>
                <p> 如果已获得满意的回答，请及时采纳，感谢回答者。若还没有满意的回答，可以尝试以下操作：</p>
                <span><button type="button" title="补充提问细节，以得到更准确的答案" class="btn btn-danger" name="supply_question" value="问题补充" onclick="javascript:document.location = '<?=SITE_URL?>?question/supply/<?=$question['id']?>.html'">问题补充"</button></span>
                <span><button type="button" title="提高悬赏，以提高问题的关注度" class="btn btn-danger" name="append_score" onclick="append_score();" >提高悬赏</button></span>
                <span><button type="button" class="btn btn-danger" title="修改问题标签" onclick="edittag();" >添加标签</button></span>
                <span><button type="button" title="无满意答案的回答，可以直接结束提问，关闭问题" class="btn btn-danger" name="close_question"  onclick="close_question();">关闭问题</button></span>
           
           
            </div>
            </div>
            <div class="row">
  <div class="col-sm-12">
  <div class="share-content"><?=$setting['question_share']?></div>
  </div>
</div>
      <? } ?>       <!--广告位1-->
            <? if((isset($adlist['question_view']['inner1']) && trim($adlist['question_view']['inner1']))) { ?>            <div style="margin-top:5px;"><?=$adlist['question_view']['inner1']?></div>
            <? } ?><!--回答框-->

   <? if(!$already && $user['uid']!= $question['authorid']) { ?>       <form name="answerForm" action="<?=SITE_URL?>?question/answer.html" method="post">
<div class="row">

    <div class="col-sm-12">
        <p class="text-success">我可以帮助Ta</p>
    </div>
    <div class="col-sm-12">
       <div class="your-answer">
                    <script type="text/plain" id="anscontent" name="content" style="height: 122px;"></script>
                    <script type="text/javascript">UE.getEditor('anscontent');</script>
                </div>
    </div>
    <div class="col-sm-12 mar-t-05">
  
        <div class="row">
            <div class="col-sm-10">
              <? if($setting['code_ask']) { ?>                <div class="row">
                    <div class="col-sm-4">
                        <span class="">验证码</span>
                        <input onblur="check_code()" name="code" id="code" type="text" class="input-code">
                    </div>

                    <div class="col-sm-6">
                        <span class="verifycode"><img class="hand" id="verifycode" onclick="javascript:updatecode();" src="<?=SITE_URL?>?user/code.html"></span>
                        <a href="javascript:updatecode();" class="changecode">&nbsp;换一个</a>
                        <span id="codetip" class="input_error alert alert-warning hide"></span>
                    </div>
                </div>
                   <? } ?>            </div>
            <div class="col-sm-2">
             <input type="hidden" value="<?=$question['id']?>" name="qid">
                <input type="hidden" value="<?=$question['title']?>" name="title">
                <button type="submit" name="submit" class="btn btn-success pull-right">

                    <i class="icon icon-edit"></i> 提交
                </button>
            </div>
        </div>
      
    </div>
</div>

  </form>
<!--结束标记-->
  <? } ?>    

<!--广告插入区域-->

<div class="center-adv mar-t-05">

  <!--广告位2-->
        <? if((isset($adlist['question_view']['left1']) && trim($adlist['question_view']['left1']))) { ?>        <div class="share-content"><?=$adlist['question_view']['left1']?></div>
        <? } ?></div>


<!--广告结束标记-->


<!--相关回答评论列表-->


<div class="comments">
<header>

    <h3><i class="icon-comments icon-border-circle text-success"></i> 全部回答(<?=$question['answers']?>)</h3>
</header>
<div class="comments-list">


  
<? if(is_array($answerlist)) { foreach($answerlist as $index => $answer) { ?>
<div class="comment">
    <a href="<?=SITE_URL?>?u-<?=$answer['authorid']?>.html" class="avatar"><img width="40px" height="40px" class="img-rounded" alt="<?=$answer['author']?>" src="<?=$answer['author_avartar']?>" onmouseover="pop_user_on(this, '<?=$answer['authorid']?>', 'img');"  onmouseout="pop_user_out();"></a>

    <div class="content">
        <div class="pull-right"><span class="text-muted"><?=$answer['time']?></span> &nbsp;<strong>#<? echo $index+1; ?></strong></div>
        <a href="<?=SITE_URL?>?u-<?=$answer['authorid']?>.html" class="author">
        <strong><?=$answer['author']?></strong>
     
        </a>   <? if($answer['signature']) { ?>         ,<?=$answer['signature']?>
        <? } ?>        <div class="text"> <? echo replacewords($answer['content']);     ?>        </div>
          <div class="appendcontent">
                                
<? if(is_array($answer['appends'])) { foreach($answer['appends'] as $append) { ?>
       
                                <div class="appendbox">
                                    <? if($append['authorid']==$answer['authorid']) { ?>                                    <h4 class="appendanswer font-18">回答:<span class="time">
                                    <?=$append['format_time']?></span></h4>
                                    <? } else { ?>                                    <h4 class="appendask font-18">追问:<span class='time'><?=$append['format_time']?></span></h4>
                                    <? } ?>                                          <? echo replacewords($append['content']);     ?>                                                                
                                <div class="clr"></div>
                                </div>
                                
<? } } ?>
                        </div>
        <div class="actions">
        
            
                       
                         <? if($user['uid']>0) { ?>                          <? if($user['uid']==$question['authorid']) { ?>            <a href="javascript:void(0);" onclick="adoptanswer(<?=$answer['id']?>);" >采纳为满意回答</a>
            <a href="<?=SITE_URL?>?answer/append/<?=$question['id']?>/<?=$answer['id']?>.html" >继续追问</a>
              <? } elseif($user['uid']==$answer['authorid']) { ?>            <a href="<?=SITE_URL?>?question/editanswer/<?=$answer['id']?>.html">修改答案</a>
              <a href="<?=SITE_URL?>?answer/append/<?=$question['id']?>/<?=$answer['id']?>.html">继续回答</a>
               <? } ?>                <? } ?>        </div>
          <div class="comment-box mt10">
                        <div class="comments-hd">
                            <div class="function" id="<?=$answer['id']?>">
                                <span class="number label mar-ly-1"><a onclick="show_comment('<?=$answer['id']?>');" href="javascript:void(0)">评论(<?=$answer['comments']?>)</a></span>
                                 
                          <span id='<?=$answer['id']?>' class="dianzan label mar-ly-1">  <i class="icon icon-thumbs-o-up " ></i><a class="button_agree  hand mar-y-1"  ><?=$answer['supports']?></a>   </span>                            
                           
                            </div>
                          
                            <? if($user['grouptype']==1) { ?>                            <span class="admin"><a class="mar-ly-05" href="javascript:void(0);" onclick="adoptanswer(<?=$answer['id']?>);">采纳为最佳答案</a><span class="span-line">|</span><a class="mar-ly-05" href="<?=SITE_URL?>?question/editanswer/<?=$answer['id']?>.html">编辑内容</a><span class="span-line">|</span><a class="mar-ly-05" href="javascript:void(0);" onclick="delete_answer('<?=$answer['id']?>', '<?=$question['id']?>')">删除</a></span>
                            <? } ?>                        </div>

                        <div class="comments-mod" style="display: none;" id="comment_<?=$answer['id']?>">
                            <div class="areabox clearfix">
                               
                               <div class="input-group">
             <input type="text" placeholder="请输入评论内容，不少于2个字" class="comment-input form-control" name="content" />
                        <input type='hidden' value='0' name='replyauthor' />
              <span class="input-group-btn"><input type="button" value="评论"  class="btn btn-danger" name="submit" onclick="addcomment(<?=$answer['id']?>);"/> </span>
            </div>
                          
                            </div>
                            <ul class="comments-list nav">
                                <li class="loading"><img src='<?=SITE_URL?>css/default/loading.gif' align='absmiddle' />&nbsp;加载中...</li>
                            </ul>
                        </div>
                    </div>
    </div>
     
    
    
</div>

 
<? } } ?>
 
 
</div>

</div>
  <div class="pages"><?=$departstr?></div>
<!--评论列表结束标记-->

 <!--广告位3-->
            <? if((isset($adlist['question_view']['left2']) && trim($adlist['question_view']['left2']))) { ?>            <div><?=$adlist['question_view']['left2']?></div>
            <? } ?><!--相关问题-->
<div class="relative-question mar-t-1">
    <header>

        <h3> 相关问题</h3>
    </header>
    <hr>
    <div class="row">
        <div class="col-sm-12">

            <div class="answer_contents">
  
<? if(is_array($solvelist)) { foreach($solvelist as $solve) { ?>
            
              
                <ul class="answer_content ">
                    <li class="answer_num">
                        <span class="span_01"><?=$solve['answers']?></span>
                        <span class="span_02">回答</span>
                    </li>
                    <li class="answer_con">
                        <ul>
                            <li class="question_li"><a href="<?=SITE_URL?>?q-<?=$solve['id']?>.html" target="_blank"
                                                       title="<?=$solve['title']?>"><h2><?=$solve['title']?></h2>
                            </a></li>

                            <li class="answer_li">
                               <?=$solve['description']?>
                            </li>
                            <li class="answer_label">
                                <span class="answer_time text-success"><?=$solve['format_time']?></span>
                            </li>
                        </ul>
                    </li>
                </ul>

  
<? } } ?>
               

            </div>
        </div>

    </div>

</div>


</div>
</div>

<!--右侧栏目-->
<div class="col-sm-3">
<div class="row">
<div class="col-sm-12">
 <? if(1==$user['grouptype'] && $user['uid']) { ?><h3 class="font-18">
问题管理
</h3>
 <hr>

 <button type="button" class="btn btn-success mar-b-03" onclick="javascript:document.location = '<?=SITE_URL?>?question/edit/<?=$question['id']?>.html'">编辑内容</button>


 <button type="button" class="btn btn-success mar-b-03"  onclick="edittag();" >修改标签</button>


  <button type="button" class="btn btn-success mar-b-03"  id="changecategory" data-toggle="modal" data-target="#catedialog" >移动分类</button>


<button type="button" class="btn btn-success mar-b-03"   id="close_question">关闭问题</button>

 

<button type="button" class="btn btn-success mar-b-03" id="delete_question">删除问题</button>




      
      
      
     
        <? } ?>        
        <? if($expertlist) { ?>  <h3 class="font-15 mar-t-05">
推荐专家
</h3>
<hr>

      
      
            <ul class="nav mar-b-1">
                
<? if(is_array($expertlist)) { foreach($expertlist as $expert) { ?>
             
                
                     <li class="b-b-line">
                <div class="row">
                <div class="col-sm-3">
                 <div class="pic"><a title="<?=$expert['name']?>" target="_blank" href="<?=SITE_URL?>?u-<?=$expert['uid']?>.html"><img width="50" height="50" class="img-rounded" alt="<?=$expert['username']?>" src="<?=$expert['avatar']?>"  onmouseover="pop_user_on(this, '<?=$expert['uid']?>', '');"  onmouseout="pop_user_out();"/></a></div>
                </div>
                <div class="col-sm-9 ">
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
</div>
  <div　class="col-sm-12">
  
  
<!--关注问题的人-->
<div class="guanzhuzhe  right_box_title  clearfix">
 
          <a href="<?=SITE_URL?>?question/follow/<?=$question['id']?>.html"><strong class="text-success"><?=$question['attentions']?></strong></a>人关注该问题
    <hr class="clearfix">
    <div class="cards clearfix">
       
        
       
        
<? if(is_array($followerlist)) { foreach($followerlist as $follower) { ?>
         <div class="col-sm-2 mar-t-05">
                <a href="<?=SITE_URL?>?u-<?=$follower['followerid']?>.html" target="_blank"><img height="35" width="35" class="img-rounded" src="<?=$follower['avatar']?>" onmouseover="pop_user_on(this, '<?=$follower['followerid']?>', 'image_follow');"  onmouseout="pop_user_out();"/></a>
                 </div>
                
                
<? } } ?>
    </div>

    <hr>
</div>

<!--关注问题----结束标记-->




<!--热门问题和最新问题-->
<div class="hot-new-question">
    <ul id="myTab3" class="nav nav-secondary">
        <li class="active">
            <a href="#tab111" data-toggle="tab">热门问题</a>
        </li>
        <li>
            <a href="#tab222" data-toggle="tab">最新问题</a>
        </li>

    </ul>
    <hr>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab111">
            <ul class="nav right-ul">
  <? $attentionlist=$this->fromcache('attentionlist'); ?>                    
<? if(is_array($attentionlist)) { foreach($attentionlist as $index => $question_attention) { ?>
                <li class="b-b-line">
                    <i class="quan"></i> <a title="<?=$question_attention['title']?>" target="_blank"
                                            href="<?=SITE_URL?>?q-<?=$question_attention['id']?>.html">
                   <?=$question_attention['title']?><i class="icon icon-question text-success"></i> </a>
                </li>
  
<? } } ?>
            </ul>
        </div>
        <div class="tab-pane fade" id="tab222">
            <ul class="nav right-ul">
   <? $nosolvelist=$this->fromcache('rewardlist'); ?>                
<? if(is_array($nosolvelist)) { foreach($nosolvelist as $index => $question_reward) { ?>
                <li class="b-b-line">
                    <i class="quan"></i> <a title="<?=$question_reward['title']?>" target="_blank"
                                            href="<?=SITE_URL?>?q-<?=$question_reward['id']?>.html">
                   <?=$question_reward['title']?><i class="icon icon-question text-success"></i> </a>
                </li>

  
<? } } ?>
            </ul>
        </div>


    </div>
</div>

<!--热门问题和最新问题标记结束-->


<!--广告插入地方-->

<div class="row">
    <div class="col-sm-12">
       <!--广告位5-->
        <? if((isset($adlist['question_view']['right1']) && trim($adlist['question_view']['right1']))) { ?>        <div><?=$adlist['question_view']['right1']?></div>
        <? } ?>    </div>
</div>

<!--广告插入结束标记-->

<!--相关文章推荐-->
<div class="relativearticle">
    <ul class="nav nav-secondary">
        <li class="active">
            <a href="#tab111" data-toggle="tab">相关文章推荐</a>
        </li>


    </ul>
    <hr>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab111">
            <ul class="nav right-ul">
  
<? if(is_array($topiclist)) { foreach($topiclist as $index => $article) { ?>
                <li class="b-b-line">
                    <i class="quan"></i> <a title="     <?=$article['title']?>" target="_blank"
                                            href="<?=SITE_URL?>?article-<?=$article['id']?>.html">
                        <?=$article['title']?> </a>
                </li>
   
<? } } ?>
            </ul>
        </div>


    </div>
</div>


<!--相关文章推荐结束标签-->
  </div>
</div>




</div>
</div><? if($setting['register_on']=='1') { if($user['uid']>0&&$user['active']!=1) { ?><div class="modal fade" id="emailtip">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">温馨提示</h4>
    </div>
    <div class="modal-body">
      <p>由于网站设置，需要设置邮箱并且激活邮箱才能提问,回答，发布文章等一系列操作,<a href="<?=SITE_URL?>?user/editemail.html"> 激活邮箱走起!</a></p>
   
    </div>
 
  </div>
</div>
</div>
<script>
$("#emailtip").modal("show");
</script><? } } ?><div class="modal fade" id="dialog_tag">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">编辑标签</h4>
    </div>
    <div class="modal-body">
    
    <form  class="form-horizontal"  name="edittagForm"  action="<?=SITE_URL?>?question/edittag.html" method="post" >
        <input type="hidden"  value="<?=$question['id']?>" name="qid"/>
        <table class="table ">
         <tr valign="top">
                <td>多个标签请以空格隔开!</td>
            </tr>
            <tr>            
                <td>
                    <div class="inputbox mt15">
                        <input type="text" placeholder="多个标签请以空格隔开" class="form-control"  name="qtags" value="<? echo implode(' ',$taglist) ?>"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                <button type="submit" class="btn btn-success">保存</button>
                 <button type="button" class="btn btn-success" data-dismiss="modal">关闭</button>
    
                </td>
            </tr>
        </table>
    </form>

    </div>
   
  </div>
</div>
</div>

<div class="modal fade" id="dialogadopt">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">采纳回答</h4>
    </div>
    <div class="modal-body">
    
     <form class="form-horizontal"  name="editanswerForm"  action="<?=SITE_URL?>?question/adopt.html" method="post" >
        <input type="hidden"  value="<?=$question['id']?>" name="qid"/>
        <input type="hidden" id="adopt_answer" value="0" name="aid"/>
        <table  class="table ">
            <tr valign="top">
                <td>向帮助了您的知道网友说句感谢的话吧!</td>
            </tr>
            <tr>            
                <td>
                    <div class="inputbox mt15">
                        <textarea class="form-control"   name="content">非常感谢!</textarea>
                    </div>
                </td>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-success" >确&nbsp;认</button></td>
            </tr>
        </table>
    </form>

    </div>
   
  </div>
</div>
</div>

<div class="modal fade" id="append_score">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">提高悬赏</h4>
    </div>
    <div class="modal-body">
    
    <form class="form-horizontal" name="addscoreForm"  action="<?=SITE_URL?>?question/addscore.html" method="post" >
        <input type="hidden" value="<?=$question['id']?>" name="qid">
        <table class="table ">
            <tr valign="top">
                <td>提问期内，追加悬赏一次，可延长问题的有效期3天。悬赏越高，会吸引到越多的关注。</td>
            </tr>
            <tr>            
                <td>
                    <div class="inputbox mt15">
                        追加悬赏:&nbsp;<select name="score" id="addscore" class="normal_select">
                            <option value="5" selected="selected">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>&nbsp;分
                    </div>
                </td>
            </tr>
           <tr>
                <td><button type="submit" class="btn btn-success" >确&nbsp;认</button></td>
            </tr>
        </table>
    </form>

    </div>
   
  </div>
</div>
</div>

 <? if(1==$user['grouptype'] && $user['uid']) { ?><div class="modal fade" id="catedialog">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">修改分类</h4>
    </div>
    <div class="modal-body">
    
      <div id="dialogcate">
        <form class="form-horizontal"  name="editcategoryForm" action="<?=SITE_URL?>?question/movecategory.html" method="post">
            <input type="hidden" name="qid" value="<?=$question['id']?>" />
            <input type="hidden" name="category" id="categoryid" />
            <input type="hidden" name="selectcid1" id="selectcid1" value="<?=$question['cid1']?>" />
            <input type="hidden" name="selectcid2" id="selectcid2" value="<?=$question['cid2']?>" />
            <input type="hidden" name="selectcid3" id="selectcid3" value="<?=$question['cid3']?>" />
            <table class="table ">
                <tr valign="top">
                    <td >
                        <select  id="category1" class="catselect" size="8" name="category1" ></select>
                    </td>
                    <td align="center" valign="middle" ><div style="display: none;" id="jiantou1">>></div></td>
                    <td >                                        
                        <select  id="category2"  class="catselect" size="8" name="category2" style="display:none"></select>                                        
                    </td>
                    <td align="center" valign="middle" ><div style="display: none;" id="jiantou2">>>&nbsp;</div></td>
                    <td >
                        <select id="category3"  class="catselect" size="8"  name="category3" style="display:none"></select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                   
                   
                <span>
                    <input  type="submit" class="btn btn-success" value="确&nbsp;认" onclick="change_category();"/></span>
                    <span>
                    <button type="button" class="btn btn-success" data-dismiss="modal">关闭</button>
                    </span>
                
              
                    </td>
                </tr>
            </table>
        </form>
    </div>

    </div>
   
  </div>
</div>
</div>
  <? } ?></div>
<script src="<?=SITE_URL?>css/dist/js/gundong.js" type="text/javascript"></script>
<div class="pop-support" id="support_tip">+1</div>
<script>
if(typeof($(".comments-list .text img").attr("data-original"))!="undefined"){
var imgurl=$(".comments-list .text img").attr("data-original");
$(".comments-list .text img").attr("src",imgurl);
}
$(".comments-list .text img").attr("data-toggle","lightbox");
$(".comments-list .text img").attr("class","img-thumbnail");

</script>
<script type="text/javascript">
                                var category1 = <?=$categoryjs['category1']?>;
                                var category2 = <?=$categoryjs['category2']?>;
                                var category3 = <?=$categoryjs['category3']?>;
                                var selectedcid = "<?=$question['cid1']?>,<?=$question['cid2']?>,<?=$question['cid2']?>";
                                $(document).ready(function() {
                        initcategory(category1);
                                fillcategory(category2, $("#category1 option:selected").val(), "category2");
                                fillcategory(category3, $("#category2 option:selected").val(), "category3");
                                //关闭问题
                                $("#close_question").click(function() {
                        if (confirm('确定关闭该问题?') === true) {
                        document.location.href = "<?=SITE_URL?>?question/close/<?=$question['id']?>.html";
                        }
                        });
                                //删除问题
                                $("#delete_question").click(function() {
                        if (confirm('确定删除问题？该操作不可返回！') === true) {
                        document.location.href = "<?=SITE_URL?>?question/delete/<?=$question['id']?>.html";
                        }
                        });
                                $(".anscontent img,.description img,.mainbox img,.qa-content img").each(function(i) {
                        var img = $(this);
                                $.ajax({
                                type: "POST",
                                        url: "<?=SITE_URL?>?index/ajaxchkimg.html",
                                        async: true,
                                        data: "imgsrc=" + img.attr("src"),
                                        success: function(status) {
                                        if ('1' == status) {
                                        img.wrap("<a href='" + img.attr("src") + "' title='" + img.attr("title") + "' data-lightbox='comment'></a>");
                                        }
                                        }
                                });
                        });

                                $(".button_agree").hover(function(){
                        var answerid = $(this).parent().attr("id");
                                var supportobj = $(this);
                                $.ajax({
                                type: "GET",
                                        url:"<?=SITE_URL?>index.php?answer/ajaxhassupport/" + answerid,
                                        cache: false,
                                        success: function(hassupport){
                                        if (hassupport == '1'){
                                        supportobj.html("已赞同");
                                        } else{
                                        supportobj.html("赞同");
                                        }
                                        }
                                });
                                $(this).css("font-weight", "normal");
                        }, function(){
                        var answerid = $(this).parent().attr("id");
                                var supportobj = $(this);
                                $.ajax({
                                type: "GET",
                                        url:"<?=SITE_URL?>index.php?answer/ajaxgetsupport/" + answerid,
                                        cache: false,
                                        success: function(support){
                                        supportobj.html(support);
                                        }
                                });
                                $(this).css("font-weight", "bold");
                        });
                                $(".button_agree").click(function(){
                        var supportobj = $(this);
                                var answerid = $(this).parent().attr("id");
                                $.ajax({
                                type: "GET",
                                        url:"<?=SITE_URL?>index.php?answer/ajaxhassupport/" + answerid,
                                        cache: false,
                                        success: function(hassupport){
                                        if (hassupport != '1'){
                                        
                                        	supportobj.css("position","relative").addClass("animate bounceIn");
                                        $("#support_tip").css({height:"0px", opacity:0});
                                        
                                                $("#support_tip").show();
                                                $("#support_tip").position({my:"top-40", of: supportobj});
                                                $("#support_tip").animate({"opacity":"1"}, 500).animate({"opacity":"0"}, 200);
                                                $.ajax({
                                                type: "GET",
                                                        cache:false,
                                                        url: "<?=SITE_URL?>index.php?answer/ajaxaddsupport/" + answerid,
                                                        success: function(comments) {
                                                        	
                                                        supportobj.html(comments);
                                                        }
                                                });
                                        }
                                        }
                                });
                        });
                                SyntaxHighlighter.all();
                        });
                                function show_comment(answerid) {
                                if ($("#comment_" + answerid).css("display") === "none") {
                                load_comment(answerid);
                                        $("#comment_" + answerid).slideDown();
                                } else {
                                $("#comment_" + answerid).slideUp();
                                }
                                }

                        function change_category() {
                        var category1 = $("#category1 option:selected").val();
                                var category2 = $("#category2 option:selected").val();
                                var category3 = $("#category3 option:selected").val();
                                if (category1 > 0) {
                        $("#categoryid").val(category1);
                        }
                        if (category2 > 0) {
                        $("#categoryid").val(category2);
                        }
                        if (category3 > 0) {
                        $("#categoryid").val(category3);
                        }
                        $("#catedialog").model("hide");
                                $("form[name='editcategoryForm']").submit();
                        }

                        function adoptanswer(aid) {
                     
                                $("#adopt_answer").val(aid);
                            
                                $('#dialogadopt').modal('show');
                        }
                        function edittag() {
                        	 $('#dialog_tag').modal('show');
                             
                        }

                        //提高悬赏
                        function append_score() {
                    
                                $("#append_score").modal('show');
                        }
                        function close_question() {
                        if (confirm('确定关闭该问题?') === true) {
                        document.location.href = "<?=SITE_URL?>?question/close/<?=$question['id']?>.html";
                        }
                        }

                        //添加评论
                        function addcomment(answerid) {
                        var content = $("#comment_" + answerid + " input[name='content']").val();
                        var replyauthor = $("#comment_" + answerid + " input[name='replyauthor']").val();
                        if (g_uid == 0){
                            login();
                            return false;
                        }
                        if (bytes($.trim(content)) < 5){
                        alert("评论内容不能少于5字");
                                return false;
                        }
                        $.ajax({
                        type: "POST",
                                url: "<?=SITE_URL?>?answer/addcomment.html",
                                data: "content=" + content + "&answerid=" + answerid+"&replyauthor="+replyauthor,
                                success: function(status) {
                                if (status == '1') {
                                $("#comment_" + answerid + " input[name='content']").val("");
                                        load_comment(answerid);
                                }
                                }
                        });
                        }

                        //删除评论
                        function deletecomment(commentid, answerid) {
                        if (!confirm("确认删除该评论?")) {
                        return false;
                        }
                        $.ajax({
                        type: "POST",
                                url: "<?=SITE_URL?>?answer/deletecomment.html",
                                data: "commentid=" + commentid + "&answerid=" + answerid,
                                success: function(status) {
                                if (status == '1') {
                                load_comment(answerid);
                                }
                                }
                        });
                        }
                        function load_comment(answerid){
                        $.ajax({
                        type: "GET",
                                cache:false,
                                url: "<?=SITE_URL?>index.php?answer/ajaxviewcomment/" + answerid,
                                success: function(comments) {
                                $("#comment_" + answerid + " .comments-list").html(comments);
                                }
                        });
                        }
                        
                        function replycomment(commentauthorid,answerid){
                            var comment_author = $("#comment_author_"+commentauthorid).attr("title");
                            $("#comment_"+answerid+" .comment-input").focus();
                            $("#comment_"+answerid+" .comment-input").val("回复 "+comment_author+" :");
                            $("#comment_" + answerid + " input[name='replyauthor']").val(commentauthorid);
                        }
                        //检举
                        function inform(name, type) {
                        var content = name + '的回答';
                                if (type == 1) {
                        content = name + '的提问';
                        }
                        $("#append_score").dialog({
                        autoOpen: false,
                                width: 480,
                                modal: true,
                                resizable: false
                        });
                                $("#append_score").dialog("open");
                        }


</script>
<? include template('footer'); ?>
