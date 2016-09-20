<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); ?>
<section class="am-container" >
    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-margin-top-sm" >
        <h2 class="am-titlebar-title ">
            <? if(isset($touser)) { ?>您正在向<a href="<?=SITE_URL?>?u-<?=$touser['uid']?>.html"><?=$touser['username']?></a>提问<? } else { ?>请将您的问题告诉我们:<? } ?>        </h2>

    </div>


    <form class="am-form"enctype="multipart/form-data" method="POST" action="<?=SITE_URL?>?question/add.html" name="askform" id="askform" onsubmit="return check_form();">
    <input type="text" name="title" id="qtitle" value="<?=$word?>" class="am-form-field" placeholder="问题尽量描述清楚有助于网友帮你解决">
   <h3>问题描述</h3>
<textarea class="am-form-field" id="editor" name="description"  placeholder="请输入问题补充，最多允许3000个字"></textarea>
    <hr data-am-widget="divider" style="" class="am-divider am-divider-dotted" />
    
     <? if($setting['code_ask']) { ?>                   验证码
                    <input type="text" class="am-form-field" id="code" name="code" onblur="check_code()"  placeholder="输入图片对应的验证码">
                  
                    <span class="verifycode"><img src="<?=SITE_URL?>?user/code.html" onclick="javascript:updatecode();" id="verifycode"></span><a href="javascript:updatecode();" class="changecode">&nbsp;换一个</a>
                    <span id="codetip"></span>
                    <? } ?>                    <br>
    <? if($user['uid']) { ?>  <span>
        悬赏&nbsp;<select class="am-selected-btn" name="givescore" id="scorelist"><option selected="selected" value="0">0</option><option value="3">3</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="50">50</option><option value="80">80</option><option value="100">100</option></select>

    </span>
    <? } ?>    <button class="am-btn am-btn-primary am-margin-top-sm" type="submit" id="subAdd"  name="submit">
        提交
    </button>
                   <input type="hidden" name="asksid" id="asksid" value='<?=$_SESSION["asksid"]?>'/>
    <input type="hidden" name="classId" id="classId" value="">
    <input type="hidden" name="cid" id="cid" value='1'/>
    <input type="hidden" name="cid1" id="cid1" value="0"/>
    <input type="hidden" name="cid2" id="cid2" value="0"/>
    <input type="hidden" name="cid3" id="cid3" value="0"/>
    <input type="hidden" value="<?=$askfromuid?>" name="askfromuid" />
</form>

   </section>
   <? if($user['uid']>0&&$user['active']!=1) { ?><div class="modal fade" id="emailtip">
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
</script><? } ?><div class="am-modal am-modal-no-btn" tabindex="-1" id="ask-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">提示
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd" id="errorcontent">
            Modal 内容。
        </div>
    </div>
</div>
<script type="text/javascript">


    function  check_form() {

        var qtitle = $("#qtitle").val();
        if (bytes($.trim(qtitle)) < 8 || bytes($.trim(qtitle)) > 100) {

            $("#errorcontent").html("问题标题长度不得少于4个字，不能超过50字");
            $('#ask-modal').modal();
            $("#qtitle").focus();
            return false;
        }

        <? if($user['uid']) { ?>            //检查财富值是否够用
            var offerscore = 0;
            var selectsocre = $("#givescore").val();
            if ($("#hidanswer:selected").val() == 1) {
                offerscore += 10;
            }
            offerscore += parseInt(selectsocre);
            if (offerscore > <?=$user['credit2']?>) {

                $("#errorcontent").html("你的财富值不够!");
                $('#ask-modal').modal();
                return false;
            }
            <? } ?>            }


</script>
<? include template('footer'); ?>
