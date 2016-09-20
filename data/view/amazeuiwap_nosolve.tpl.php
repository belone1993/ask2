<? if(!defined('IN_ASK2')) exit('Access Denied'); include template(header,wap); ?>
<script>
var _qtitle="<?=$question['title']?>";
var _qcontent="  <? echo str_replace('&nbsp;','',replacewords(strip_tags($question['description'])));     ?>";
var imgurl="<?=$question['author_avartar']?>";
</script>
<section class="am-container">
<p class="am-cf am-margin-bottom-0"><span class="am-fl">

      <? if($question['hidden']) { ?>               匿名
                    <? } elseif($question['authorid']==0) { ?>                  <? if($question['ip']) { ?><?=$question['ip']?><? } else { ?>游客<? } ?>                    <? } else { ?>                  <a  href="<?=SITE_URL?>?u-<?=$question['authorid']?>.html" target="_blank" ><?=$question['author']?></a>
                    <? } ?></span> <span class="am-fr"><?=$question['format_time']?></span></p>
<h1 class="am-margin-0 am-text-lg"><?=$question['title']?></h1><? if($question['description']!='') { ?>    <p class="am-margin-0">
        <article data-am-widget="paragraph"
                 class="am-paragraph am-paragraph-default am-margin-0"

                 data-am-paragraph="{ tableScrollable: true, pureview: true }">

  <? echo replacewords($question['description']);     ?>  
          

            </article>
    </p>
    <ul class="am-list">
        
<? if(is_array($supplylist)) { foreach($supplylist as $supply) { ?>
        <li><span class="am-margin-right-sm">问题补充 : <?=$supply['format_time']?></span>
      
          <? echo replacewords($supply['content']);     ?>  
        </li>
        
<? } } ?>
    </ul><? } ?><hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
    <p class="am-margin-0">
        <? if($taglist) { ?>        <span class="am-fl">标签：
             
<? if(is_array($taglist)) { foreach($taglist as $tag) { ?>
                <a target="_blank" title="<?=$tag?>" href="<?=SITE_URL?>?tag-<?=$tag?>.html"><?=$tag?></a>

                
<? } } ?>
        </span>
        <? } ?>        <span class="am-fr">浏览<?=$question['views']?>次</span>
    </p>
    
    <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
 <? if(1==$user['grouptype'] && $user['uid']) { ?>     
       <a  title="删除问题" onclick="deleteq(<?=$question['id']?>)" id="delete_question" class="am-margin-sm am-fr">删除问题</a>
        <? } if(!$already && $user['uid']!= $question['authorid']) { ?>    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-margin-0" >
        <h2 class="am-titlebar-title ">
            我来回答
        </h2>


    </div>

   <form class="am-form"  name="answerForm" action="<?=SITE_URL?>?question/answer.html" method="post">
       <input type="hidden" value="<?=$question['id']?>" name="qid">
       <input type="hidden" value="<?=$question['title']?>" name="title">


           <textarea name="content" class="am-form-field am-input-lg am-margin-bottom-sm" placeholder="请输入评论内容"></textarea>


       <? if($setting['code_ask']) { ?>       <input type="text" onblur="check_code()" name="code" id="code" class="code-input" placeholder="请输入验证码">
     <span class="verifycode">
         <img id="verifycode" onclick="javascript:updatecode();" src="<?=SITE_URL?>?user/code.html">
     </span>
       <a class="changecode" href="javascript:updatecode();">&nbsp;换一个</a>
       <span id="codetip"></span>
       <? } ?>       <button type="submit" name="submit"  class="am-btn am-btn-primary am-margin-top-sm">确定</button>
   </form><? } if($answerlist) { ?><div class="am-list-news-hd am-cf">

        <a href="javascript:void(0)">
            <h2>回答(<?=$question['answers']?>)</h2>

        </a>
    </div><? } if(is_array($answerlist)) { foreach($answerlist as $index => $answer) { ?>
    <article class="am-comment am-margin-top-sm"  id="comment_<?=$index?>">
        <a href="<?=SITE_URL?>?u-<?=$answer['authorid']?>.html">
            <img  alt="<?=$answer['author']?>" src="<?=$answer['author_avartar']?>" class="am-comment-avatar" width="48" height="48"/>
        </a>

        <div class="am-comment-main">
            <header class="am-comment-hd">
                <!--<h3 class="am-comment-title">评论标题</h3>-->
                <div class="am-comment-meta">
                    <a href="<?=SITE_URL?>?u-<?=$answer['authorid']?>.html" class="am-comment-author"><?=$answer['author']?></a>
                    评论于 <time datetime="<?=$answer['time']?>" ><?=$answer['time']?></time>

                    <? if($user['uid']==$question['authorid']) { ?>                    <i class="am-icon-check am-fr" onclick="adoptanswer(<?=$answer['id']?>);">采纳</i>
                    <? } ?>                </div>
            </header>

            <div class="am-comment-bd">
                <p>
                 <? echo replacewords($answer['content']);     ?>                  
                </p>
                
<? if(is_array($answer['appends'])) { foreach($answer['appends'] as $append) { ?>
                    <? if($append['authorid']==$answer['authorid']) { ?>                    <blockquote>回答:<span class='time'><?=$append['format_time']?></span></blockquote>
                    <? } else { ?>                    <blockquote>追问:<span class='time'><?=$append['format_time']?></span></blockquote>

                    <? } ?>                    <blockquote> 
                            <? echo replacewords($append['content']);     ?>                 
                    
                    </blockquote>

                
<? } } ?>
            </div>
            <footer class="am-comment-footer">
                <div class="am-comment-actions am-cf">
                    <a href="javascript:void(0);"  id="<?=$answer['id']?>"><i  id="my-popover"  class="am-icon-thumbs-up button_agree"><?=$answer['supports']?></i></a>

                    <a href="javascript:void(0)" class="am-fr" asid="<?=$answer['id']?>" id="cm_<?=$answer['id']?>"   onclick="show_comment('<?=$answer['id']?>');"><i class="am-icon-comment"></i><?=$answer['comments']?></a>
                </div>
                <div class="comment" id="comment_<?=$answer['id']?>" style="display: none;">
                    <!--<div class="comm-arrow-label"></div> -->

                    <ul class="am-list ">

                    </ul>

                    <div class="comm-box zero-answer">


                        <textarea name="content" class="am-form-field am-input-lg am-margin-bottom-sm comment-input" placeholder="请输入评论内容"></textarea>



                    </div>
                    <div class="functions mt15 cf">



                        <input type='hidden' value='0' name='replyauthor' />
                        <button type="button" name="submit" onclick="addcomment(<?=$answer['id']?>);" class="am-btn am-btn-primary am-btn-block" >
                            发布评论
                        </button>

                    </div>
                </div>
            </footer>
        </div>
    </article>
<? } } ?>
<div class="am-modal am-modal-prompt" tabindex="-1" id="my-prompt">

    <div class="am-modal-dialog">
        <div class="am-modal-hd">采纳提示</div>
        <div class="am-modal-bd">
           对帮助你的人说点什么
            <form name="editanswerForm"  action="<?=SITE_URL?>?question/adopt.html" method="post" >
            <textarea class="am-modal-prompt-input" name="content">非常感谢!</textarea>
            <input type="hidden"  value="<?=$question['id']?>" name="qid"/>
            <input type="hidden" id="adopt_answer" value="0" name="aid"/>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn"  data-am-modal-confirm><button type="submit" class="am-btn btnadopt" >提交</button></span>
        </div>
    </div>
    </form>
