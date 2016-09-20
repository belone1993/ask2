<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('header'); ?>
<section class="am-container" >
    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default " >
        <h2 class="am-titlebar-title ">
            <? if($category['name']=='') { ?>            全部问题
            <? } else { ?>            <?=$category['name']?>
            <? } ?>        </h2>


    </div>
    <div class="am-margin-top-sm am-margin-left-sm">


        <ul class="am-avg-sm-3 boxes">






            
<? if(is_array($sublist)) { foreach($sublist as $index => $sub) { ?>
            <? if($sub['id']==$cid) { ?>            <li  class="box box-<?=$index?>"><?=$sub['name']?><em>(<?=$sub['questions']?>)</em></li>
            <? } else { ?>            <li class="box box-<?=$index?>">
                <a  href="<?=SITE_URL?>?c-<?=$sub['id']?>.html" title="<?=$sub['name']?>" ><?=$sub['name']?></a>

            </li>
            <? } ?>            
<? } } ?>
        </ul>
    </div>

    <ul class="am-list">
        
<? if(is_array($questionlist)) { foreach($questionlist as $index => $question) { ?>
        <li class="am-g am-list-item-desced">
            <a title="<?=$question['title']?>" href="<?=SITE_URL?>?q-<?=$question['id']?>.html" class="am-list-item-hd"><?=$question['title']?></a>
            <div class="am-list-item-text "><?=$question['description']?></div>
            <div class="am-cf">
                <small>  <span class="am-fl">
                       <img width="25" height="25"   src="<?=$question['avatar']?>"/>
                    <?=$question['author']?></span> <span class="am-fr"><?=$question['format_time']?></span></small>
            </div>
        </li>
        
<? } } ?>
    </ul>
   </section>
   
<? include template('footer'); ?>
