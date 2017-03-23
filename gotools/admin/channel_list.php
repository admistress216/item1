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
            	<div class="ra_channel"></div>
                <div class="rb">
                <!--表格内容开始-->
                	<div class="add_from">
					<form action="channel_insert.php" method="post">
						添加新分类: <input name="channel_name2" type="text" class=\"system_channel\"  /> <input type="submit" name="button" class="button2" type="button" value="添加" />
					</form>
					</div>
					<?php 
					$result = mysql_query("select channel_id,channel_name from wit_channel"); 
					while($row=mysql_fetch_array($result)){
                	echo "<div class=\"add_from\">";
					echo "<form action=\"channel_updata.php\" method=\"post\">";
                    echo "<table width=\"100%\" border=\"0\">";
                    echo "<tr>";
                    echo "<input type=\"text\" name=\"channel_id\" style=\"display:none\" value=\"" . $row['channel_id'] ."\"/>";
                    echo "<td>分类ID:" . $row['channel_id'] ." 分类名字: <input type=\"text\" name=\"channel_name\" class=\"system_channel\" value=\"" . $row['channel_name'] ."\"/> <input type=\"submit\" name=\"button\" class=\"button2\" value=\"修改\" /></td>";
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
