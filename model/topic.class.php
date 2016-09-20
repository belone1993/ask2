<?php

!defined('IN_ASK2') && exit('Access Denied');

class topicmodel {

    var $db;
    var $base;

    function topicmodel(&$base) {
        $this->base = $base;
        $this->db = $base->db;
    }

    /* 获取某个文章信息 */

    function get($id) {
         $topic =  $this->db->fetch_first("SELECT * FROM " . DB_TABLEPRE . "topic WHERE id='$id'");
        
        if ($topic) {
            $topic['viewtime'] = tdate($topic['viewtime']);
            $topic['title'] = checkwordsglobal($topic['title']);
              $topic['describtion'] = checkwordsglobal($topic['describtion']);
        }
        return $topic;
    }
   function get_byname($title) {
         $topic =  $this->db->fetch_first("SELECT * FROM " . DB_TABLEPRE . "topic WHERE title='$title'");
        
        if ($topic) {
            $topic['viewtime'] = tdate($topic['viewtime']);
             $topic['title'] = checkwordsglobal($topic['title']);
              $topic['describtion'] = checkwordsglobal($topic['describtion']);
            
        }
        return $topic;
    }
    function get_bylikename($word,$start=0, $limit=6){
    	$topiclist = array();
    	
    	$query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic WHERE title like '%$word%' or describtion like '%$word%' order by id desc LIMIT $start,$limit");
       
      while ($topic = $this->db->fetch_array($query)) {
           $topic['title'] = checkwordsglobal($topic['title']);
              $topic['describtion'] = checkwordsglobal($topic['describtion']);
          $topic['title']=highlight( $topic['title'],$word);
	      $topic['describtion']=highlight( $topic['describtion'],$word);
              $topic['viewtime'] = tdate($topic['viewtime']);
            $topiclist[] = $topic;
        }
       
        return $topiclist; 
    }
 function rownum_by_user_article(){
    	$sql="SELECT COUNT(wz.authorid) as num, u.uid,u.username,u.signature,u.followers FROM `" . DB_TABLEPRE . "user` as u ," . DB_TABLEPRE . "topic as wz where u.uid=wz.authorid group by u.uid ORDER BY num DESC ";
    	 $query = $this->db->query($sql);
        return $this->db->num_rows($query);
    }
  function get_user_articles($start = 0, $limit = 8){
    	$sql="SELECT COUNT(wz.authorid) as num, u.uid,u.username,u.signature,u.followers FROM `" . DB_TABLEPRE . "user` as u ," . DB_TABLEPRE . "topic as wz where u.uid=wz.authorid group by u.uid ORDER BY num DESC LIMIT $start,$limit";
    	 $modellist = array();
        $query = $this->db->query($sql);
        while ($model = $this->db->fetch_array($query)) {
        	
        	 $model['avatar'] = get_avatar_dir($model['uid']);
           
            $modellist[] = $model;
        }
        return $modellist;
        
    }
    function get_article_by_uid($uid){
    	   	$sql="SELECT COUNT(t.id) as num ,c.name ,c.id ,t.authorid,u.username FROM `" . DB_TABLEPRE . "topic` as t ," . DB_TABLEPRE . "category as c," . DB_TABLEPRE . "user as u where c.id=t.articleclassid and t.authorid=$uid and t.authorid=u.uid GROUP BY t.articleclassid HAVING COUNT(t.id)>0 ORDER BY num DESC LIMIT 0,15";
    	 $modellist = array();
        $query = $this->db->query($sql);
        while ($model = $this->db->fetch_array($query)) {
        	
        	
           
            $modellist[] = $model;
        }
        return $modellist;
    }
    function get_bycatid($catid,$start=0, $limit=6,$questionsize=10){
    	 $topiclist = array();
    	   $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic where articleclassid=$catid order by id desc LIMIT $start,$limit");
    	 while ($topic = $this->db->fetch_array($query)) {
          
           $topic['title'] = checkwordsglobal($topic['title']);
              $topic['describtion'] = checkwordsglobal($topic['describtion']);
              $topic['viewtime'] = tdate($topic['viewtime']);
            $topiclist[] = $topic;
        }
        return $topiclist;
    }
    function get_list($showquestion=0, $start=0, $limit=6,$questionsize=10) {
        $topiclist = array();
        $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic order by id desc LIMIT $start,$limit");
        while ($topic = $this->db->fetch_array($query)) {
            ($showquestion == 1) && $topic['questionlist'] = $this->get_questions($topic['id'],0,$questionsize); //首页专题掉用
            ($showquestion == 2) && $topic['questionlist'] = $this->get_questions($topic['id']); //专题列表页掉用
  $topic['viewtime'] = tdate($topic['viewtime']);
  $topic['title'] = checkwordsglobal($topic['title']);
              $topic['describtion'] = checkwordsglobal($topic['describtion']);
            $topiclist[] = $topic;
        }
        return $topiclist;
    }
  function get_hotlist($showquestion=0, $start=0, $limit=6,$questionsize=10) {
        $topiclist = array();
        $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic where ispc=1 order by id desc LIMIT $start,$limit");
        while ($topic = $this->db->fetch_array($query)) {
            ($showquestion == 1) && $topic['questionlist'] = $this->get_questions($topic['id'],0,$questionsize); //首页专题掉用
            ($showquestion == 2) && $topic['questionlist'] = $this->get_questions($topic['id']); //专题列表页掉用
  $topic['viewtime'] = tdate($topic['viewtime']);
 $topic['title'] = checkwordsglobal($topic['title']);
              $topic['describtion'] = checkwordsglobal($topic['describtion']);
            $topiclist[] = $topic;
        }
        return $topiclist;
    }
    function rownum_by_tag($name) {
        $query = $this->db->query("SELECT * FROM `" . DB_TABLEPRE . "topic` AS q," . DB_TABLEPRE . "topic_tag AS t WHERE q.id=t.aid AND t.name='$name' ORDER BY q.views DESC");
        return $this->db->num_rows($query);
    }
    function list_by_tag($name,  $start = 0, $limit = 20) {
        $toipiclist = array();
      
        $query = $this->db->query("SELECT * FROM `" . DB_TABLEPRE . "topic` AS q," . DB_TABLEPRE . "topic_tag AS t WHERE q.id=t.aid AND t.name='$name'  ORDER BY q.views  DESC LIMIT $start,$limit");
        while ($topic = $this->db->fetch_array($query)) {
            $topic['category_name'] = $this->base->category[$topic['articleclassid']]['name'];
            $topic['format_time'] = tdate($topic['viewtime']);
            $topic['description'] =checkwordsglobal( strip_tags($topic['describtion']));
             $topic['title']=highlight(checkwordsglobal($topic['title']),$name);
	$topic['describtion']=highlight( $topic['describtion'],$name);
            $toipiclist[] = $topic;
        }
        return $toipiclist;
    }
 function get_list_byuid($uid, $start=0, $limit=6,$questionsize=10) {
        $topiclist = array();
        $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic where authorid=$uid order by id desc LIMIT $start,$limit");
        while ($topic = $this->db->fetch_array($query)) {
           $topic['describtion']= cutstr(strip_tags(str_replace('&nbsp;','',$topic['describtion'])),110,'...');
            $topic['questionlist'] = $this->get_questions($topic['id']); //专题列表页掉用
              $topic['viewtime'] = tdate($topic['viewtime']);
            $topiclist[] = $topic;
        }
        return $topiclist;
    }
    
