<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('public_zhuanlan_header'); ?>
<div class="home">



<div class="zl-content-home">

    <div class="zl-top">
        <h1>文章<span class="bull">·</span>专栏</h1>
        <h2>随心写作，自由表达</h2>
           <? if(0!=$user['uid']) { ?>                        <a  href="<?=SITE_URL?>?user/addxinzhi.html" class="btn btn-black write-btn">开始写文章</a>
                      <? } else { ?> <a  href="javascript:login();" class="btn btn-black write-btn">开始写文章</a>
                     <? } ?>       
    </div>

</div>
<section class="l-receptacle">
    <h3><span>专栏 · 发现</span></h3>
     <div class="u-zhuanlan row">
      
<? if(is_array($topicusers)) { foreach($topicusers as $tuser) { ?>
         <div class="column-card-item col-md-3 text-center">
             <p class="avatar">
                 <a href="<?=SITE_URL?>?ut-<?=$tuser['uid']?>.html"  class="">
                     <img style="width:48px;height:48px;" src="<?=$tuser['avatar']?>"  class="img-circle">
                 </a>
             </p>

             <p class="title"><a  href="<?=SITE_URL?>?u-<?=$tuser['uid']?>.html" ><?=$tuser['username']?></a></p>
             <p class="description"><a  href="<?=SITE_URL?>?u-<?=$tuser['uid']?>.html" class="ng-binding"><?=$tuser['signature']?></a></p>
             <p class="meta ng-binding">
                 <?=$tuser['followers']?> 人关注
                 <span class="split">|</span>
                 <?=$tuser['num']?> 篇文章
             </p>
             <a class="btn btn-green btn-90_32" href="<?=SITE_URL?>?ut-<?=$tuser['uid']?>.html">进入专栏</a>
         </div>

  
<? } } ?>
     </div>
    <p class="random">
        <a class="btn btn-black btn-90_32" href="javascript:updateuserarticle();">
            <i class="icon icon-refresh mar-r-03"></i>换一换</a>
    </p>
</section>
    <section class="l-receptacle">

        <h3><span>文章 · 发现</span></h3>
        <div class="u-getarticles row">
         
<? if(is_array($topiclist)) { foreach($topiclist as $index => $topic) { ?>
            <div class="col-md-4 col-sm-6 col-xs-12 post-card-item">
                <a  href="<?=SITE_URL?>?article-<?=$topic['id']?>.html">
                   <? $index=strstr($topic['image'],'http'); ?>                       <? if($index) { ?>                            
                             <p class="post-img " style="background-image: url(<?=$topic['image']?>);"></p>

                            <? } else { ?>                           
                             <p class="post-img " style="background-image: url(<?=SITE_URL?><?=$topic['image']?>);"></p>
                            <? } ?>                  
                   
                   
                    <p class="title "><?=$topic['title']?></p>

                </a>
                <p class="meta">
                    <span class="author ellipsis">
                        <a target="_blank" href="<?=SITE_URL?>?u-<?=$topic['authorid']?>.html" class="ng-binding "><?=$topic['author']?></a></span>
                   
                    <span  class="source ellipsis ng-scope ">发表于  <a class="time"><?=$topic['viewtime']?></a></span>
                </p>
            </div>

            
<? } } ?>
            

        </div>
        <p class="random">
            <a class="btn btn-black btn-90_32" href="javascript:getnewarticle();" > <i class="icon icon-refresh mar-r-03"></i>换一换</a>
        </p>
        </section>
        <div class="bottom">
    <h3>在Ask2问答创作</h3>
   

    <p class="copyright">
      <a href="javascript:void(0)" class="about">关于专栏</a>
      <span>©2016 Ask2问答</span>
    </p>
  </div>
