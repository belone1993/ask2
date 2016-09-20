<? if(!defined('IN_ASK2')) exit('Access Denied'); ?>
 <div class="row">
         
                <div class="col-sm-3 text-center ">
                    

                          <img src="<?=$member['avatar']?>" width="150" height="150"
                         class="img-circle user-avatar"/>
                     
                </div>
                <div class="col-sm-9">
                    <h1 class="tutor-name mar-t-1 text-center  " data-tutor_id="84794273"><?=$member['username']?></h1>
                     <? if($is_followed) { ?>                     <button class="button_followed btn btn-danger p-mar-b-2 pull-right mar-r-2" onclick="attentto_user(<?=$member['uid']?>)" id="attenttouser_<?=$member['uid']?>" ><i class="icon icon-heart"></i>取消关注</button>
                    <? } else { ?>                     <button class="btn btn-danger button_attention p-mar-b-2 pull-right mar-r-2" onclick="attentto_user(<?=$member['uid']?>)" id="attenttouser_<?=$member['uid']?>" ><i class="icon icon-heart"></i>关注</button>
                     <? } ?>                    <p class="tutor-title text-center mar-t-05 clear" id="tutorTitle"><?=$member['signature']?></p>

                    <div class="user-statics mar-t-05 text-center text-danger">
                        <ul class="tutor-detail tutorDetail">
                            <li class="detail">
                                <span class="icon icon-comment"></span>

                                <span class="highlight"><?=$member['answers']?></span>回答

                            </li>
                            <li class="detail"><span class="icon icon-question-sign"></span>
                                <span class="highlight"><?=$member['questions']?></span>提问
                            </li>
                            <li class="detail"><span class="icon icon-heart"></span>

                                <span class="highlight"><?=$member['followers']?></span>粉丝

                            </li>


                     





                     


                        </ul>
                    </div>

               
                     <p class="text-center"> <span class="mar-r-1">财富值：<?=$user['credit2']?></span> <span>经验值：<?=$user['credit1']?></span> </p>
              
                      <div class="text-center clearfix">
                        <? if($member['introduction']) { ?>                        <p><label>身份：</label><i><?=$member['introduction']?></i></p>
                        <? } ?>                        <p>
                            <label>擅长：</label>
                            <? if($member['category']) { ?>                            
<? if(is_array($member['category'])) { foreach($member['category'] as $category) { ?>
                            <i class="expert-field"><a target="_blank" href="<?=SITE_URL?>c-<?=$category['cid']?>.html"><?=$category['categoryname']?></a></i>
                            
<? } } ?>
                            <? } else { ?>                            博主很懒，没有添加擅长领域
                            <? } ?>                        </p>
                        <? if($member['mobile']) { ?>                        <p><label>手机：</label><i><?=$member['mobile']?></i></p>
                        <? } ?>                        <? if($member['qq']) { ?>                        <p><label>qq：</label><i><?=$member['qq']?></i></p>
                        <? } ?>                        <p><label>介绍：</label><i><span><? if($member['signature']) { ?><?=$member['signature']?><? } else { ?>暂无介绍<? } ?></span></i></p>
                        <p><label>注册日期：</label><i><?=$member['register_time']?></i></p>
                       
                    </div>
                 <form class="form-horizontal" name="askform" action="<?=SITE_URL?>question/add/<?=$member['uid']?>.html" method="POST">
                           <div class="input-group">
              <input type="text" class="form-control"  placeholder="对他擅长领域提问吧~" name="word"/>
              <span class="input-group-btn">  <button type="submit" name="post" class="btn btn-danger" >向TA提问</button> </span>
            </div>
                          
                           
                        </form>
                </div>
</div>