 function get_list_bycidanduid($cid,$uid, $start=0, $limit=6) {
        $topiclist = array();
        $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic where authorid=$uid and articleclassid=$cid order by viewtime  desc LIMIT $start,$limit");
        while ($topic = $this->db->fetch_array($query)) {
          
        $topic['describtion']= cutstr(strip_tags(str_replace('&nbsp;','',$topic['describtion'])),110,'...');
              $topic['viewtime'] = tdate($topic['viewtime']);
            $topiclist[] = $topic;
        }
        return $topiclist;
    }
    
    function get_questions($id, $start=0, $limit=5) {
        $questionlist = array();
        $query = $this->db->query("SELECT q.title,q.id FROM " . DB_TABLEPRE . "tid_qid as t," . DB_TABLEPRE . "question as q WHERE t.qid=q.id AND t.tid=$id LIMIT $start,$limit");
        while ($question = $this->db->fetch_array($query)) {
        	 $question['title']=checkwordsglobal( $question['title']);
            
            $questionlist[] = $question;
        }
        return $questionlist;
    }
    function get_list_bywhere($showquestion,$questionsize) {
        $topiclist = array();
        $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic where isphone='1' order by displayorder asc ");
        while ($topic = $this->db->fetch_array($query)) {
            ($showquestion == 1) && $topic['questionlist'] = $this->get_questions($topic['id'],0,$questionsize); //首页专题掉用
            ($showquestion == 2) && $topic['questionlist'] = $this->get_questions($topic['id']); //专题列表页掉用
  $topic['viewtime'] = tdate($topic['viewtime']);
   $topic['title'] = checkwordsglobal($topic['title']);
        $topic['describtion'] = checkwordsglobal($topic['describtion']);
            $topiclist[] = $topic;
            
           
        }
        return $topiclist;
    }
    function get_select() {
        $query = $this->db->query("SELECT * FROM " . DB_TABLEPRE . "topic   LIMIT 0,50");
        $select = '<select name="topiclist">';
        while ($topic = $this->db->fetch_array($query)) {
            $select .= '<option value="' . $topic['id'] . '">' . $topic['title'] . '</option>';
        }
        $select .='</select>';
        return $select;
    }

