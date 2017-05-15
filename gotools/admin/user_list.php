<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>站长工具管理系统-后台-用户</title>
<link href="images/admin.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include_once("admin_permission.php") ?>
<?php include_once("admin_conn.php") ?>
<div class="all">
  <div class="all_top"></div>
	<div class="main">
    	<div class="main_top"></div>
        <div class="main_txt">
			<?php include_once("admin_left.php") ?>
            <div class="right">
            	<div class="ra_user"></div>
                <div class="rb">
                <!--表格内容开始-->
                
					<?php 
					$result = mysql_query("select * from wit_admin where adm_id=1"); 
					while($row=mysql_fetch_array($result)){
						
                	echo "<div class=\"add_from\">";
					echo "<form action=\"user_insert.php\" method=\"post\">";
                    echo "<table width=\"100%\" border=\"0\">";
                    echo "<tr>";
                    echo "<td>用户名:</td>";
                    echo "<td>" . $row['username'] ." (如修改密码,重新输入密码再点修改,默认读取为md5加密后的.)</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>密　码:</td>";
                    echo "<td><input type=\"password\" name=\"password\" class=\"system_user\" value=\"" . $row['password'] ."\"/></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td colspan=\"2\" align=\"right\"><input type=\"submit\" name=\"button\" class=\"button\" value=\"修改\" /></td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "</form>";
                    echo "</div>";
}
?>
                <!--表格内容结束-->
              </div>
            </div>
        </div>
    </div>
    <div class="all_foot"></div>
     <div class="all_foot2">版权所有:<a href="http://www.gom6.com">GO代理</a> GO工具管理系统V1.0 采用WITCMS后台</div>
</div>

</body>
</html>
