<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站长工具管理系统-后台-管理首页</title>
<link href="images/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include_once("admin_permission.php") ?>
<div class="all">
  <div class="all_top"></div>
	<div class="main">
    	<div class="main_top"></div>
        <div class="main_txt">
			<?php include_once("admin_left.php") ?>
            <div class="right">
            	<div class="ra_index"></div>
                <div class="rb">
<div style="overflow: scroll;  overflow-x: hidden; height: 500px; width: 650px;color:#666666;">
<p>
版本: witcms 0.015<br />
修复: 修复一些小问题.<br />
编辑器: 增加了fckeditor编辑器.<br />
加密: 管理密码改为md5加密方式;<br />
</p>
<p>&nbsp;</p>

</div>
                </div>
            </div>
        </div>
    </div>
    <div class="all_foot"></div>
     <div class="all_foot2">版权所有:<a href="http://www.gom6.com">GO代理</a> GO工具管理系统V1.0 采用WITCMS后台</div>
</div>

</body>
</html>
