<? if(!defined('IN_ASK2')) exit('Access Denied'); include template('public_zhuanlan_header'); ?>
 
<script src="<?=SITE_URL?>js/neweditor/ueditor.config.js" type="text/javascript"></script> 
<script src="<?=SITE_URL?>js/neweditor/ueditor.all.js" type="text/javascript"></script> 




<div class="user-home bg-white" >
    <div class="container">

        <div class="row ">
            <div class="col-sm-12">
             
            <!-- 内容页面 --> 
    <div class="row " style="margin-top:80px;">
                 <div class="col-sm-12">
                     <div class="dongtai">
                
                       <form class="form-horizontal" action="<?=SITE_URL?>?user/addxinzhi.html"  method="post" enctype="multipart/form-data">
                        <input type="hidden" name="topicclass" id="topicclass"/>
                     
         <div class="form-group">
          <label class="col-md-2 control-label">标题</label>
          <div class="col-md-10 has-error">
    
    <div class="row">
        <div class="col-md-8">
        <input type="text" AUTOCOMPLETE="OFF" name="title" value="<?=$topic['title']?>" size="50" class="form-control" placeholder="标题不能为空">
        
        
        </div>
        <div class="col-md-4">
           
           
   
     <div class="bar_l">
                        <span id="selectedcate" class="selectedcate"></span>
                        <span><a  class="text-danger btn " data-toggle="modal" data-target="#myLgModal" id="changecategory" href="javascript:void(0)">选择分类</a>
                  
 </span>
   </div>
          
        </div>
    </div>
            
          </div>
        </div>
         <div class="form-group">
          <label class="col-md-2 control-label">  文章标签:</label>
          <div class="col-md-10 has-error">
            <input type="text" id="topic_tag"  AUTOCOMPLETE="OFF" name="topic_tag" data-toggle="tooltip" data-placement="bottom"  data-original-title="多个用英文逗号隔开,最多5个"  value="<?=$topic['topic_tag']?>"  class="form-control" placeholder="">
           
          </div>
        </div>
                       <div class="form-group">
          <label class="col-md-2 control-label">文章描述:</label>
          <div class="col-md-10 has-error">
          
   <script type="text/plain" id="mycontent" name="desc" style="width:100%;height:300px;"><?=$topic['describtion']?></script>
                                             
                                                
                                                  <script type="text/javascript">UE.getEditor('mycontent');</script>
          
          </div>
        </div>
        <div class="form-group">
        
        <div class="col-md-offset-2 col-md-10">
   
        
  <div class="add-img-box row">
  <div class="col-sm-5">
    <span class="add-img" >
  <a id="layerUploadButton"></a></span>
  <div class="add-img-html5" style=""><span>
  </span><a href="###" text="网页提问浮层添加图片点击">选择封面图片，大小建议288px*192px.
  <input type="file" id="layer_upload" onchange="previewImage(this)" name="image" title="请选择图片" accept="image/*" style="opacity: 0;height: 40px;position:relative;top:-2rem;">
  </a>
  </div>
  </div>

  </div>
  <div id="preview" style="overflow:visible">

    <img class="img-thumbnail" data-toggle="lightbox"  data-image="<?=SITE_URL?>css/dist/css/images/default.jpg" data-caption="图片浏览"  id="imghead" width=288 height=192 border=0 src='<?=SITE_URL?>css/dist/css/images/default.jpg'>
