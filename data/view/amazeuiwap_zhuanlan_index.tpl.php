<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('public_zhuanlan_header'); ?>
<div class="top">
    <h1>知乎<span class="bull">·</span>专栏</h1>
    <h2>随心写作，自由表达</h2>
   
</div>



<section class="l-receptacle">
    <h3><span>专栏 · 发现</span></h3>
  
    <ul class="a-user-zl u-zhuanlan">
     
<? if(is_array($topicusers)) { foreach($topicusers as $tuser) { ?>
        <li class="item">
            <div class="row">
                <div class="col-xs-2 padding-l-none">
                      <img src="<?=$tuser['avatar']?>" style="width:48px;height:48px;" class="img-rounded u-avatar" />
                </div>
                <div class="col-xs-6 padding-l-none padding-r-none">
                    <p class="title">
                        <a href="<?=SITE_URL?>?ut-<?=$tuser['uid']?>.html" ><?=$tuser['username']?></a>
                    </p>
                    <p class="description">
                        <a  href="javascript:void(0)" >
                        <?=$tuser['signature']?>
                        </a>

                    </p>
                </div>
                <div class="col-xs-4 linkzl text-left">
                      <a href="<?=SITE_URL?>?ut-<?=$tuser['uid']?>.html">进入专栏</a>
                </div>
            </div>
        </li>
 
<? } } ?>
    </ul>
    
    
    <p class="random">
        <a class="btn btn-black btn-90_32" href="javascript:updateuserarticle();" ><i class="icon icon-refresh mar-r-1"></i>换一换</a>
    </p>
</section>

<section class="l-receptacle">
    <h3><span>文章 · 发现</span></h3>

     <ul class="u-items u-getarticles">
       
<? if(is_array($topiclist)) { foreach($topiclist as $index => $topic) { ?>
         <li class="item post-card-item clearfix">

        <a  href="<?=SITE_URL?>?article-<?=$topic['id']?>.html">
        
       

             <div class="col-xs-4 padding-l-none padding-r-none" >

 <? $index=strstr($topic['image'],'http'); ?>                       <? if($index) { ?>                            
                          
 <img src="<?=$topic['image']?>" class="img-rounded post-img">
                            <? } else { ?>                         <img src="<?=SITE_URL?><?=$topic['image']?>" class="img-rounded post-img">
                           
                            <? } ?>                  
               
             </div>
             <div class="col-xs-8 padding-l-none padding-r-none ">
                 <p class="title padding-l-none padding-r-none"><?=$topic['title']?></p>
                 <p class="post-author">

                     <a target="_blank" href="javascript:void(0))"><?=$topic['author']?></a>
                     <span class="pull-right time"><?=$topic['viewtime']?></span>
                 </p>
             </div>
              </a>
         </li>
  
<? } } ?>
     </ul>
    <p class="random clearfix">
        <a class="btn btn-black btn-90_32" href="javascript:getnewarticle();" ><i class="icon icon-refresh mar-r-1"></i>换一换</a>
    </p>
    </section>
    
    
<div class="bottom">
    <h3>在这创作灵感</h3>


    <p class="copyright">
        <a ui-open-blank="" href="javascript:void(0);" class="about">关于专栏</a>
        <span>©2016 <?=$setting['site_name']?>问答</span>
    </p>
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
var msg = new $.zui.Messager('当前没有最新内容', {placement: 'bottom'});


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
        
            	
        	
        	
        	
        	
        	
        	
        	$(".u-zhuanlan").html("");
        	for(var i=0;i<data.length;i++){
        		  var tpl=' <li class="item">		            <div class="row">		                <div class="col-xs-2 padding-l-none">		                      <img src="#tx" class="img-rounded u-avatar" />		                </div>		                <div class="col-xs-6 padding-l-none padding-r-none">		                    <p class="title">		                        <a href="#zl" >#username</a>		                    </p>		                    <p class="description">		                        <a  href="javascript:void(0)" >		                        #uqm		                        </a>		                    </p>	                </div>		                <div class="col-xs-4 linkzl text-left">		                      <a href="#zl">进入专栏</a>		                </div>		            </div>		   		            </li>   ';
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
var msg = new $.zui.Messager('当前没有最新内容', {placement: 'center'});


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
        		  var tpl='<a href="#u-article">		        			            <li class="item post-card-item clearfix">	             <div class="col-xs-4 padding-l-none padding-r-none">		                         <img src="#image" class="img-rounded post-img">		                           		                          		                  		               		             </div>		             <div class="col-xs-8 padding-l-none padding-r-none ">		                 <p class="title padding-l-none padding-r-none">#title</p>		                 <p class="post-author">		                     <a target="_blank" href="javascript:void(0)">#author</a>		                     <span class="pull-right time">#viewtime</span>		                 </p>		             </div>		         </li>		         		        	</a>';
        		 //#u-article  #title #author #uspace #viewtime #image
     		  
        		 
        		  
        		  tpl=tpl.replaceAll("#u-article",g_site_url + '' + query + 'article-'+data[i].id+".html");
        		  tpl=tpl.replaceAll("#title",data[i].title);
        		  tpl=tpl.replaceAll("#uspace",g_site_url + '' + query + 'u-'+data[i].uid + g_suffix);
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