    /* 后台管理编辑专题 */

    function update($id, $title, $desrc, $filepath='') {
        if ($filepath)
            $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `title`='$title' ,`describtion`='$desrc' , `image`='$filepath'  WHERE `id`=$id");
        else
            $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `title`='$title' ,`describtion`='$desrc'  WHERE `id`=$id");
    }
function updatetopicbk($id, $title, $desrc, $filepath='',$isphone='',$views='',$cid) {
	$creattime = $this->base->time;
 if ($filepath)
            $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `title`='$title' ,`describtion`='$desrc' , `image`='$filepath', `isphone`='$isphone', `views`='$views' ,`articleclassid`='$cid',`viewtime`='$creattime' WHERE `id`=$id");
        else
            $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `title`='$title' ,`describtion`='$desrc',`isphone`='$isphone', `views`='$views' ,`articleclassid`='$cid',`viewtime`='$creattime' WHERE `id`=$id");
    }
function updatetopic($id, $title, $desrc, $filepath='',$isphone='',$views='',$cid,$ispc=0) {
 if ($filepath)
            $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `title`='$title' ,`describtion`='$desrc' , `image`='$filepath', `isphone`='$isphone', `ispc`='$ispc', `views`='$views' ,`articleclassid`='$cid' WHERE `id`=$id");
        else
            $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `title`='$title' ,`describtion`='$desrc',`isphone`='$isphone', `ispc`='$ispc', `views`='$views' ,`articleclassid`='$cid' WHERE `id`=$id");
    }
function updatetopichot($id,$ispc=0) {
 $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET  `ispc`='$ispc' WHERE `id`=$id");
           
    }
  
   /* 后台添加专题 */

    function add($title, $desc, $image,$isphone='0',$views='1',$cid=1) {
    	//exit("INSERT INTO `" . DB_TABLEPRE . "topic`(`title`,`describtion`,`image`,`isphone`) VALUES ('$title','$desc','$image','$isphone')");
        $this->db->query("INSERT INTO `" . DB_TABLEPRE . "topic`(`title`,`describtion`,`image`,`isphone`,`views`,`articleclassid`) VALUES ('$title','$desc','$image','$isphone','$views','$cid')");
    }
 function addtopic($title, $desc, $image,$author,$authorid,$views,$articleclassid) {
    	$creattime = $this->base->time;
        $this->db->query("INSERT INTO `" . DB_TABLEPRE . "topic`(`title`,`describtion`,`image`,`author`,`authorid`,`views`,`articleclassid`,`viewtime`) VALUES ('$title','$desc','$image','$author','$authorid','$views','$articleclassid','$creattime')");
  $aid = $this->db->insert_id();
 
 return $aid;
 }
    function addtotopic($qids, $tid) {
        $qidlist = explode(",", $qids);
        $sql = "INSERT INTO " . DB_TABLEPRE . "tid_qid (`tid`,`qid`) VALUES ";
        foreach ($qidlist as $qid) {
            $sql .=" ($tid,$qid),";
        }
        $this->db->query(substr($sql, 0, -1));
    }

    /* 后台管理删除分类 */

    function remove($tids) {
        $this->db->query("DELETE FROM `" . DB_TABLEPRE . "topic` WHERE `id` IN  ($tids)");
        $this->db->query("DELETE FROM `" . DB_TABLEPRE . "tid_qid` WHERE `tid` IN ($tids)");
    }

    /* 后台管理移动分类顺序 */

    function order_topic($id, $order) {
        $this->db->query("UPDATE `" . DB_TABLEPRE . "topic` SET `displayorder` = '{$order}' WHERE `id` = '{$id}'");
    }

}

?>