</div>
<script>
var cur_tpage=1;
var p_cur_tpage=1;
var tpage=<?=$tpage?>;
var page=<?=$page?>;
String.prototype.replaceAll = function (str1,str2){
var str = this; 
var result = str.replace(eval("/"+str1+"/gi"),str2);
return result;
}
function updateuserarticle(){
var tpages=<?=$tpages?>;

if(tpages==1){
var msg = new $.zui.Messager('当前没有最新内容', {placement: 'center'});


// 显示消息
msg.show();
return false;
}else{


if(<?=$tpage?>==cur_tpage){
cur_tpage++;
}
if(cur_tpage>tpages){
cur_tpage=1;
}<? if($setting['seo_on']=='1') { ?>var query='';<? } else { ?>var query='?';<? } ?> $.ajax({
        url: "<?=SITE_URL?>?topic/getuserarticles/"+cur_tpage,
        dataType: 'json',
        success: function(data) {
        	cur_tpage++;
        console.log(data);
        	$(".u-zhuanlan").html("");
        	for(var i=0;i<data.length;i++){
        		  var tpl='<div class="column-card-item col-md-3 text-center"><p class="avatar">             <a href="#zl"  class="">                  <img src="#tx"  class="img-circle">               </a>             </p>            <p class="title"><a  href="#uspace" >#username</a></p>             <p class="description"><a  href="#uspace" class="ng-binding">#uqm</a></p>          <p class="meta ng-binding">                #followers 人关注                <span class="split">|</span>                 #num 篇文章             </p>  <a class="btn btn-green btn-90_32" href="#zl">进入专栏</a> </div>';
        		  tpl=tpl.replaceAll("#zl",g_site_url + '' + query + 'ut-'+data[i].uid+".html");
        		  tpl=tpl.replaceAll("#tx",data[i].avatar);
        		  tpl=tpl.replaceAll("#uspace",g_site_url + '' + query + 'u-'+data[i].uid + g_suffix);
        		  tpl=tpl.replaceAll("#uqm",data[i].signature);
        		  tpl=tpl.replaceAll("#username",data[i].username);
        		  tpl=tpl.replaceAll("#followers",data[i].followers);
        		  tpl=tpl.replaceAll("#num",data[i].num);
        		 
        		 
        		
        		  $(".u-zhuanlan").append(tpl);
        	}
           //<?=$zl?> <?=$tx?> <?=$uspace?>  <?=$username?> <?=$uqm?>  <?=$followers?> <?=$num?>
         
           
           
          
           
        }
    });
}


}
function getnewarticle(){
var pages=<?=$pages?>;
if(pages==1){
var msg = new $.zui.Messager('当前没有最新内容', {placement: 'bottom'});


// 显示消息
msg.show();
return false;
}else{

if(<?=$page?>==p_cur_tpage){
p_cur_tpage++;
}
if(p_cur_tpage>pages){
p_cur_tpage=1;
}<? if($setting['seo_on']=='1') { ?>var query='';<? } else { ?>var query='?';<? } ?> $.ajax({
        url: "<?=SITE_URL?>?topic/getnewlist/"+p_cur_tpage,
        dataType: 'json',
        success: function(data) {
        	p_cur_tpage++;
        
        	$(".u-getarticles").html("");
        	for(var i=0;i<data.length;i++){
        		  var tpl='<div class="col-md-4 col-sm-6 col-xs-12 post-card-item">	                  <a  href="#u-article">	                    		                              		                             <p class="post-img " style="background-image: url(#image);"></p>		                             		                    		                     		                     		                      <p class="title ">#title</p>		                  </a>		                  <p class="meta">		                      <span class="author ellipsis">		                        <a target="_blank" href="#uspace" class="ng-binding ">#author</a></span>		                    		                      <span  class="source ellipsis ng-scope ">发表于  <a class="time">#viewtime</a></span>	                  </p>		              </div>';
        		 //#u-article  #title #author #uspace #viewtime #image
     		  
        		 
        		  
        		  tpl=tpl.replaceAll("#u-article",g_site_url + '' + query + 'article-'+data[i].id+".html");
        		  tpl=tpl.replaceAll("#title",data[i].title);
        		  tpl=tpl.replaceAll("#uspace",g_site_url + '' + query + 'u-'+data[i].authorid + g_suffix);
        		  tpl=tpl.replaceAll("#author",data[i].author);
        		  tpl=tpl.replaceAll("#viewtime",data[i].viewtime);
        		  
        		  if(data[i].image.indexOf('http')!=-1){
        			  tpl=tpl.replaceAll("#image",data[i].image);
        		  }else{
        			  tpl=tpl.replaceAll("#image",g_site_url+data[i].image);
        		  }
        		  
        		
        		// console.log(tpl);
        		
        		
        		 $(".u-getarticles").append(tpl);
        	}
          
         
           
           
          
           
        }
    });
}
}
</script>
<? include template('public_zhuanlan_footer'); ?>
