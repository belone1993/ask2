<? if(!defined('IN_ASK2')) exit('Access Denied'); global $starttime,$querynum;$mtime = explode(' ', microtime());$runtime=number_format($mtime['1'] + $mtime['0'] - $starttime,6); $setting=$this->setting;$user=$this->user;$headernavlist=$this->nav;$regular=$this->regular; ?><div class="poploginform">

 <div id="user_error" class="alert alert-danger hide">
 
 </div>
    <form  class="form-horizontal" name="loginform"  action="<?=SITE_URL?>?user/login.html" method="post"    <? if($setting['ucenter_open']==0) { ?>onsubmit="return checkform();"<? } ?>>

        
         <div class="form-group">
          <label class="col-md-2 control-label">用户名</label>
          <div class="col-md-7">
             <input type="text" id="popusername" name="username" value="" placeholder="用户名" class="form-control">
          </div>
        </div>
           <div class="form-group">
          <label class="col-md-2 control-label">密码</label>
          <div class="col-md-7">
             <input  type="password"  id="poppassword" name="password" value="" placeholder="密码" class="form-control">
          </div>
        </div>
         <? if($setting['code_login']) { ?>                <div class="form-group">
          <label class="col-md-2 control-label">验证码</label>
          <div class="col-md-4">
             <input type="text"  id="login_code" name="code" onblur="check_login_code();"  value="" class="form-control">
             <div  id="logincodetip" class="help-block alert alert-warning hide">验证码不能为空</div>
          </div>
        </div>
          <div class="form-group">
          <div class="col-md-2 col-md-offset-2">
            <span class="verifycode"><img class="hand" src="<?=SITE_URL?>?user/code.html" onclick="javascript:updatecode();" id="verifycode">
                        </span>
          </div>
          <div class="col-md-1">
              <a class="changecode" href="javascript:updatecode();">&nbsp;看不清?</a>
          </div>
        </div>
        
          <? } ?>          
         <div class="form-group">
          <label class="col-md-2 control-label"></label>
          <div class="col-md-4">
             <input type="checkbox" id="cookietime" name="cookietime" value="2592000" />下次自动登录 
          </div>
        </div>
   
        
         <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
             <input type="submit" id="submit" class="btn btn-default width-120" value="登陆" data-loading="稍候..."> 
             
            <input type="hidden" name="usersid" value='<?=$_SESSION["userid"]?>'/>
          <input type="hidden" id="popapikey" name="apikey" value='<?=$_SESSION["apikey"]?>'/>
            <input type="hidden" id="popforward" name="forward" value="<?=$forward?>"/>
            
            <a href="<?=SITE_URL?>?user/getpass.html" class="text-danger mar-l-1">忘记密码?</a>
            <a href="<?=SITE_URL?>?user/register.html" class="text-danger mar-l-1">注册新账号</a>
          </div>
        </div>
        
       
        <div class="thirdpart_login mar-t-05 mar-l-1">
            其他账号登陆：
            <? if($setting['sinalogin_open']) { ?>            <a title="新浪微博登陆" href="<?=SITE_URL?>plugin/sinalogin/index.php" title="新浪微博登陆" class="sinaWebLogin">
         
            <i class="icon icon-weibo text-danger font-18"></i>
            </a>
            <? } ?>            <? if($setting['qqlogin_open']) { ?>            <a  class="qqLogin" title="QQ账号登陆" href="<?=SITE_URL?>plugin/qqlogin/index.php">   <i class="icon icon-qq text-danger font-18"></i></a>
            <? } ?>        </div>
    </form>

    <script type="text/javascript">
        function checkform() {
            var username = $("#popusername").val();
            var password = $("#poppassword").val();
            
           
            var _forward=$("#popforward").val();
            var _apikey=$("#popapikey").val();
            
            
            if ($.trim(username) === '') {
                $("#user_error").html("请输入您的账号").removeClass("hide");
                $("#username").focus();
                return false;
            }
            if (password === '') {
                $("#user_error").html("请输入您的密码").removeClass("hide");
                $("#password").focus();
                return false;
            }
            $("#user_error").html("").addClass("hide");
            
            <? if($setting['code_login']) { ?>            check_login_code();
            if (!$('#logincodetip').hasClass("hide")) {
                $("#code").focus();
                return false;
            }
            <? } ?>            
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
               
                //提交的网址
                url:"<?=SITE_URL?>/?api_user/loginapi",
                //提交的数据
                data:{uname:$.trim(username),upwd:password,apikey:_apikey},
                //返回数据的格式
                datatype: "text",//"xml", "html", "script", "json", "jsonp", "text".
                
                success: function(data) {
             
                   
                    if(data=='login_ok'){
                 
                    	
                    	
                    	
                    	
                      window.location.href=_forward;
                      
                  
                      
                      
                    }else{
                    	  switch(data){
                    	  case 'login_null':
                    		  $("#user_error").html("用户名或者密码为空").removeClass("hide");
                    		
                    		  break;
         case 'login_user_or_pwd_error':
        	 
        	  $("#user_error").html("用户名或者密码错误").removeClass("hide");
                    		  break;
                    		  default:
                    			  
                    			  alert(data);
                    		  break;

                    	  }
                    }
                    
                }
            });
            return false;
            if (!$("#user_error").hasClass("hide")) {
                return false;
            } else {
                return true;
            }

        }
           
            
        function refresh_code() {
            var img = g_site_url + "index.php" + query + "user/code/" + Math.random();
            $('#verifylogincode').attr("src", img);
        }
        function check_login_code() {
        	
            var code = $.trim($('#login_code').val());
            
          
            if ($.trim(code) == '') {
                $('#logincodetip').html("验证码错误").removeClass("hide");
               
                return false;
            }
        
            $.ajax({
                type: "POST",
                async: false,
                cache: false,
                url: "<?=SITE_URL?>index.php?user/ajaxcode/"+code,
                success: function(flag) {                   
                    if (1 == flag) {
                        $('#logincodetip').html("&nbsp;").addClass("hide");
                       
                        return true;
                    } else {
                        $('#logincodetip').html("验证码错误").removeClass("hide");
                       
                        return false;
                    }

                }
            });
        }
    </script>

</div>