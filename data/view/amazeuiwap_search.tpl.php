<? if(!defined('IN_ASK2')) exit('Access Denied'); ?>
﻿
<? include template('header'); ?>
<section class="am-container am-margin-top-sm" >
    <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-margin-0" >
        <h2 class="am-titlebar-title ">
            为您找到相关结果约<?=$rownum?>个
        </h2>


    </div>
    <? if($questionlist) { ?>        <ul class="am-avg-sm-2 boxes">


            <? if(1==$status) { ?><li class="am-active box box-1">全部问题</li><? } else { ?><li><a class="am-text-sm" href="<?=SITE_URL?>?q=<?=$word?>.html">全部问题</a></li><? } ?>            <? if(2==$status) { ?><li class="am-active box box-2">已解决<? } else { ?><li><a class="am-text-sm" href="<?=SITE_URL?>?q=<?=$word?>/2.html">已解决</a></li><? } ?>        </ul>



            <ul class="am-list">
                
<? if(is_array($questionlist)) { foreach($questionlist as $index => $question) { ?>
                <li class="am-g am-list-item-desced">
                    <a title="<?=$question['title']?>" href="<?=SITE_URL?>?q-<?=$question['id']?>.html" class="am-list-item-hd"><?=$question['title']?></a>
                    <div class="am-list-item-text "><?=$question['description']?></div>
                    <div class="am-cf">
                        <small>  <span class="am-fl"><?=$question['author']?></span> <span class="am-fr"><?=$question['format_time']?></span></small>
                    </div>
                </li>
                
<? } } ?>
            </ul>

        <? } else { ?>        <div id="no-result">
            <p>抱歉，未找到和 <span>"</span><em><?=$word?></em><span>"</span>相关的内容。</p>
            <strong>建议您：</strong>
            <ul class="am-list">
                <li><span>检查输入是否正确</span></li>
                <li><span>简化查询词或尝试其他相关词</span></li>
            </ul>
        </div>
        <? } ?>        <? if($departstr) { ?>        <div class="pages am-text-lg"><?=$departstr?></div>
        <? } ?>        ﻿




        <? if($setting['xunsearch_open'] && !$tag) { ?>        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default am-margin-0" >
            <h2 class="am-titlebar-title ">
                相关搜索
            </h2>


        </div>

        <ul class="am-avg-sm-3 boxes">
            
<? if(is_array($related_words)) { foreach($related_words as $index => $word) { ?>
            <? if($index<=3) { ?>            <li class="box box-<?=$index?>">
                <a  href="<?=SITE_URL?>?q=<?=$word?>.html" title="<?=$word?>" ><?=$word?></a>

            </li>
            <? } ?>            
<? } } ?>
            <li class="box box-<?=$index?>">
                <a  href="<?=SITE_URL?>?q=<?=$related_words['4']?>.html" title="<?=$related_words['4']?>" ><?=$related_words['4']?></a>

            </li>
            <li class="box box-<?=$index?>">
                <a  href="<?=SITE_URL?>?q=<?=$related_words['5']?>.html" title="<?=$related_words['5']?>" ><?=$related_words['5']?></a>

            </li>
            <li class="box box-<?=$index?>">
                <a  href="<?=SITE_URL?>?q=<?=$related_words['6']?>.html" title="<?=$related_words['6']?>" ><?=$related_words['6']?></a>

            </li>
            <li class="box box-<?=$index?>">
                <a  href="<?=SITE_URL?>?q=<?=$related_words['7']?>.html" title="<?=$related_words['7']?>" ><?=$related_words['7']?></a>

            </li>

        </ul>


        <? } ?>   </section>
<? include template('footer'); ?>