</div>
        </div>
        </div>
        
        <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
         <? if(isset($topic['id'])) { ?>    <input type="hidden" value="<?=$topic['id']?>" name="id" />
    <input type="hidden" value="<?=$topic['image']?>" name="image" />
    <? } ?>          <input type="hidden" name="usersid" value='<?=$_SESSION["userid"]?>'/>
  <input type="submit" id='article_btn' class="btn btn-default width-120" name="submit"  value="提 交"><br>
        
        </div>
        </div>
                       </form>  
                        <div class="modal fade" id="myLgModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div id="dialogcate">
        <form name="editcategoryForm" action="<?=SITE_URL?>?question/movecategory.html" method="post">
            <input type="hidden" name="qid" value="<?=$question['id']?>" />
            <input type="hidden" name="category" id="categoryid" />
            <input type="hidden" name="selectcid1" id="selectcid1" value="<?=$question['cid1']?>" />
            <input type="hidden" name="selectcid2" id="selectcid2" value="<?=$question['cid2']?>" />
            <input type="hidden" name="selectcid3" id="selectcid3" value="<?=$question['cid3']?>" />
            <table class="table table-striped">
                <tr valign="top">
                    <td width="125px">
                        <select  id="category1" class="catselect" size="8" name="category1" ></select>
                    </td>
                    <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou1"></div></td>
                    <td width="125px">                                        
                        <select  id="category2"  class="catselect" size="8" name="category2" ></select>                                        
                    </td>
                    <td align="center" valign="middle" width="25px"><div style="display: none;" id="jiantou2">>>&nbsp;</div></td>
                    <td width="125px">
                        <select id="category3"  class="catselect" size="8"  name="category3" ></select>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                    <span>
                    <input  type="button" id="layer-submit" class="btn btn-default" value="确&nbsp;认" onclick="selectcate();"/></span>
                    <span>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </span>
                    </td>
                   
                </tr>
            </table>
        </form>
    </div>
    </div>
  </div>
</div>
                     </div>
                 </div>


             </div>
            </div>
           
           

        </div>

    </div>

</div>


<!--用户中心结束-->
<script type="text/javascript">
$('#topic_tag').tooltip('hide');
    var category1 = <?=$categoryjs['category1']?>;
    var category2 = <?=$categoryjs['category2']?>;
    var category3 = <?=$categoryjs['category3']?>;
        $(document).ready(function() {
        initcategory(category1);
       



        });
        function selectcate() {
            var selectedcatestr = '';
            var category1 = $("#category1 option:selected").val();
            var category2 = $("#category2 option:selected").val();
            var category3 = $("#category3 option:selected").val();
            if (category1 > 0) {
                selectedcatestr = $("#category1 option:selected").html();
                $("#topicclass").val(category1);
               
            }
            if (category2 > 0) {
                selectedcatestr += " > " + $("#category2 option:selected").html();
                $("#topicclass").val(category2);
               
            }
            if (category3 > 0) {
                selectedcatestr += " > " + $("#category3 option:selected").html();
                $("#topicclass").val(category3);
              
            }
            $("#selectedcate").html(selectedcatestr);
            $("#changecategory").html("更改");
            $("#myLgModal").modal("hide");
        }
</script>



<script type="text/javascript">
 
 $("#article_btn").click(function(){
 var v=$("#topicclass").val();
var fv=$("#layer_upload").val();
 if(v==''){
 alert("请选择文章分类");
 $("#myLgModal").modal("show");
 return false;
 }
 if(fv==''){
 alert("请选择文章封面图");
 return false;
 }
 })
 
 function checkarticle(){
 if($("#topicclass")==''){
 alert("请选择文章分类");
 return false;
 }
 }
                //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
          var MAXWIDTH  = 260; 
          var MAXHEIGHT = 180;
          var div = document.getElementById('preview');
          if (file.files && file.files[0])
          {
              div.innerHTML =' <a target="_blank" id="imgshowlink" href="" data-toggle="lightbox" data-group="image-group-1"><img class="img-thumbnail" id=imghead></a>';
              var img = document.getElementById('imghead');
              img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
              }
              var reader = new FileReader();
              reader.onload = function(evt){
            	  img.src = evt.target.result;
            	  $("#imghead").attr("data-img",evt.target.result);
            	  $("#imgshowlink").attr("href",evt.target.result);
            	  
              }
              reader.readAsDataURL(file.files[0]);
          }
          else //兼容IE
          {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            var src = document.selection.createRange().text;
            div.innerHTML = '<img class="img-thumbnail" data-caption="" data-toggle="lightbox" id=imghead>';
            var img = document.getElementById('imghead');
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
            div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
          }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight )
            {
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;
                 
                if( rateWidth > rateHeight )
                {
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else
                {
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
             
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
</script>  

    <script src="<?=SITE_URL?>js/sowenda/common.js" type="text/javascript"></script>
<? include template('public_zhuanlan_footer'); ?>