</div><? if($user['uid']>0&&$user['active']!=1) { ?><div class="modal fade" id="emailtip">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title">温馨提示</h4>
    </div>
    <div class="modal-body">
      <p>由于网站设置，需要设置邮箱并且激活邮箱才能提问,<a href="<?=SITE_URL?>?user/editemail.html"> 激活邮箱走起!</a></p>
   
    </div>
 
  </div>
</div>
</div>
<script>
$("#emailtip").modal("show");
</script><? } ?><div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">温馨提示</div>
        <div class="am-modal-bd">
            你，确定要删除这条记录吗？
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
        </div>
    </div>
</div>
    <div class="pages">
        <?=$departstr?>
    </div>
    <!--待解决问题-->
    <div data-am-widget="list_news" class="am-list-news am-list-news-default">
        <!--列表标题-->
        <div class="am-list-news-hd am-cf">
            <!--带更多链接-->
            <a href="###">
                <h2>帮助Ta们</h2>
                <a href="<?=SITE_URL?>?c-all/1.html"> <span class="am-list-news-more am-fr">更多 &raquo;</span></a>
            </a>
        </div>
        <div class="am-list-news-bd">
            <ul class="am-list">
                <? $nosolvelist=$this->fromcache('nosolvelist'); ?>                
<? if(is_array($nosolvelist)) { foreach($nosolvelist as $index => $question) { ?>
                <li class="am-g am-list-item-desced">
                    <a title="<?=$question['title']?>" href="<?=SITE_URL?>?q-<?=$question['id']?>.html" class="am-list-item-hd"><?=$question['title']?></a>
                    <div class="am-list-item-text "><?=$question['description']?></div>
                    <div class="am-cf">
                        <small>  <span class="am-fl am-text-top">
                              <img width="25" height="25"   src="<?=$question['avatar']?>"/>
                            <?=$question['author']?></span> <span class="am-fr"><?=$question['format_time']?></span></small>
                    </div>
                </li>
                
<? } } ?>
            </ul>
        </div>
    </div>
