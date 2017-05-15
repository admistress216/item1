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
$channel_id = strip_tags($_POST['channel_id'],'');  
$channel_name = strip_tags($_POST['channel_name'],'');  
if ($channel_name==''){
$result = mysql_query("delete from wit_channel where channel_id='$channel_id' limit 1");
if ($result) {
	echo "<script>alert(\"删除成功!\")</script>";
	echo "<script>window.location=\"channel_list.php\";</script>";
}else{
	echo "<script>alert(\"删除失败!\")</script>";
	echo "<script>window.location=\"channel_list.php\";</script>";
}
}else{
$sql = "UPDATE `gotools`.`wit_channel` SET `channel_name` = '$channel_name' WHERE `wit_channel`.`channel_id` ='$channel_id' LIMIT 1 ;";
if (!mysql_query($sql,$con))
{die ("<br /><br />错误!". mysql_error()); }
echo "<script>alert(\"修改成功!\")</script>";
echo "<script>window.location=\"channel_list.php\";</script>";
}
?>
</body>
</html>