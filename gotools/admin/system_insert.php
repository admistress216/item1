<?php session_start(); ?>
<html>
<head>
<title>站长工具管理系统-后台-设置添加</title>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once("admin_permission.php") ?>
<?php include_once("admin_conn.php") ?>
<?php
$system_web = strip_tags($_POST['system_web'],'');  
$system_url = strip_tags($_POST['system_url'],'');  
$system_key = strip_tags($_POST['system_key'],'');  
$system_description = strip_tags($_POST['system_description'],'');  
$system_copyright = strip_tags($_POST['system_copyright'],'');  
$system_icp = strip_tags($_POST['system_icp'],'');  

$sql = "UPDATE `gotools`.`wit_system` SET `system_web` = '$system_web',`system_url` = '$system_url',`system_key` = '$system_key',`system_description` = '$system_description',`system_copyright` = '$system_copyright',`system_icp` = '$system_icp' WHERE `wit_system`.`system_id` =1 LIMIT 1 ;";
if (!mysql_query($sql,$con))
{die ("<br /><br />错误!". mysql_error()); }
echo "<script>alert(\"修改成功!\")</script>";
echo "<script>window.location=\"system_list.php\";</script>";
?>
</body>
</html>