</section>

<script type="text/javascript">
    function adoptanswer(aid) {
        $('#my-prompt').modal({
            relatedTarget: this,
            onConfirm: function(e) {
                var query = '?';

                document.editanswerForm.action = g_site_url + '' + query + 'question/adopt' + g_suffix;
                document.editanswerForm.submit();
            },
            onCancel: function(e) {

            }
        });
        $("#adopt_answer").val(aid);

    }
    $(document).ready(function() {




        $(".button_agree").click(function(){
            var supportobj = $(this);
            var answerid = $(this).parent().attr("id");
            var valcount= $(this).html();

            $.ajax({
                type: "GET",
                url:"<?=SITE_URL?>index.php?answer/ajaxhassupport/" + answerid,
                cache: false,
                success: function(hassupport){

                    if (hassupport != '1'){


                                valcount=parseInt(valcount)+1;
                                // supportobj.val(valcount);
                                supportobj.html(valcount);


                    }else{

                        $('#my-popover').popover({
                            content: '您已经赞过'
                        }).show(1000,function(){
                            $('#my-popover').popover('close');
                        });

                    }
                }
            });
        });

    });
    $(".add-comment").click(function(){
        var id=$(this).attr("asid");

        show_comment(id);
    });
    function show_comment(answerid) {

        if ($("#comment_" + answerid).css("display") === "none") {

            load_comment(answerid);
            $("#comment_" + answerid).slideDown();
        } else {
            $("#comment_" + answerid).slideUp();
        }
    }







    //添加评论
    function addcomment(answerid) {
        var content = $("#comment_" + answerid + " .comment-input").val();

        var replyauthor = $("#comment_" + answerid + " input[name='replyauthor']").val();

        if (g_uid == 0){
            window.location.href='<?=SITE_URL?>?user/login.html';
            return false;
        }
        if (bytes($.trim(content)) < 2){
            alert("评论内容不能少于2字");
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
      //  if (!confirm("确认删除该评论?")) {
       //     return false;
      //  }
        $('#my-confirm').modal({
            relatedTarget: this,
            onConfirm: function(options) {

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
            },
            // closeOnConfirm: false,
            onCancel: function() {
                alert('算求，不弄了');
            }
        });
        return false;

    }
    //删除问题
   function deleteq(qid){
   if (confirm('确定删除问题？该操作不可返回！') === true) {

document.location.href ="<?=SITE_URL?>index.php?question/delete/" + qid;
}
    }
    function load_comment(answerid){
        $.ajax({
            type: "GET",
            cache:false,
            url: "<?=SITE_URL?>index.php?answer/ajaxviewcomment/" + answerid,
            success: function(comments) {
                $("#comment_" + answerid + " .am-list").html(comments);
                $(comments+"*").addClass("am-margin-0");
                $(comments+"img").addClass("am-margin-top-sm");
                var len= $("#comment_" + answerid + " .am-list").find("li").length;
                $("#cm_"+answerid).html("<i class='am-icon-comment'></i><em>"+len+"<em>");
            }
        });
    }
    function bytes(str) {
        var len = 0;
        for (var i = 0; i < str.length; i++) {
            if (str.charCodeAt(i) > 127) {
                len++;
            }
            len++;
        }
        return len;
    }
    function replycomment(commentauthorid,answerid){
        var comment_author = $("#comment_author_"+commentauthorid).attr("title");
        $("#comment_"+answerid+" .comment-input").focus();
        $("#comment_"+answerid+" .comment-input").val("回复 "+comment_author+" :");
        $("#comment_" + answerid + " input[name='replyauthor']").val(commentauthorid);
    }



</script>
<? include template('footer'); ?>
