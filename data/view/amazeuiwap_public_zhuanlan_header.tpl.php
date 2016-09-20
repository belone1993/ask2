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
    <link rel="stylesheet" href="<?=SITE_URL?>css/dist/css/zui.min.css">
    <link rel="stylesheet" href="<?=SITE_URL?>css/dist/css/wapzhuanlan.css">
      <!-- jQuery -->
<script src="<?=SITE_URL?>js/jquery-1.11.3.min.js" type="text/javascript"></script>

<!-- ZUI Javascript组件 -->
<script src="<?=SITE_URL?>css/dist/js/zui.min.js" type="text/javascript"></script>
  

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
<body class="home">



<div id="header-holder">
    <div  class="ng-scope">
        <header id="header" class="navbar ng-scope ng-isolate-scope"  style="display: block;">
            <div class="navbar-logo-container">
                <a href="<?=SITE_URL?>?topic/default.html" target="_blank" class="logo icon-ic_zhihu_logo" >文</a>
            </div>

            <div class="navbar-title-container clearfix show">

                <div class="titles oneline "  >
                
                <? if(strstr('topic/getone',$regular)) { ?>                    <div class="subtitle  ng-scope" ng-if="title.subtitle" ng-bind-html="title.subtitle">首发于</div>
                    <div class="main-title  ng-scope" ng-if="title.main" ng-bind-html="title.main"><a ><?=$cat_model['name']?></a></div>
                
                <? } ?>                
                </div>

            </div>
 <? if(0!=$user['uid']) { ?> <a href="javascript:void(0)" class="dropdown-toggle navbar-login btn btn-blue btn-72_32 ng-scope" data-toggle="dropdown">我 <b class="caret"></b></a>
 <ul class="dropdown-menu pull-right" role="menu">
              <li>  <a class=" font-20 btn-72_32 ng-scope text-right" style="margin-right:6px;" title="退出登陆" target="_self" href="<?=SITE_URL?>?user/logout.html"> 退出</a></li>
               <li class="divider"></li>
              <li><a  title="我的文章" class=" font-20 btn-72_32 ng-scope text-right"  style="margin-right:2px;" target="_self" href="<?=SITE_URL?>?ut-<?=$user['uid']?>.html"> 我的专栏</a></li>
               <li class="divider"></li>
              <li> <a  title="写文章" class=" font-20 btn-72_32 ng-scope text-right"  style="margin-right:2px;" target="_self" href="<?=SITE_URL?>?user/default.html"> 个人中心</a></li>
              <li class="divider"></li>
              <li> <a  title="写文章" class=" font-20 btn-72_32 ng-scope text-right"  style="margin-right:2px;" target="_self" href="<?=SITE_URL?>"> 回到首页</a></li>
            </ul>
            

  
   
  <? } else { ?>    <a href="javascript:login();" class="navbar-login btn btn-blue btn-72_32 ng-scope" >
                登录
            </a>
    <? } ?>          






            <div class="navbar-content">
            </div>

        </header>
    </div>
</div>
