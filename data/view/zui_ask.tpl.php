<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); $adlist = $this->fromcache("adlist"); ?><script src="<?=SITE_URL?>js/neweditor/ueditor.config.js" type="text/javascript"></script> 
<script src="<?=SITE_URL?>js/neweditor/ueditor.all.js" type="text/javascript"></script> 

<div class="container bg-white mar-t-1 mar-b-1">
<ol class="breadcrumb">
        <li><a class="first" href="<?=SITE_URL?>"><i class="icon icon-home"></i><?=$setting['site_name']?></a></li>
        <li>提问</li>
      </ol>
<hr>

<div class="row">
<div class="col-sm-8 b-r-line">
 <form class="form-horizontal"  enctype="multipart/form-data" method="POST" action="<?=SITE_URL?>?question/add.html" name="askform" id="askform" onsubmit="return check_form();" >
  <div class="alert alert-danger">
  
  <div class="title">

  <div id="limitNum" class="tips">还可输入 <span>50</span> 字</div><? if(isset($touser)) { ?>您正在向<a href="<?=SITE_URL?>?u-<?=$touser['uid']?>.html"><?=$touser['username']?></a>提问<? } else { ?>请将您的问题告诉我们<? } ?>：</div>
  </div>
  
  
  <div class="form-group">
          <label class="col-md-2 control-label">标题</label>
          <div class="col-md-8">
            <input type="text" class="form-control" placeholder="标题简短，言简意赅，问号结尾" name="title" id="qtitle" value="<?=$word?>" /> 
            
          </div>
        </div>
    <div class="form-group">
          <label class="col-md-2 control-label">问题补充(选填)</label>
          <div class="col-md-8">
           <div id="introContent">
                        <script type="text/plain" id="editor" name="description" style="height: 122px;"></script>
                        <script type="text/javascript">UE.getEditor('editor');</script>
                    </div>
            
          </div>
        </div>
          <div class="form-group">
            <div class="col-md-4 col-md-offset-2">
          
            <span id="selectedcate" class="selectedcate"></span>
                        <span><a data-toggle="modal" data-target="#myLgModal" id="changecategory" href="javascript:void(0)">选择分类</a>
          </div>
          <div class="col-md-3 col-md-offset-2">
          
             <span>悬赏&nbsp;<select name="givescore" id="scorelist"><option selected="selected" value="0">0</option><option value="3">3</option><option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="30">30</option><option value="50">50</option><option value="80">80</option><option value="100">100</option></select></span>
                        <? if($user['uid']) { ?>                        <span><input type="checkbox" name="hidanswer" id="hidanswer" value="1" />&nbsp;匿名</span>
                        <? } ?>          </div>
        </div>
        
          <? if($setting['code_ask']) { ?>          
               <div class="form-group">
          <label class="col-md-2 control-label">验证码</label>
          <div class="col-md-4">
             <input type="text"  id="code" name="code" onblur="check_code();"  value="" class="form-control">
             <div  id="codetip" class="help-block alert alert-warning ">验证码不能为空</div>
          </div>
        </div>
          <div class="form-group">
          <div class="col-md-2 col-md-offset-2">
            <span class="verifycode"><img class="hand" src="<?=SITE_URL?>?user/code.html" onclick="javascript:updatecode();" id="verifycode">
                        </span>
          </div>
          <div class="col-md-2">
              <a class="changecode" href="javascript:updatecode();">&nbsp;看不清?</a>
          </div>
        </div>
        
        
                    
                    <? } ?>                    
                    
          <div class="form-group">
         
          <div class="col-md-9 col-md-offset-2">
            <input type="hidden" name="asksid" id="asksid" value='<?=$_SESSION["asksid"]?>'/>
                    <input type="hidden" name="cid" id="cid"/>
                    <input type="hidden" name="cid1" id="cid1" value="0"/>
                    <input type="hidden" name="cid2" id="cid2" value="0"/>
                    <input type="hidden" name="cid3" id="cid3" value="0"/>
                    <input type="hidden" value="<?=$askfromuid?>" name="askfromuid" />  
                     <button type="submit"  class="btn btn-success"  name="submit">提交问题</button>
            
          </div>
        </div>
  </form><? if($setting['register_on']=='1') { if($user['uid']>0&&$user['active']!=1) { ?><div class="modal fade" id="emailtip">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
      <h4 class="modal-title"><?=$setting['register_on']?>温馨提示</h4>
    </div>
    <div class="modal-body">
      <p>由于网站设置，需要设置邮箱并且激活邮箱才能提问,回答，发布文章等一系列操作,<a href="<?=SITE_URL?>?user/editemail.html"> 激活邮箱走起!</a></p>
   
    </div>
 
  </div>
</div>
</div>
<script>
$("#emailtip").modal("show");
</script><? } } ?>        <div class="modal fade" id="myLgModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    
     <div id="dialogcate">
        <table class="table ">
            <tr valign="top">
                <td width="125px">
                    <select  id="category1" class="catselect" size="8" name="category1" ></select>
                </td>
                <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou1">>></div></td>
                <td width="125px">                                        
                    <select  id="category2"  class="catselect" size="8" name="category2" style="display:none"></select>                                        
                </td>
                <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou2">>>&nbsp;</div></td>
                <td width="125px">
                    <select id="category3"  class="catselect" size="8"  name="category3" style="display:none"></select>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                <span>
                    <input  type="button" class="btn btn-danger" value="确&nbsp;认" onclick="selectcate();"/></span>
                    <span>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                    </span>
                
                </td>
            </tr>
        </table>
    </div>
    
    </div>
    
    </div>
    
    </div>
