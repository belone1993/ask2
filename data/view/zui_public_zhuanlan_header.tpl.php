<? if(!defined('IN_ASK2')) exit('Access Denied'); ?>
<!DOCTYPE html>
  <? global $starttime,$querynum;$mtime = explode(' ', microtime());$runtime=number_format($mtime['1'] + $mtime['0'] - $starttime,6); $setting=$this->setting;$user=$this->user;$headernavlist=$this->nav;$regular=$this->regular;$toolbars="'".str_replace(",", "','", $setting['editor_toolbars'])."'"; ?><html>
<head lang="cn">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="format-detection" content="telephone=no"/>
      <? if(isset($seo_title)) { ?>        <title><?=$seo_title?></title>
        <? } else { ?>        <title><? if($navtitle) { ?><?=$navtitle?> - <? } ?><?=$setting['site_name']?></title>
        <? } ?>        <? if(isset($seo_description)) { ?>        <meta name="description" content="<?=$seo_description?>" />
        <? } else { ?>        <meta name="description" content="<?=$setting['site_name']?>" />
        <? } ?>        <meta name="keywords" content="<?=$seo_keywords?>" />
        <meta name="generator" content="Ask2 <?=ASK2_VERSION?> <?=ASK2_RELEASE?>" />
        <meta name="author" content="Ask2 Team" />
        <meta name="copyright" content="2016 ask2.cn" />
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow" />
      <meta name="applicable-device" content="pc"/>
      <meta http-equiv='Cache-Control' content='no-transform'/>
    <link rel="stylesheet" href="<?=SITE_URL?>css/dist/css/zui.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>css/dist/css/zhuanlan.css">
      <!-- jQuery -->
<script src="<?=SITE_URL?>js/jquery-1.11.3.min.js" type="text/javascript"></script>

<!-- ZUI Javascript组件 -->
<script src="<?=SITE_URL?>css/dist/js/zui.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="<?=SITE_URL?>css/dist/lib/ieonly/html5shiv.js" type="text/javascript"></script>
    <script src="<?=SITE_URL?>css/dist/lib/ieonly/respond.js" type="text/javascript"></script>
    <![endif]-->

        <script type="text/javascript">var g_site_url = "<?=SITE_URL?>";
            var g_site_name = "<?=$setting['site_name']?>";
            var g_prefix = "<?=$setting['seo_prefix']?>";
            var g_suffix = "<?=$setting['seo_suffix']?>";
            var g_uid = <?=$user['uid']?>;
            <? if(0!=$user['uid']) { ?>            
            <? } else { ?>function login(){

            	

            	

            	var url=g_site_url+"index.php?user/ajaxpoplogin";

            	var myModalTrigger = new $.zui.ModalTrigger({url:url});

            	myModalTrigger.show();

            }
            <? } ?>            </script>
            
</head>
<body>
<!--[if lt IE 8]>
<div class="alert alert-danger">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a href="http://browsehappy.com/">更换一个更好的浏览器</a>
    来提升用户体验.
</div>
<![endif]-->
<div class=" zl-header">
    <div class="row">
        <div class="col-xs-3 text-left">
            <div class="zl-wz-logo">
                <a href="<?=SITE_URL?>?topic/default.html" target="_blank" class="zl_wenzhang_logo" aria-label="文章首页">
                    文
                </a>
            </div>
            
             <div class="zl-wz-logo wenda-logo">
                <a href="<?=SITE_URL?>" target="_blank" class="zl_wenzhang_logo" aria-label="问答首页">
                          <i class="icon icon-home font-size-30"></i>
                </a>
            </div>
        </div>
           <div class="col-xs-7 text-center"><? if(strstr('topic/getone',$regular)) { ?>            <div class="navbar-title-container clearfix show">
                <div class="img " >

             
                <img class="avatar avatar-small" alt=""  src="<?=$member['avatar']?>">
            </a>
            </div>
                <div class="titles" >
                   <div class="subtitle text-left " >首发于</div>
                   <div class="main-title  text-left" >
                       <a href="javascript:void(0)"><?=$cat_model['name']?></a></div>
                </div>
               <div class="functions " >
                 <? if($is_followed=='1') { ?>                     <button onclick="attentto_user(<?=$member['uid']?>)" id="attenttouser_<?=$member['uid']?>"  class="btn btn-sm  button_followed    btn-green"  >取消关注</button></div>
                   

                    <? } else { ?>  <button onclick="attentto_user(<?=$member['uid']?>)" id="attenttouser_<?=$member['uid']?>"  class="btn btn-sm  button_attention    btn-green"  >关注作者</button></div>
  

                     <? } ?>                     
              
            </div><? } ?>        </div>
        <div class="col-xs-2 text-right">
            <div class="row">
                <div class="row">
                    <div class="col-xs-8 text-right">
                     <? if(0!=$user['uid']) { ?>                        <a class="zl-edit"  target="_self" href="<?=SITE_URL?>?user/addxinzhi.html"> <i class="icon icon-edit"></i>写文章</a>
                      <? } else { ?>                      <a class="zl-edit"  target="_self" href="javascript:login();"> <i class="icon icon-edit"></i>写文章</a>
                     <? } ?>                    
                    </div>
                    <div class="col-xs-4">
                     <? if(0!=$user['uid']) { ?>                        
                          <a class="zl-edit" title="我的文章" target="_self" href="<?=SITE_URL?>?ut-<?=$user['uid']?>.html"> 我的<i class="icon icon-ellipsis-h"></i></a>
                      <? } else { ?>                       <button class="zl-btn-login" onclick="login()" >登录</button>
                     <? } ?>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>