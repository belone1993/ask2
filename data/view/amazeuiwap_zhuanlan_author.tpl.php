<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('public_zhuanlan_header'); ?>
<div class="main receptacle ">
    <div class="column-about">
        <div class="avatar-link">
            <img class="avatar-big img-circle" src="<?=$member['avatar']?>"  />
        </div>
        <div href="/steveli" class="title ng-binding">  <?=$member['username']?></div>
        <div class="description " > <?=$member['signature']?></div>

        <div class="functions ">
        
             <? if($is_followed) { ?>                        <button  onclick="attentto_user(<?=$member['uid']?>)" id="attenttouser_<?=$member['uid']?>"  class="btn btn-90_36  button_followed  btn-green">关注作者</button> 

                    <? } else { ?>                        <button onclick="attentto_user(<?=$member['uid']?>)" id="attenttouser_<?=$member['uid']?>" class="btn btn-90_36   button_attention  btn-green">关注作者</button> 

                     <? } ?>                     
                     
      

        </div>

        <div class="followers ">
            <a  href="/steveli/followers" ><?=$member['followers']?> 人关注</a>
        </div>

        <div class="tags ">
            <span class="tag  current" ><b>全部</b><?=$rownum?></span>

           <span  >
      
 
<? if(is_array($catags)) { foreach($catags as $ctag) { ?>
       <span  class="tag  "  id="<?=$ctag['id']?>" ><b class="ng-binding" ><?=$ctag['name']?></b><?=$ctag['num']?></span>
          
             
<? } } ?>
      </span>
        </div>
    </div>


    <div class="items-container">
        <div class="block-title ng-scope"   >
            <span ><span >最新文章</span></span>

        </div>

      <ul class="items">
<? if(is_array($topiclist)) { foreach($topiclist as $index => $topic) { ?>
      
          <li class="item item-with-title-img">

              <article class="hentry">
                  <a href="<?=SITE_URL?>?article-<?=$topic['id']?>.html" class="entry-link">
                      <h1 class="entry-title "><?=$topic['title']?></h1>

                    <div class="title-img-container">
                    
                     <? $index=strstr($topic['image'],'http'); ?>                       <? if($index ) { ?>                            
                         <div class="title-img-preview"  style="background-image: url(<?=$topic['image']?>);">  
                            

                            <? } else { ?>                        

                           <div class="title-img-preview"  style="background-image: url(<?=SITE_URL?><?=$topic['image']?>);">  

                            <? } ?>                   
                   
                     
                      </div>
                  </div>



                      <section class="entry-summary" style="padding-top:0px">
                          <p  max="truncateMax" class="ng-isolate-scope">
                        <? echo cutstr(strip_tags(str_replace('&nbsp;','',$topic['describtion'])),110,'...'); ?>                              <span class="read-all">查看全文<i class="icon-ic_unfold"></i></span>
                          </p>
                      </section>
                  </a>

                  <footer>
                      <div class="entry-meta">
                         
                          <time  class="published ng-binding ng-isolate-scope hover-title"><?=$topic['viewtime']?></time>

                      </div>

                   <div class="entry-func ng-scope">
                      <a href="javascript:void(0)" class="vote-num ng-binding" ><?=$topic['views']?><span> 浏览</span></a>


                  </div>


                  </footer>


              </article>
          </li>
  
<? } } ?>
      </ul>
        <div class="posts-end" ><i class="icon icon-smile icon-ic_column_end"></i></div>
    </div>
</div>
<script>
var pages=<?=$pages?>;
var curr_cid='';
var muid='<?=$member['uid']?>';
var num = 1;
String.prototype.replaceAll = function (str1,str2){
var str = this; 
var result = str.replace(eval("/"+str1+"/gi"),str2);
return result;
}

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
                $("#attenttouser_"+uid).html("关注");
            }
        }
    });
}
$(".tags .tag").click(function(){
 num = 1;
 $(".items").html("");
$(".tag").removeClass("current");
$(this).addClass("current");
var cid=$(this).attr("id");
curr_cid=cid;
getlist(cid,muid,1);
});

function getlist(cid,uid,pageindex){<? if($setting['seo_on']=='1') { ?>var query='';<? } else { ?>var query='?';<? } ?> $.ajax({
        url: "<?=SITE_URL?>?topic/getbycatidanduid/"+uid+"/"+cid+"/"+pageindex,
        dataType: 'json',
        success: function(data) {
        	
        
        	
        	
        	
          
          
        	
        	
        	
        	
        	
        	
        
        	for(var i=0;i<data.length;i++){
        		  var tpl='  <li class="item item-with-title-img">	              <article class="hentry">	                  <a href="#topicurl" class="entry-link">	                      <h1 class="entry-title ">#title</h1>	                    <div class="title-img-container">	                    	                  	                           	                         <div class="title-img-preview"  style="background-image: url(#image);">  	                            	                   	                   	                    	                      </div>	                  </div>	                      <section class="entry-summary" style="padding-top:0px">	                          <p  max="truncateMax" class="ng-isolate-scope">	                          #describtion	                              <span class="read-all">查看全文<i class="icon-ic_unfold"></i></span>	                          </p>	                      </section>	                  </a>	                  <footer>	                      <div class="entry-meta">	                         	                          <time  class="published ng-binding ng-isolate-scope hover-title">#viewtime</time>	                      </div>	                   <div class="entry-func ng-scope">	                      <a href="javascript:void(0)" class="vote-num ng-binding" >#views<span> 浏览</span></a>	                  </div>	                  </footer>	              </article>	        </li>';
        		  tpl=tpl.replaceAll("#topicurl",g_site_url + '' + query + 'article-'+data[i].id+".html");
        		  tpl=tpl.replaceAll("#title",data[i].title);
        		
        		  if(data[i].image.indexOf('http')!=-1){
        			  tpl=tpl.replaceAll("#image",data[i].image);
        		  }else{
        			  tpl=tpl.replaceAll("#image",g_site_url+data[i].image);
        		  }
        		  tpl=tpl.replaceAll("#describtion",data[i].describtion);
        		  tpl=tpl.replaceAll("#viewtime",data[i].viewtime);
        		  tpl=tpl.replaceAll("#views",data[i].views);
        		 
        		
        		
        		  $(".items").append(tpl);
        	}
           //#topicurl #title #image #describtion   #viewtime #views
         
           
           
          
           
        }
    });
}
$(document).ready(function(){
    var range = 50;             //距下边界长度/单位px
    var elemt = 500;           //插入元素高度/单位px
    var maxnum = pages;            //设置加载最多次数
   
    var totalheight = 0;
    var main = $("#content");                     //主体元素
    $(window).scroll(function(){
        var srollPos = $(window).scrollTop();    //滚动条距顶部距离(页面超出窗口的高度)


        totalheight = parseFloat($(window).height()) + parseFloat(srollPos);
        if(($(document).height()-range) <= totalheight  && num != maxnum) {
        	num++;
        	getlist(curr_cid,muid,num);
            
        }
    });
});
</script>
<? include template('public_zhuanlan_footer'); ?>
