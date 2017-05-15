<?php session_start(); ?>
<html>
<head>
<title>站长工具管理系统-后台-用户添加</title>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include_once("admin_permission.php") ?>
<?php include_once("admin_conn.php") ?>
<?php
$password = md5($_POST['password']);  

$sql = "UPDATE `gotools`.`wit_admin` SET `password` = '$password' WHERE `wit_admin`.`adm_id` =1 LIMIT 1 ;";

if (!mysql_query($sql,$con))
{die ("<br /><br />错误!". mysql_error()); }
echo "<script>alert(\"修改成功!\")</script>";
echo "<script>window.location=\"user_list.php\";</script>";
?>
</body>
</html>