</div>
<!-- 右边侧栏 -->
<div class="col-sm-4">
   <? if($touser) { ?>       
            <div class="row">
                <div class="col-sm-2 clearfix">
                  <a class="pic" href="<?=SITE_URL?>?u-<?=$touser['uid']?>.html" target="_blank"><img width="50px" height="50px" class="img-rounded" src="<?=$touser['avatar']?>"></a>
                 </div>
                 
                  <div class="col-sm-5 b-l-line">
                  <h3 class="font-12 "><a href="<?=SITE_URL?>?u-<?=$touser['uid']?>.html" target="_blank" title="<?=$touser['username']?>"><? echo cutstr($touser['username'],20,'') ?></a></h3>
                   
                    <p class="clear text-danger mar-t-05"><span class="mar-y-1"><?=$touser['grouptitle']?></span><?=$touser['answers']?>回答<span class="mar-ly-1"><?=$touser['supports']?>赞同</span></p>
                  </div>
                    
               
            </div>
       
        <? } ?>        <hr>
        <h3 class="font-18 mar-b-05 mar-t-1">你可以帮助他们哟</h3>
          <hr>
             <ul class="nav ">
   <? $nosolvelist=$this->fromcache('rewardlist'); ?>                
<? if(is_array($nosolvelist)) { foreach($nosolvelist as $index => $question_reward) { ?>
                <li class="b-b-line">
                    <i class="quan"></i> <a title="<?=$question_reward['title']?>" target="_blank"
                                            href="<?=SITE_URL?>?q-<?=$question_reward['id']?>.html">
                   <?=$question_reward['title']?><i class="icon icon-question text-success"></i> </a>
                </li>

  
<? } } ?>
            </ul>
 <!--广告位5-->
        <? if((isset($adlist['question_view']['right1']) && trim($adlist['question_view']['right1']))) { ?>        <div><?=$adlist['question_view']['right1']?></div>
        <? } ?></div>
</div>
 
</div>
<script type="text/javascript">
    var category1 = <?=$categoryjs['category1']?>;
    var category2 = <?=$categoryjs['category2']?>;
    var category3 = <?=$categoryjs['category3']?>;
        $(document).ready(function() {
        initcategory(category1);
        $("#qtitle").keyup(function() {
            var qbyte = bytes($.trim($(this).val()));
            var limit = 100 - qbyte;
            if (limit % 2 == 0) {
                $("#limitNum span").html((limit / 2));
            } else {
                $("#limitNum span").html(((limit + 1) / 2));
            }

        });
    });

    function selectcate() {
        var selectedcatestr = '';
        var category1 = $("#category1 option:selected").val();
        var category2 = $("#category2 option:selected").val();
        var category3 = $("#category3 option:selected").val();
        if (category1 > 0) {
            selectedcatestr = $("#category1 option:selected").html();
            $("#cid").val(category1);
            $("#cid1").val(category1);
        }
        if (category2 > 0) {
            selectedcatestr += " > " + $("#category2 option:selected").html();
            $("#cid").val(category2);
            $("#cid2").val(category2);
        }
        if (category3 > 0) {
            selectedcatestr += " > " + $("#category3 option:selected").html();
            $("#cid").val(category3);
            $("#cid3").val(category3);
        }
        $("#selectedcate").html(selectedcatestr);
        $("#changecategory").html("更改");
        $('#myLgModal').modal('hide');
    }

    function  check_form() {
        var qtitle = $("#qtitle").val();
        if (bytes($.trim(qtitle)) < 8 || bytes($.trim(qtitle)) > 100) {
            alert("问题标题长度不得少于4个字，不能超过50字！");
            $("#qtitle").focus();
            return false;
        }
        if ($("#selectedcate").html() == '') {
        initcategory(category1);
        $('#myLgModal').modal('show');
                return false;
        }
        <? if($user['uid']) { ?>        //检查财富值是否够用
        var offerscore = 0;
        var selectsocre = $("#givescore").val();
        if ($("#hidanswer:selected").val() == 1) {
            offerscore += 10;
        }
        offerscore += parseInt(selectsocre);
        if (offerscore > <?=$user['credit2']?>) {
        alert("你的财富值不够!");
                return false;
        }
        <? } ?>   
    }

</script>
<? include template('footer'); ?>