<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Language" content="UTF-8" />
<meta name='keywords' content='机智网,机智内容管理系统,WITCMS,FLASH,PHP,MYSQL,XML' />
<meta name='description' content='机智内容管理系统基于php+mysql+flash+xml构建的,功能模块灵活,扩展性强,前端全flash动态网站.' />
<meta name="author" content="Badwolf,badwolf@qq.com" />
<title>机智内容管理系统(WITCMS)</title>
<style type="text/css">
* {margin:0;padding:0;}
body {padding:0px;margin:0px;background:#FFF;color:#000;font-family:verdana,Helvetica,sans-serif;font-size:12px;}
p {margin:0 0 1.5em;}
form {padding:0px;margin:0px;}
a:link, a:visited, a:active {color:#666;text-decoration:none;}
a:hover {color:#666;text-decoration:none;}
.fl-left{float:left;}
#content{width:100%;background:#fff;margin:50px 0 0;}
#contentdiv{padding:40px 0;margin:0 auto;text-align:left;width:560px;}
#sihostlogo{background:url(images/site_adm_logo.gif) no-repeat;width:200px;height:150px;float:left;margin:20px 0 0 20px;display:inline;}
#acloginpod{width:560px;background:#ebebeb url(images/site_adm_bg.gif) repeat-x;border:1px solid #d3d3d3;-webkit-border-radius:7px;-moz-border-radius:7px;}
#acloginpod .acloginform{margin:22px; width:260px;float:right;}
#acloginpod form, #acloginpod fieldset{margin:0 !important;padding:0 !important;border:0 none;}
#acloginpod legend em{position:absolute;left:-9999em;}
#acloginpod label{display:block;font-size:14px;color:#444;margin-bottom:3px;line-height:20px;}
#acloginpod input.textinput{width:100%;border:1px solid #d3d3d3;background:#fff url(images/site_adm_bg.gif) repeat-x;font-size:15px;color:#000;padding:7px 0 7px 7px;margin-bottom:10px;}
#acloginpod input:focus{border-color:#77b2ee;}
#acloginpod .acloginbttn{display:block;float:right;border:none;text-indent:-99999em;width:80px;height:40px;background:url(images/site_adm_login.jpg) no-repeat;margin-top:10px;}
#acloginpod .acloginbttn:hover, #acloginpod .acloginbttn:focus{background-position:right top;}
#acloginpod .aclogin-action label{font-size:12px;color:#777;border-bottom:1px solid #d3d3d3;padding:0 0 5px;margin:0 0 7px;}
#acloginpod .aclogin-action label input{vertical-align:middle;}
#acloginpod a.forgotpass{display:block;font-size:12px;color:#aaa;}
#acloginpod a.forgotpass:hover,
#acloginpod a.forgotpass:focus{color:#8d1c1c;}
#footer{font-family:Verdana, "Lucida Grande", "Lucida Sans", sans;font-size:10px;margin:10px auto;width:320px;text-align:center;}
</style>
</head>
<body>

<div id="content">
  <div id="contentdiv">
     
      <div id="acloginpod">
	  <div id="sihostlogo"></div>
        <div class="acloginform">
			<form action="admin_login.php" method="post" name="form">
			<input type="hidden" name="referer" value="/">
            <fieldset>
            <legend><em>WITCMS[网站管理]</em></legend>
            <label for="username"><strong>用户名</strong>：</label>
            <input type="text" tabindex="1" value="" name="username" class="textinput"/>
            <label for="password"><strong>密码</strong>：</label>
            <input type="password" tabindex="2" value="" name="password" class="textinput"/>
            <div class="aclogin-action">
              <div class="fl-left">
                <a tabindex="5" href="../" class="forgotpass">返回首页 &raquo;</a>
              </div>
              <input name="Submit" type="submit" id="Submit" value="" tabindex="3" class="acloginbttn"/>
              <div class="clearfix"> </div>
            </div>
            </fieldset>
          	</form>
        </div>
      </div>
      <div id="footer">
		&copy; 2005-2009 Powered by <a href="http://www.gom6.com" target="_blank"GOTOOLS</a></div>
  </div>
</div>

</body>
</html>